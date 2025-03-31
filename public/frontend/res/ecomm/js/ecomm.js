/** //** ----= CLASS ecTransaction	=------------------------------------------------------------------------------\**//** \
*
* 	Payment transaction toolkit.
*
* 	@package	morweb
* 	@subpackage	ecomm
* 	@category	model
*
\**//** ---------------------------------------------------------------------------= by Mr.V!T @ Morad Media Inc. =----/** //**/

jQuery.fn.ecTransaction = function ($options) {

	// Defining name for simpler copypaste
	var $name	= 'ecTransaction';

	// Nothing to execute if no target element
	if ( !this.length )
		return;

	// Trying to retreive existing object
	var $obj = this.data($name); 

	// Passing options if existing
	if ( $obj )
		$obj.set($options);
		
	// Creating new one if necessary	
	else
		$obj	= window[$name](this, $options);
	
	// Making sure it's saved in data	
	this.data($name, $obj);

	return $obj;

} //FUNC ecTransaction

var mwTransaction;	// Compatability layer
var ecTransaction = mwTransaction = function ( $el, $options ) {
	
	return vEventObject(['onInit', 'onChange'], {

	dom			: {				// Set of interesting dom elements

		form			: false,			// Main payment/submit form

		gateway			: '[name=widget]',		// |- Providing service and widget names together with transaction
		service			: '[name=gateway]',		// |  Renaming according updated conception
		
		email			: '[name=email]',		// Main user email will be in this input (or default will be used)

		coins			: '.mwPayment-button.amount',	// Watching amount buttons too
		amount			: '[name=amount]',		// Input to read amount from
		amountEx		: '[name=amountEx]',		// Input for amount change (fees and such)
		currency		: '[name=currency]',		// Input to read amount from

		invoice			: '[name=invoice]',		// Invoice flag (checkbox/hidden)

		// Recurring inputs
		recurring		: '[name=rr_recurring]',			

		rrType			: '[name=rr_ptype]',			
		rrStep			: '[name=rr_pstep]',			

		rrCount			: '[name=rr_count]',			
		
	}, //dom

// ---- Transaction fields ----

	gateway			: '',				// Gateway widget to use
	service			: '',				// Service with keys to pair with gateway

	invoice			: false,			// Invoice/phone payment flag

	description		: '',				// Order description
	email			: '',				// User email

	amount			: 0,				// Total amount 
	amountBase		: 0,				// Base amount choosen for payment by user
	amountEx		: 0,				// Additional payment and options created on payment page (custom payments, fees, options) 

	currency		: 'USD',			// Custom currency setting (ISO 4217)
	country			: 'US',				// Custom country setting (ISO 3166-1 alpha-2)

	recurring		: {				// Recurring options. Will be set as complete object
	
		defaults		: {},				// Will store default values on init
	
		enabled			: false,			// Will be set TRUE if recurring is possible (allowed by widget)
		use			: false,			// If TRUE - recurring should be used (combination of user input and widgget settings)
		mode			: 'normal',			// Advanced recurring settings: normal/split 
		
		periodType		: 'O',				// |- Event period type and step.
		periodStep		: 1,				// |
		
		count			: 0,				// Events count can be used instead of end date. Used usually by payment gateways.

		// Start/end dates are currently unused and are not supported, but they exist
		start			: '',				// |- Start and end date of event reocurring. Event will repeat within this boundary.
		end			: '',				// |  Normally SQL date format used, as it's easyer to use with POST

	}, // recurring 

	items			: {},				// Stores list of items for selling in common format (simplified cart copy and/or cart itself)

	/** //** ----= set	=--------------------------------------------------------------------------------------\**//** \
	*
	*	Updates self properties with given values.
	*
	*	@param	MIXED	$option		- Option to set. Can be data object to setup several properties.
	*	@param	MIXED	[$value]	- Value to set. Not used if object passes as first parameter.
	*
	*	@return SELF
	*
	\**//** -------------------------------------------------------------------= by Mr.V!T @ Morad Media Inc. =----/** //**/
	set		: function ($option, $value) {

		var $this = this;

		// Values can come as object, or single value
		// Applying using object, for code unification below
		// Any variable are accepted, to allow custom data storage
		var $o = {};

		if ( arguments.length === 1 )
			$o = $option;
		else
			$o[$option] = $value;

	// ==== Events ====

		// Processing events, as those should be cleared before extending
		for ( var $i in $o ) {

			// Skipping non events and non funcitons
			if ( !this.__events[$i] || !isFunction($o[$i]) )
				continue;

			// Setting up event, and removing it from opitons
			this[$i]($o[$i]);
			delete($o[$i]);

		} //FOR each opiton

	// ==== Self ====

		jQuery.extend(true, $this, $o);

		return this;

	}, //FUNC set

	/** //** ----= init	=--------------------------------------------------------------------------------------\**//** \
	*
	*	Initiates dom and events.
	*
	*	@return SELF
	*
	\**//** -------------------------------------------------------------------= by Mr.V!T @ Morad Media Inc. =----/** //**/
	init			: function () {

		var $this	= this;
		$el		= _jq($el);

		// Configuring self
		$this.set($options);

	// ---- Defaults ----

		// Saving defaults for recurring
		$this.recurring.defaults	= jQuery.extend(true, {}, $this.recurring);
		 
		// Clearing defaults defaults :)
		delete($this.recurring.defaults.defaults);
		
	// ---- DOM ----

		// Looking for interesting elements and initializing DOM
		
		// Setting up form, others will be searched inside
		$this.dom.form			= $el;
		
		$this.initCommonElements( $this.dom.form );

	// ---- Events ----

		// All inputs in DOM (except form) are listened for change, some add custom listeners on top
		$this.initCommonChange('ecTransaction', function ( $event ) {

			// Updating self
			$this.update();

			// Triggering change, supplying updated transaction and event
			// Event contains data with input DOM name (alias)
			$this.onChange( $this, $event );
			
		}); //onChange

		// Calling init event
		$this.onInit();

		return $this;

	}, //FUNC init

	/** //** ----= initCommonElements	=------------------------------------------------------------------------------\**//** \
	*
	*	Initializes common DOM element
	*
	*	@param	element		$container		- Main container.
	*
	*	@return SELF
	*
	\**//** -------------------------------------------------------------------= by Mr.V!T @ Morad Media Inc. =----/** //**/
	initCommonElements		: function ( $container ) {

		var $this	= this;

		// Looking for preconfigured elements in container
		// Ones that defined as strings will be searched in container
		// Boolean falses will be ignored as those should be searched manually
		// Ones that have objects - already found before
		for ( var $i in $this.dom ) {
			
			var $query	= $this.dom[$i]; 

			// Skipping non-strings
			if ( !isString($query) )
				continue;

			// Looking for element in container
			$this.dom[$i]	= $container.find($query);
		/*/	
			// Not found elements (length = 0), keeping as still valid jQuery elements
			// This is sometimes used for optional elements, so keeping them as they are
			// Keeping code as idea though
			if ( $this.dom[$i].length == 0 )
				$this.dom[$i] = false;
		/**/
			
		} //FOR each dom element

		return $this;

	}, //FUNC initCommonElements

	/** //** ----= initCommonChange	=------------------------------------------------------------------------------\**//** \
	*
	*	Initializes common change events on DOM inputs.
	*
	*	@param	callable	$callback		- Callback to add.
	*
	*	@return SELF
	*
	\**//** -------------------------------------------------------------------= by Mr.V!T @ Morad Media Inc. =----/** //**/
	initCommonChange	: function ( $name, $callback ) {

		var $this	= this;

		// Looping through all inputs in DOM, and adding specified event 
		for ( var $i in $this.dom ) {
			
			$jInput	= $this.dom[$i];
			
			// Skipping unititialized
			if ( !$jInput || !isJQ($jInput) || $jInput.length == 0 )
				continue;

			// Binding individual events per input type, skipping unknowns
			// Doing so to filter double events (radio:off, radio:on)
			// And same time add more imideate change events on text inputs (keyup instead of change/focus)
			// ToDo: experiment with keypress timeouts
			
			$events	= {};

			if ( $jInput.is('input[type=text], textarea') ) {

				// Binding proper change for texts
				$events['change.'+$name]		= $callback;
			
				// But also triggering change on keyup to make it more responsive
				$events['keyup.'+$name]			= function () {
					
					jQuery(this).trigger('change.'+$name);
					
				}; //FUNC keyup

			} //IF text

			// Special case for hiddens - adding observer to trigger change on those
			// Found solution in stackoverflow.
			else if ( $jInput.is('input[type=hidden]') ) {

				// Adding change observer
				$jInput.observeChange();
				
				$events['change.'+$name]	= $callback;
				
			} //IF select, checkbox, hidden
			
			else if ( $jInput.is('input[type=checkbox], select') ) {
				
				$events['change.'+$name]	= $callback;
				
			} //IF select, checkbox, hidden

			else if ( $jInput.is('input[type=radio]') ) {
				
				// Radio is special, as we're interesed only in one with value on
				// Which could be done with click, but we want to catch dynamic setup 
				$events['change.'+$name]	= function ( $event ) {
					
					// Only when checked
					if ( this.checked )
						return $callback($event);
					
				}; //radio.change
				
			} //IF select, checkbox, hidden

			else if ( $jInput.is('button, input[type=button]') ) {

				// Nothing for buttons currently
				
			//	$events['click.'+$name]		= $callback;
			//	$events['mouseUp.'+$name]	= $callback;

			} //IF button presses
			
			else {
				// Skipping everything unknown
				continue;
				
			} //IF unknown

			// Preparing descriptor
			$eData	= {
				'name'	: $i,
			}; //$eData
				
			$jInput
				.off($events)
				.on($events, $eData)
			; //$jInput
			
		} //FOR each element

		return $this;

	}, //FUNC initCommonChange

	/** //** ----= get	=--------------------------------------------------------------------------------------\**//** \
	*
	*	Prepares transaction and returns self or false if payment should be canceled at this time.
	*
	*	@return SELF
	*
	\**//** -------------------------------------------------------------------= by Mr.V!T @ Morad Media Inc. =----/** //**/
	get		: function ($option, $value) {

		var $this	= this;

		// Updating self
		$this.update();

		// Returning falce when payment should be canceled
		// Transaction is still filled in, for special processors
		
		// Invoice normally asks for payment cancel
		if ( $this.invoice )
			return false;
			
		// Free items are also don't require payment
		if ( isEmpty($this.amount) )
			return false;
		
		return $this;

	}, //FUNC get
	
	/** //** ----= update	=--------------------------------------------------------------------------------------\**//** \
	*
	*	Updates all values on self according to form inputs and settings.
	*
	*	@return SELF
	*
	\**//** -------------------------------------------------------------------= by Mr.V!T @ Morad Media Inc. =----/** //**/
	update		: function () {

		var $this	= this;

		// Always filling in values, to make sure they are available even if cancel necessary
		// This can be handy for special invoice/free items processing
		// Main purpose of this object is to collect data into common formatted package
		// Validations and actual processing is outside of it's scope

		// Reading form as array to properly support customized stuff, like radio inputs/dropdowns and other fancy
		// It might get but, but it's still not that many inputs to worry about
		var $formData	= $this.dom.form.asArray();

		// ToDo: account for amount restrictions (min/max) and other options like this
		// ToDo: ideally - should pass toggles for optional stuff (rr_count, rr_ptype)
		// But there is no real need currently, just reading form and defaulting to widget

	// ---- Service ----
		
		$this.service	= $formData.gateway || '';
		$this.gateway	= $formData.widget || '';
		
	// ---- Email ----

		// Reading email if available. Leaving default if not
		$this.email = $this.dom.email.val() || $this.email; 

	// ---- Invoice ----

		$this.invoice	 = false;
		
		// Checking invoice. It can be checkbox or hidden, so checking both
		if ( $this.dom.invoice.is('[type=checkbox]') )
			$this.invoice = $this.dom.invoice.is(':checked');
		else 
			$this.invoice = !isEmpty( $this.dom.invoice.val() );

	// ---- Currency ----

		// Reading currency if available
		$this.currency = $this.dom.currency.val() || $this.currency; 

	// ---- Amount ----
		
		$this.amount		 = 0;
		
		// Reading amount and extras
		var $amount		= $this.dom.amount.val() * 1 || 0;
		var $amountEx		= $this.dom.amountEx.val() * 1 || 0;
		
		// Saving base values
		$this.amountBase	= $amount;
		$this.amountEx		= $amountEx;
		
		// Combining both into total amount, only if main amount is set
		if ( $amount )
			$this.amount	= $amount + $amountEx;

	// ---- Recurring ----

		// Reading recurring values
		// Basing process on .enabled - that is set by renderer from actualy widget/gateway settings
		if ( !$this.recurring.enabled ) {
			
			// Disabling recurring use anyway if not enabled :)
			$this.recurring.use		= false;
			
		} //IF not enabled	
		else {
			
			// All recurring inputs are optional, using form to read values
			// Defaulting to preset values if values are empty
			// All these schenanigans to provide complete transaction info, 
			// including optional inputs and widget settings
			
			// Using defaults for .use only if input actually missing on form
			// Otherwise - checking if it's not empty (this will cover checboxes, radios, etc)
			$this.recurring.use		= ( !isUndefined($formData.rr_recurring) ) ? !isEmpty($formData.rr_recurring) : $this.recurring.defaults.use;
			$this.recurring.periodType	= $formData.rr_ptype || $this.recurring.defaults.periodType;	
			$this.recurring.periodStep	= $formData.rr_pstep || $this.recurring.defaults.periodStep;	
			$this.recurring.count		= $formData.rr_count || $this.recurring.defaults.count;				

		} //IF enabled

	// ---- Items ----
	
		// Interraction with cart and orders is to come

		return $this;

	}, //FUNC update

	/** //** ----= asPost	=--------------------------------------------------------------------------------------\**//** \
	*
	*	Converts transaction info into payment form compatable values (like form.asArray(), but controlled).
	*
	*	@return object		- Form like data.
	*
	\**//** -------------------------------------------------------------------= by Mr.V!T @ Morad Media Inc. =----/** //**/
	asPost		: function () {

		var $this	= this;

		// Just collecting everything in one array
		var $res = {

			sn		: $this.dom.form.attr('id'),		// Adding form ID, it's useful
			
			email		: $this.email,
		
			amount		: $this.amount,

			rr_recurring	: $this.recurring.use ? 1 : 0,
			rr_ptype	: $this.recurring.periodType,
			rr_pstep	: $this.recurring.periodStep,
			rr_count	: $this.recurring.count,
		/**/
			// Adding gatway and service identifiers
			// Converting back to old fasion, but keeping new concept for reference
			widget		: $this.gateway,			
			gateway		: $this.service,			
		/*/
			gateway		: $this.gateway,			
			service		: $this.service,			
		/**/
		}; //res
		
		return $res;
		
	}, //FUNC asPost

}).init()}; //CLASS mwTransaction

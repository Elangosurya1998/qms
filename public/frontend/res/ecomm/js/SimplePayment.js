/** //** ----= CLASS mwPayment	=--------------------------------------------------------------------------------------\**//** \
*
*	Generic payment form helper. Initiates given form, applying hints and submission logic.	
*
* 	@package	MorwebManager
* 	@subpackage	ecomm
* 	@category	helper
*
*	@param		string	$sn	- Target form SN.
*
\**//** ---------------------------------------------------------------------------= by Mr.V!T @ Morad Media Inc. =----/** //**/
jQuery.fn.mwPayment = function ($options) {

	if ( !this.length )
		return;

	return this.data('mwPayment');//.set($options);

} //FUNC mwPayment
function mwPayment ( $sn ) { return {

	sn			: $sn,			// Form sn

	dom			: {			// Contains shortcuts to usable elements
	
		form			: false,		// Main form element (wrapper)
		
		amountInput		: false,		// Main amount input (either hidden or text)
		amountExInput		: false,		// Additional amount (extras)
		amountBttn		: false,	 	// Amount buttons (if present)
		
		rrInputs		: false, 		// Recurring inputs
		
		values			: false, 		// Displayable values on form
		hints			: false, 		// Form togglable hints
		
		invoiceInput		: false, 		// Invoice flag hidden input (if present)
		invoiceToggles		: false, 		// Invoice toggles elements

		gateInput		: false, 		// Selected gateway input (hidden)
		widgetInput		: false, 		// Associated widget input (hidden)
		gateToggles		: false, 		// Gateway selector inputs
		billing			: false, 		// Billing container
		gateways		: false, 		// Gateway forms
		
	}, //dom

	classes			: {			// Describes classes used for dom traversing and elements creation
	
		value			: 'mwPayment-value',		// Displayable values
		hint			: 'mwPayment-hint',		// Form hints
		input			: 'mwPayment-input',		// All UI inputs
		button			: 'mwPayment-button',		// All UI buttons

		billing			: 'mwPayment-billing',		// Billing section
		gateway			: 'mwPayment-gateway',		// Gateway form wrappers
		
	}, //classes

	/** //** ----= init	=--------------------------------------------------------------------------------------\**//** \
	*
	*	Initiates payment form.
	*
	*	@return self
	*
	\**//** -------------------------------------------------------------------= by Mr.V!T @ Morad Media Inc. =----/** //**/
	init			: function () {

		var $this = this;
	
	// ---- Dom ----	
		
		// Finding form
		$this.dom.form		= jQuery('#'+$this.sn);
		
		// Storing self in container for later reuse
		$this.dom.form.data('mwPayment', $this);
						
		// Amount buttons and input
		$this.dom.amountInput	= $this.dom.form.find('input[name=amount]');
		$this.dom.amountBttn	= $this.dom.form.find('.'+$this.classes.button+'.amount');

		// Recurring inputs
		$this.dom.rrInputs	= $this.dom.form.find('input[name=rr_recurring], input[name=rr_count]');

		// Invoice input and toggles
		$this.dom.invoiceInput	= $this.dom.form.find('input[name=invoice]');
		$this.dom.invoiceToggles= $this.dom.form.find('.'+$this.classes.button+'.invoice');
		
		// Values and hints
		$this.dom.values	= $this.dom.form.find('.'+$this.classes.value);
		$this.dom.hints		= $this.dom.form.find('.'+$this.classes.hint);

		// Gateway selection
		$this.dom.gateInput	= $this.dom.form.find('input[name=gateway]');
		$this.dom.widgetInput	= $this.dom.form.find('input[name=widget]');
		$this.dom.gateToggles	= $this.dom.form.find('.'+$this.classes.input+'.gateway');
		
		$this.dom.billing	= $this.dom.form.find('.'+$this.classes.billing);
		$this.dom.gateways	= $this.dom.billing.children('.'+$this.classes.gateway);

		// If amount buttons are present - custom amount should be hidden
		if ( $this.dom.amountBttn.length )
			$this.dom.form.find('.'+$this.classes.input+'.amount').hide();
		
	// ---- Events ----
	
		// Currently using regular form submisison, inherited from contacts
		// In future custom submission will be applied here
		
		// Initiating amount buttons
		$this.dom.amountBttn.click( function () {

			// Updating amount and recurring math
			$this.updateAmount(this);
			$this.updateRecurring();

		}); //FUNC jQuery(button).click

		// Custom amount input
		$this.dom.amountInput.keyup( function () {

			// Updating amount and recurring math
			$this.updateAmount(this);
			$this.updateRecurring();

		}); //FUNC jQuery(amount).keyup

		// Recurring inputs
		$this.dom.rrInputs.on('change keyup', function () {

			// Updating recurring math
			$this.updateRecurring();

		}); //FUNC jQuery(rrInput).click

		// Invoice toggles
		$this.dom.invoiceToggles.click( function () {
			
			$this.toggleInvoice(this);
			
		} ); //FUNC jQuery(invoiceToggles).click

		// Gateway input and toggles
		$this.dom.gateInput.on('change', function () {
			
			$this.updateGateway(this);
				
		}); //FUNC jQuery(gateInput).change

		$this.dom.gateToggles.click( function () {
	
			// Toggling gate	
			$this.toggleGateway(this);
			
			// Triggering change on hidden
			$this.dom.gateInput.trigger('change');
			
			return false;
			
		} ); //FUNC jQuery(gateToggles).click

	// ---- PreMath ----	

		// Updating recurring math right on load, to reinit hints
		$this.updateRecurring();
		
		// Pre-selecting gateway
		$this.updateGateway($this.dom.gateInput);
		
		return $this;
		
	}, //FUNC init
		
	/** //** ----= updateAmount	=------------------------------------------------------------------------------\**//** \
	*
	*	Updates amount related buttons and inputs.
	*
	*	@param	jQuery	$el	- Source amount element (input or button)
	*
	*	@return self
	*
	\**//** -------------------------------------------------------------------= by Mr.V!T @ Morad Media Inc. =----/** //**/
	updateAmount		: function ( $el ) {
		
		var $this = this;
		$el = _jq($el);
	
	// ---- Amount ----
		
		// Checking what's given and getting amount value
		// Can be either input, or button wrapper (normally div with some classes)
		var $isButton	= !$el.is('input'); 
		var $amount	= 0;
		
		if ( $isButton ) {
			
			// Getting amount from button data or value
			$amount = $el.data('value') || $el.attr('value');
			
			// When button pressed input should be updated
			// Numeric value is set, or custom amount is shown
			if ( !isNumeric($amount) ) {

				$this.dom.form.find('.'+$this.classes.input+'.amount').show();		

			} //IF other amount is selected
			else {
						
				$this.dom.form.find('.'+$this.classes.input+'.amount').hide();		
				$this.dom.amountInput.val($amount);

				// Triggering amount input events
				$this.dom.amountInput.trigger('change');
				
			} //IF numeric amount
			
			// If input have onchange for amount updates - should leave here
			// Currently keyup is used, so continuing
			
		} //IF button
		else {
			
			// Just getting amount
			$amount = $el.val();
			
		} //IF input
			
	// ---- Toggles ----

		// Deselecting any selected, and looking for amount button to select
		$this.dom.amountBttn.removeClass('init selected');
		
		// Looking up button for selected amount
		// If found corresponding button - selecting it. Otherwise - selecting "other" button
		var $btn = $this.dom.amountBttn.filter('[data-value="' + $amount + '"], [value="' + $amount + '"]'); 

		if ( !isEmpty($btn.length) )
			$btn.addClass('selected');
		else
			$this.dom.amountBttn.filter('[data-value="other"], [value="other"]').addClass('selected');
	
		// ToDo: Switch of additional options, based on min amount
	
		return $this;
		
	}, //FUNC updateAmount

	/** //** ----= updateRecurring	=------------------------------------------------------------------------------\**//** \
	*
	*	Updates recurring values and hints.
	*
	*	@return self
	*
	\**//** -------------------------------------------------------------------= by Mr.V!T @ Morad Media Inc. =----/** //**/
	updateRecurring		: function () {

		var $this	= this;

	// ---- Data ----
	
		// Getting current form setup
		var $data	= $this.dom.form.asArray(); 
	
		// Preparing some values, using common inputs
		var $amount	= $data['amount'];
		var $amountEx	= $data['amountEx'] || 0;		
		var $count	= $data['rr_count'] * 1;
		var $total	= 0;
	
		// Checking which option is selected
		var $rrType	= $data['rr_recurring'];
	
	// ---- Validatoins ----
	
		// If setup is incomplete - hiding recurring hints
		if ( isEmpty($amount) || isEmpty($count) ) {

			$this.toggleHint('recurring', false);
			
			return $this;

		} //IF nothing to show
	
	// ---- Math ----
	
		// Calculating total and amount based on recurring type
		// Extra amount is always added to amount		
		$amount	= $amount*1 + $amountEx*1;
		
		// No recurring 
		if ( isEmpty($rrType) ) { 
			
			$total	= $amount;
			
		} //IF no recurring
		
		// Split recurring: amount is split over count
		else if ( $rrType === 'split' ) {
			
			$total	= $amount;
			$amount	= Math.round( ($total / $count) * 100 ) / 100; 
			
		} //IF split
	
		// Regular recurring: amount paid every month
		else {
	
			// Making sure value is defined
			$rrType	= 'monthly';
			$total	= $amount * $count;
			
		} //IF normal
	
	// ---- UI ----
	
		// Updating values
		$this.updateValue('recurring amount', $amount);
		$this.updateValue('recurring count', $count.toFixed(0) + '', true);
		$this.updateValue('recurring total', $total);
	
		// Toggling hints
		$this.toggleHint('recurring off', isEmpty($rrType));
		$this.toggleHint('recurring on', !isEmpty($rrType));

		$this.toggleHint('recurring none', isEmpty($rrType));
		$this.toggleHint('recurring split', $rrType === 'split');
		$this.toggleHint('recurring monthly', $rrType === 'monthly');
		
		return $this;
		
	}, //FUNC updateRecurring

	/** //** ----= toggleInvoice	=------------------------------------------------------------------------------\**//** \
	*
	*	Toggle invoice flag state, based on clicked input class. 
	*
	*	@param	string	$name	- Value or hint name.
	*
	*	@return string		- Class name to use on dom traversing.
	*
	\**//** -------------------------------------------------------------------= by Mr.V!T @ Morad Media Inc. =----/** //**/
	toggleInvoice		: function ( $el ) {

		var $this	= this;
		$el		= jQuery($el);

		// Nothing to do if invoice is not enabled at all
		if ( $this.dom.invoiceInput.length == 0 )
			return;
			
		// Checking which toggle is pressed: on|off|toggle
		// For on/off just setting corresponding value
		// For toggle - toggling existing
		// Any other - do nothing
		if ( $el.is('.on') )
			$this.dom.invoiceInput.val('1');
		else if ( $el.is('.off') )
			$this.dom.invoiceInput.val('0');
		else if ( $el.is('.toggle') ) 
			$this.dom.invoiceInput.val( isEmpty($this.dom.invoiceInput.val()) ? '1' : '0' );

	}, //FUNC toggleInvoice

/* ==== GATEWAYS ============================================================================================================ */ 

	/** //** ----= toggleGateway	=------------------------------------------------------------------------------\**//** \
	*
	*	Changes selected gateway.	 
	*
	\**//** -------------------------------------------------------------------= by Mr.V!T @ Morad Media Inc. =----/** //**/
	toggleGateway		: function ( $el ) {

		var $this	= this;
		$el		= jQuery($el);
		
		var $service	= $el.data('service');
		var $widget	= $el.data('widget');

		// Just setting values to main inputs
		$this.dom.gateInput.val($service);
		$this.dom.widgetInput.val($widget);

		return false;

	}, //FUNC toggleGateway

	/** //** ----= updateGateway	=------------------------------------------------------------------------------\**//** \
	*
	*	Changes selected gateway.	 
	*
	\**//** -------------------------------------------------------------------= by Mr.V!T @ Morad Media Inc. =----/** //**/
	updateGateway		: function ( $el ) {

		var $this	= this;
		$el		= jQuery($el);
		 
		// Retrieving selected gateways
		var $service	= $el.val();

		// Resetting selection if nothing is selected
		if ( !$service )
			return $this.resetGateway($el);

		// Marking toggles
		$this.dom.gateToggles.filter('.'+$service).addClass('selected hi');
		$this.dom.gateToggles.filter(':not(.'+$service+')').removeClass('selected hi');

		// Switching forms		
		if ( $this.dom.gateways.is(':visible') ) {

			$this.dom.gateways.filter('.'+$service).slideDown(200);
			$this.dom.gateways.filter(':not(.'+$service+')').slideUp(200);
			
		 } //IF can animate
		else {

			$this.dom.gateways.filter('.'+$service).show();
			$this.dom.gateways.filter(':not(.'+$service+')').hide();

		} //IF hidden yet

		return false;

	}, //FUNC updateGateway

	/** //** ----= resetGateway	=------------------------------------------------------------------------------\**//** \
	*
	*	Clears selected gateway.	 
	*
	\**//** -------------------------------------------------------------------= by Mr.V!T @ Morad Media Inc. =----/** //**/
	resetGateway		: function ( $el ) {

		var $this	= this;
		$el		= jQuery($el);
		
		// Clearing selection on toggles 
		$this.dom.gateToggles.removeClass('selected hi');
		
		// Hiding with slide to avoid jumping
		// Not using slide unless gates are visible
		if ( $this.dom.gateways.is(':visible') )
			$this.dom.gateways.slideUp(200);
		else
			$this.dom.gateways.hide();

		return false;

	}, //FUNC resetGateway

/* ==== HELPERS ============================================================================================================= */ 

	/** //** ----= nameToClass	=------------------------------------------------------------------------------\**//** \
	*
	*	Convets space separated name to element class name. 
	*
	*	@param	string	$name	- Value or hint name.
	*
	*	@return string		- Class name to use on dom traversing.
	*
	\**//** -------------------------------------------------------------------= by Mr.V!T @ Morad Media Inc. =----/** //**/
	nameToClass		: function ( $name ) {

		return ('.' + $name.split(' ').join('.'));

	}, //FUNC nameToClass

	/** //** ----= updateValue	=------------------------------------------------------------------------------\**//** \
	*
	*	Updates given value.
	*
	*	@param	string	$name		- Value name.
	*	@param	string	$value		- Value value o_O.
	*	@param	bool	[$exact]	- Set TRUE to do not parse numerics.
	*
	*	@return self
	*
	\**//** -------------------------------------------------------------------= by Mr.V!T @ Morad Media Inc. =----/** //**/
	updateValue		: function ( $name, $value, $exact ) {

		// Updating html of speciefic value
		this.dom.values.filter( this.nameToClass($name) ).html( (!$exact && isNumeric($value)) ? parseFloat($value).toFixed(2) : $value );

		return this;
		
	}, //FUNC updateValue

	/** //** ----= toggleHint	=------------------------------------------------------------------------------\**//** \
	*
	*	Toggles hint into given state.
	*
	*	@param	string	$name	- Toggle name.
	*	@param	string	$value	- Toggle state.
	*
	*	@return self
	*
	\**//** -------------------------------------------------------------------= by Mr.V!T @ Morad Media Inc. =----/** //**/
	toggleHint		: function ( $name, $state ) {

		// Looking for hint to update
		var $hint	= this.dom.hints.filter( this.nameToClass($name) ); 

		if ( $state )
			$hint.show();
		else
			$hint.hide();

		return this;
		
	}, //FUNC toggleHint


}.init()} //CONSTRUCTOR mwPayment


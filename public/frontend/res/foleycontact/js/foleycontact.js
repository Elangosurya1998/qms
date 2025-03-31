jQuery.fn.foleyContact = function ($options) {

	if ( !this.length )
		return;

	return this.data('foleyContact').set($options);

} //FUNC foleyContact



var foleyContact		= function ($el, $options) {

	return vEventObject(['onSubmit', 'onReset'], {

		userId		: false,
		email			: false,

		emailFetched	: false,

		dom			: {				// Set of interesting dom elements

			form			: false,			// Main form element
			btnSubmit		: false,			// submit button
			btnOpen		: false,			// submit button
			email			: false,
			requestForm		: false
		}, //dom

/* ==== SETUP =============================================================================================================== */

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

			jQuery.extend(this, $o);

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

			$this.set($options);
			// ---- DOM ----

			// Storing self in container for later reuse
			$el.data('foleyContact', $this);

			$this.dom.form		= $el;

			$this.dom.btnSubmit	= $el.find('.foleyContact-submit');
			$this.dom.btnOpen	= $el.find('.foleyContact-open');
			// $this.dom.email		= $el.find('.foley-email');

			//SerStoVik: replaced email selector with id that filled in getEmail method
			$this.dom.email		= $el.find('#rreq_email');
			$this.dom.requestForm	= $el.find('.foley-request-form');
			// ---- Events ----

			// Prevent default form submission globally
			$this.dom.form.on('submit', function(e) {
				e.preventDefault();
				// console.log("Default form submission prevented.");
			});

/*SerStoVik  old version /
			// Adding submit event
			$this.dom.btnOpen.on('click', function ($e) {

				$e.preventDefault();
				var $el	= jQuery(this);

				$this.getEmail($el);
				$email = $this.dom.form.val();

				console.log('email', $email);
				$this.email = $email;

				// Open the popup
				jQuery('.mdPopupWrap').addClass('open');

			}); //FUNC onClick



			// Adding submit event
			$this.dom.btnSubmit.on('click', function ($e) {
					var $el	= jQuery(this);
					// Calling submit
					$this.submit($el);

				}); //FUNC onClick
			/*SerStoVik */

			$this.dom.btnOpen.on('click', function($e) {

				$e.preventDefault();

				var $el = jQuery(this);

				// Fetch email and wait for completion
				$this.getEmail($el).then(() => {
					// console.log("Opening popup after fetching email...");
					jQuery('.mdPopupWrap').addClass('open'); // Open popup after fetching email
				}).catch((err) => {
					console.error("Error fetching email. Popup will not open:", err);
				});
			});

			$this.dom.btnSubmit.on('click', function($e) {
				$e.preventDefault(); // Prevent default button behavior
				// console.log("Submit button clicked.");
				$this.submit($el); // Trigger custom submission logic
			});

			return $this;

		}, //FUNC init

/** //** ----= submit	=--------------------------------------------------------------------------------------\**//** \
 *
 *	Triggering form submit.
 *
 \**//** -------------------------------------------------------------------= by Mr.V!T @ Morad Media Inc. =----/** //**/


 /*SerStoVik old version /
 		submit		: function ($el) {


			var $this	= this;

			// Prevent the default form submission
			$this.dom.form.on('submit', function (e) {
				e.preventDefault();
			});

			// Ensure all required fields are filled
			var isValid = true;
			$this.dom.requestForm.find('input, textarea').each(function () {

				if (!jQuery(this).val() && this.type !== 'hidden') {
					isValid = false;
					alert('Please fill in all required fields.');
					return false; // Exit the loop
				}
			});

			if (!isValid) {
				return; // Prevent submission
			}

			var $email 	= $this.email;

			console.log('foley submit starts...email is:', $email);

			$options = {
				'rreq_email' 	: $email,
				'req_name'	: $this.dom.requestForm.find('input[name="req_name"]').val(),
				'reg_email'	: $this.dom.requestForm.find('input[name="reg_email"]').val(),
				'reg_message'	: $this.dom.requestForm.find('textarea[name="reg_message"]').val()
			};

// Validate fields before proceeding
			if (!$options.req_name || !$options.reg_email || !$options.reg_message) {
				alert("Please fill in all required fields.");
				return;
			}

			//Serstovik: send email
			// mwAjax('/ajax/foleycontact/requestContact', $this.dom.requestForm, false)
			mwAjax('/ajax/foleycontact/requestContact', $options, false)

				.success( function ($res) {

					console.log('success', $res);

					$( ".mdPopupWrap" ).removeClass( "open" );
					$this.dom.requestForm.find('input, textarea').each(function(){
						if (this.type !== 'hidden') {
							jQuery(this).val('');
						} //IF
					});

					$this.dom.requestForm.find('input:submit').val('Send');

					jQuery('#request_thankyou').show();

				}) //onSuccess

				.error( function ($res) {
					console.log('error', $res);
				}) //onError

				.go();

			// Nothing else to do currently

			return $this;

		}, //FUNC submit

/*SerStoVik */

		submit: function($el) {

			var $this = this;

			// Ensure all required fields are filled
			var isValid = true;
			$this.dom.requestForm.find('input, textarea').each(function() {
				if (!jQuery(this).val() && this.type !== 'hidden') {
					isValid = false;
					alert('Please fill in all required fields.');
					return false; // Exit the loop
				}
			});

			if (!isValid) {
				console.log("Validation failed. Form not submitted.");
				return; // Prevent submission
			}

			// Check if email is fetched
			if (!$this.emailFetched || !$this.email) {

				// alert("Email has not been fetched yet. Please wait.");
				// console.error("Email is missing or not fetched:", $this.email);
				// return;

				// console.log('check another place with email');
				$this.email = jQuery("#fetched_email").val();
				// console.log("fetched email is: ", $this.email);

			} //IF


			// Check that email is set
			if (!$this.email) {
				alert("Email is missing. Please ensure it is fetched.");
				// console.error("Email is missing:", $this.email);
				return;
			}

			// console.log("Email in submit before sending:", $this.email);

			var $options = {
				'rreq_email': $this.email,
				'req_name': $this.dom.requestForm.find('input[name="req_name"]').val(),
				'reg_email': $this.dom.requestForm.find('input[name="reg_email"]').val(),
				'reg_message': $this.dom.requestForm.find('textarea[name="reg_message"]').val()
			};

			// console.log("Submitting form with options:", $options);

			mwAjax('/ajax/foleycontact/requestContact', $options, false)
				.success(function($res) {

					// console.log('success data', $res);
					$(".mdPopupWrap").removeClass("open");
					$this.dom.requestForm.find('input, textarea').val('');
					$('#request_thankyou').show();
				})
				.error(function($res) {
					console.error("Error submitting form:", $res);
				})
				.go();

		}, //func submit


		test		: function () {

			var $this	= this;

		}, //FUNC test
/*SerStoVik  old version/
		getEmail		: function($el){

			var $this	= this;

			//getting fileId
			var $parent	= $el.parent(".teamItem");
			var $id		= $parent.find(".fileId").val();

			$this.userId	= $id;

			$options= {"id" : $id};

			//Serstovik: send email
			mwAjax('/ajax/foleycontact/getEmail', $options, false)

				.success( function ($res) {

					// $this.dom.email.val($res.content);
					// console.log($this.dom.email.val());
					$this.dom.requestForm.find('input[name="rreq_email"]').val($res.content);
					console.log(254, $this.dom.email.val());
					$this.email = $this.dom.email.val();

				}) //onSuccess

				.error( function ($res) {
					// console.log('getEmail e', $res);

				}) //onError

				.go();

			return $this;

		} //FUNC getEmail
/*SerStoVik */

		getEmail: function($el) {
			var $this = this;

			// Return a Promise to control asynchronous flow
			return new Promise((resolve, reject) => {
				var $parent = $el.parent(".teamItem");
				var $id = $parent.find(".fileId").val();

				$this.userId = $id;
				$options = { "id": $id };

				mwAjax('/ajax/foleycontact/getEmail', $options, false)
					.success(function($res) {
						// Update both the DOM and the instance variable
						$this.dom.email.val($res.content);
						$this.email = $res.content; // Update $this.email

						jQuery("#fetched_email").val($this.email);

						$this.emailFetched = true;
						// console.log("Email fetched and set:", $this.email);
						resolve(); // Resolve the Promise
					})
					.error(function($res) {
						// console.error("Failed to fetch email:", $res);
						$this.emailFetched = false;
						reject(); // Reject the Promise
					})
					.go();
			});
		},


	}).init();

}; //CLASS neonFilter

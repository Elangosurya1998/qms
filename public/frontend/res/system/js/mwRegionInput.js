/** //** ----= mwUpdateStates	=--------------------------------------------------------------------------------------\**//** \
*
* 	Updates states selector, showing only states for selected country
*
*	@param	jQuery	[$el]		- Host element in country/state input.
*	@param	strin	[$stateValue]	- Default state value. Blank if omited
*
\**//** ---------------------------------------------------------------------------= by Mr.V!T @ Morad Media Inc. =----/** //**/
function mwUpdateStates	($el, $stateValue) {

	$stateValue	= $stateValue || '';

	// If no element provided - trying to search for default one
	if ( !$el )
		$el = jQuery('#country');

	// Making sure it's jQuery, if provided
	$el = _jq($el);
	
	// Event can be triggered somwhere inside complex input, so better to research all fast
	var $parent	= $el.closest('.mwRegionInput');

	// Shortcuts for elements
	var $country	= $parent.find('SELECT[data-region=country]');		// Countries selector
	var $state	= $parent.find('SELECT[data-region=state]');		// States selector
	var $states	= $parent.find('SELECT[data-region=states]');		// States list selector to use as source
	
// ---- OPTIONS ----	
	
	// Need to get real abbreviation: in some custom cases value != abbr
	// In custom cases - additinal data is added for abbreviation
	var $o		= $country.find('OPTION:selected');
	var $abbr	= $o.attr('data-abbr') || $o.attr('value');
	
	// Cleaning values and coppying only necessary, searching them in source list
	$state.find('OPTION:not(.empty)').remove();
	
	// Abbr can became empty (default "Please select options")
	// In this case - should deselect states
	if ( $abbr ) {
		var $new = $states.find('.' + $abbr).clone();
		$new.appendTo($state);
	} //IF abbreviation found
	
	// Zeroing value
	$state.val($stateValue).change();

// ---- DISPLAY ----

	// Depending on options hiding or showing state
	if ( $abbr && $new.length ) {
		
		$parent.find('.Cell-Country').width('50%');
		$parent.find('.Cell-State').show();
		
	} else { //IF showing

		$parent.find('.Cell-Country').width('100%');
		$parent.find('.Cell-State').hide();
		
	} //IF hiding

} //FUNC mwUpdateStates

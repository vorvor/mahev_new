$(document).ready(function() {
	// Init model.
	$('#configurator').attr('data-model', 'MY');

	// Init facility option buttons.
	$('._configurator-tabs #conf-tab-1 ._radio-extras').attr('data-prop', 'facility');
	$('._configurator-tabs #conf-tab-1 ._radio-extras:eq(0)').attr('data-val', 'LR');
	$('._configurator-tabs #conf-tab-1 ._radio-extras:eq(1)').attr('data-val', 'PE');

	// Init color option buttons.
	$('._configurator-tabs #conf-tab-2 ._radio-extras').attr('data-prop', 'extColor');
	$('._configurator-tabs #conf-tab-2 ._radio-extras:eq(0)').attr('data-val', 'ExWh');
	$('._configurator-tabs #conf-tab-2 ._radio-extras:eq(1)').attr('data-val', 'ExBk');
	$('._configurator-tabs #conf-tab-2 ._radio-extras:eq(2)').attr('data-val', 'ExGr');
	$('._configurator-tabs #conf-tab-2 ._radio-extras:eq(3)').attr('data-val', 'ExBl');
	$('._configurator-tabs #conf-tab-2 ._radio-extras:eq(4)').attr('data-val', 'ExRd');

	// Init rim option buttons.
	$('._configurator-tabs #conf-tab-3 ._radio-extras').attr('data-prop', 'rim');
	$('._configurator-tabs #conf-tab-3 ._radio-extras:eq(0)').attr('data-val', '19cGem');
	$('._configurator-tabs #conf-tab-3 ._radio-extras:eq(1)').attr('data-val', '20cInd');
	$('._configurator-tabs #conf-tab-3 ._radio-extras:eq(2)').attr('data-val', '21cUturb');

	// Interior option buttons.
	$('._configurator-tabs #conf-tab-4 ._radio-extras').attr('data-prop', 'intColor');
	$('._configurator-tabs #conf-tab-4 ._radio-extras:eq(0)').attr('data-val', 'IntBk');
	$('._configurator-tabs #conf-tab-4 ._radio-extras:eq(1)').attr('data-val', 'IntBkWh');

	// Hook option buttons.
	$('._configurator-tabs #conf-tab-6 ._toggle-extras').attr('data-prop', 'hook');
	$('._configurator-tabs #conf-tab-6 ._toggle-extras:eq(0)').attr('data-val', 'th');
})
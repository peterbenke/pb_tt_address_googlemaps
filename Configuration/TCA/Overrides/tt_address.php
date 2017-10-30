<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

// Change TCA: address - input field instead of textarea
unset($GLOBALS['TCA']['tt_address']['columns']['address']['config']);
$GLOBALS['TCA']['tt_address']['columns']['address']['config'] = array(
	'type' => 'input',
	'size' => '20',
	'eval' => 'trim',
	'max' => '255'
);

// Change TCA: longitude => wizard for geocoder
$GLOBALS['TCA']['tt_address']['columns']['longitude']['config']['wizards'] = array(
	'geocoder' => array(
		'type' => 'popup',
		'title' => 'LLL:EXT:pb_tt_address_googlemaps/Resources/Private/Language/locallang.xlf:tt_address.geocoder.title',
		'icon' => 'EXT:pb_tt_address_googlemaps/Resources/Public/Icons/wizard-geocoder.png',
		'module' => array(
			'name' => 'pb_tt_address_googlemaps_wizard_geocoder',
		),
		'params' => array(
			'mode' => 'point',
		),
		'JSopenParams' => 'height=600,width=850,status=0,menubar=0,scrollbars=yes',
	)
);
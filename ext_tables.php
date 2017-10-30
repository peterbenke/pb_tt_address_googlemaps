<?php
defined('TYPO3_MODE') or die();

// Register plugin
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'PeterBenke.' . $_EXTKEY,
	'Addresslist',
	'LLL:EXT:pb_tt_address_googlemaps/Resources/Private/Language/locallang_be.xlf:addresslist.pluginName'
);

// Add typoscript
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Address List with Google Maps');

// Add flexform
$extensionName = \TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($_EXTKEY);
$pluginSignature	= strtolower($extensionName).'_addresslist';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
	$pluginSignature,
	'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_addresslist.xml'
);

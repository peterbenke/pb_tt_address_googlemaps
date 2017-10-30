<?php
defined('TYPO3_MODE') or die();

/**
 * Configure plugin
 */
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(

	'PeterBenke.' . $_EXTKEY,

	'Addresslist',

	[
		'Address' => 'list',
	],

	// non-cacheable actions
	[]

);

/**
 * Register icons
 */
if (TYPO3_MODE === 'BE') {
	$icons = [
		'ext-pbttaddressgooglemaps-wizard-icon' => 'wizard-plugin.svg'
	];
	$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
	foreach ($icons as $identifier => $path) {
		$iconRegistry->registerIcon(
			$identifier,
			\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
			['source' => 'EXT:pb_tt_address_googlemaps/Resources/Public/Icons/' . $path]
		);
	}
}

/**
 * Page TsConfig
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:pb_tt_address_googlemaps/Configuration/TSconfig/ContentElementWizard.ts">');

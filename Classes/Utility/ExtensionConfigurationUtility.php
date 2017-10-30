<?php
namespace PeterBenke\PbTtAddressGooglemaps\Utility;

class ExtensionConfigurationUtility{

	/**
	 * Gets the configuration of the extension
	 * @author Peter Benke <info@typomotor.de>
	 * @return array
	 */
	public static function getCurrentConfiguration(){

		/**
		 * @var \TYPO3\CMS\Extbase\Object\ObjectManager $objectManager
		 * @var \TYPO3\CMS\Extensionmanager\Utility\ConfigurationUtility $configurationUtility
		 */
		$objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');
		$configurationUtility = $objectManager->get('TYPO3\CMS\Extensionmanager\Utility\ConfigurationUtility');

		$extensionConfiguration = $configurationUtility->getCurrentConfiguration('pb_tt_address_googlemaps');
		return $extensionConfiguration;

	}

	/**
	 * Gets the Google Api Key
	 * @author Peter Benke <info@typomotor.de>
	 * @return mixed
	 */
	public static function getGoogleApiKey(){

		$configuration = self::getCurrentConfiguration();
		return $configuration['googleApiKey']['value'];

	}

}
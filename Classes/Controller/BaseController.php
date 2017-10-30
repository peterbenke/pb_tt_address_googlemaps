<?php
namespace PeterBenke\PbTtAddressGooglemaps\Controller;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016 Peter Benke <info@typomotor.de>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/


/**
 * BaseController
 */
class BaseController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController{

	/**
	 * addressRepository
	 *
	 * @var \PeterBenke\PbTtAddressGooglemaps\Domain\Repository\AddressRepository
	 * @inject
	 */
	protected $addressRepository = null;

	/**
	 * Path to Javascript
	 */
	const PATH_TO_JS = 'typo3conf/ext/pb_tt_address_googlemaps/Resources/Public/JavaScript/';

	protected function getProtocolAndHost(){

		$protocol = 'http';
		if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on'){
			$protocol = 'https';
		}
		return $protocol . '://' . $_SERVER['HTTP_HOST'];

	}

	/**
	 * Add js-files into footer
	 * @author Peter Benke <info@typomotor.de>
	 * @return void
	 */
	protected function addJavascript(){

		// Return, if google map should not be shown
		if(!$this->settings['displayGoogleMap']){
			return;
		}

		// Return, if no google api key is defined
		$googleApiKey = \PeterBenke\PbTtAddressGooglemaps\Utility\ExtensionConfigurationUtility::getGoogleApiKey();
		if(empty($googleApiKey)){
			$this->view->assign('NoGoogleApiKeyDefined', true);
			return;
		}

		/**
		 * @var $pageRenderer \TYPO3\CMS\Core\Page\PageRenderer
		 */
		$pageRenderer = $this->objectManager->get('TYPO3\\CMS\\Core\\Page\\PageRenderer');

		$pageRenderer->addHeaderData('<script async defer src="https://maps.googleapis.com/maps/api/js?key=' . $googleApiKey . '&callback=initMap"></script>');
		$pageRenderer->addJsFooterFile('typo3conf/ext/pb_tt_address_googlemaps/Resources/Public/JavaScript/googleMaps.js');

	}

}
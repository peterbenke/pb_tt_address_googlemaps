<?php
namespace PeterBenke\PbTtAddressGooglemaps\Domain\Repository;


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
 * The repository for Addresses
 */
class AddressRepository extends \TYPO3\CMS\Extbase\Persistence\Repository{

	/**
	 * @var array
	 */
	private $mapOrder = array(
		'name' => array(
			'last_name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		),
		'country' => array(
			'country' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'last_name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
		)
	);

	/**
	 * Debug Extbase Query
	 * @param \TYPO3\CMS\Extbase\Persistence\QueryInterface $query
	 * @author Peter Benke <info@typomotor.de>
	 * return void
	 */
	private function debugQuery(\TYPO3\CMS\Extbase\Persistence\QueryInterface $query){

		/**
		 * @var $db \TYPO3\CMS\Core\Database\DatabaseConnection
		 */
		$db = $GLOBALS['TYPO3_DB'];

		$db->debugOutput = 2;
		$db->explainOutput = true;
		$db->store_lastBuiltQuery = true;
		$return = $query->execute();
		$return->toArray();
		die();

	}

	/**
	 * Find the addresses
	 * @param $orderBy
	 * @param $categoriesCommaSeparated
	 * @author Peter Benke <info@typomotor.de>
	 * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
	 */
	public function findAddresses($orderBy = 'last_name', $categoriesCommaSeparated = '') {


		$query = $this->createQuery();
		// $query->setLimit(3);

		// Order by
		if(array_key_exists($orderBy, $this->mapOrder)){
			$query->setOrderings($this->mapOrder[$orderBy]);
		}

		// If there are categories selected
		if(!empty($categoriesCommaSeparated)){

			$categories = \TYPO3\CMS\Core\Utility\GeneralUtility::intExplode(',', $categoriesCommaSeparated, true);

			$constraints = array();
			foreach ($categories as $category) {
				$constraints[] = $query->contains('categories', $category);
			}

			$query->matching($query->logicalOr($constraints));

		}

		// $this->debugQuery($query);

		return $query->execute();
	}
    
}
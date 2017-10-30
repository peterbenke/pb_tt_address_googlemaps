<?php
namespace PeterBenke\PbTtAddressGooglemaps\Utility;

class GeneralUtility{

	/**
	 * Converts a comma separated list of values to a comma separated list of integers
	 * @param string $list
	 * @author Peter Benke <info@typomotor.de>
	 * @return string
	 */
	public static function commaSeparatedListToInt($list){

		$array = \TYPO3\CMS\Core\Utility\GeneralUtility::intExplode(',', $list);
		return implode(',', $array);

	}

}
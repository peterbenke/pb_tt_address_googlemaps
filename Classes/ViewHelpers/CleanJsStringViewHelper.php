<?php
namespace PeterBenke\PbTtAddressGooglemaps\ViewHelpers;


class CleanJsStringViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

	/**
	 * Cleans a string for javascript (has to be quoted with ')
	 * @author Peter Benke <info@typomotor.de>
	 * @return string
	 */
	public function render() {

		$content = $this->renderChildren();

		// Strip new lines
		$content = str_replace("\r", '', $content);
		$content = str_replace("\n", '', $content);

		// Mask Quotes
		$content = str_replace("'", "\'", $content);

		return $content;

	}
}

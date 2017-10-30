<?php
namespace PeterBenke\PbTtAddressGooglemaps\ViewHelpers;


class WrapViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

	/**
	 * Initialize arguments
	 * @throws \TYPO3\CMS\Fluid\Core\ViewHelper\Exception
	 */
	public function initializeArguments(){
		$this->registerArgument('wrap', 'wrap', 'The wrap');
		parent::initializeArguments();
	}

	/**
	 * Wraps a string
	 * @return string
	 */
	public function render() {

		$wrap = $this->arguments['wrap'];

		$content = $this->renderChildren();
		$content = str_replace('|', $content, $wrap);

		return $content;

	}
}

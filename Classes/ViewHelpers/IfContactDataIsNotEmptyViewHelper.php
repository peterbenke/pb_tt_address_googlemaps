<?php
namespace PeterBenke\PbTtAddressGooglemaps\ViewHelpers;


class IfContactDataIsNotEmptyViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractConditionViewHelper {

	/**
	 * Initialize arguments
	 * @throws \TYPO3\CMS\Fluid\Core\ViewHelper\Exception
	 */
	public function initializeArguments(){
		$this->registerArgument('address', 'PeterBenke\PbTtAddressGooglemaps\Domain\Model\Address', 'The address');
		parent::initializeArguments();
	}

	/**
	 * Evaluate
	 * @param array|null $arguments
	 * @return bool
	 */
	protected static function evaluateCondition(array $arguments = null) {

		if($arguments['address'] instanceof \PeterBenke\PbTtAddressGooglemaps\Domain\Model\Address) {

			if(
				!empty($arguments['address']->getPhone())
				||
				!empty($arguments['address']->getFax())
				||
				!empty($arguments['address']->getMobile())
				||
				!empty($arguments['address']->getEmail())
				||
				!empty($arguments['address']->getWww())
			){
				return true;
			}


		}

		return false;

	}

}

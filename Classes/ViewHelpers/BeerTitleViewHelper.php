<?php
namespace MOC\Beer\ViewHelpers;

use MOC\Beer\Domain\Model\Beer;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Class object type view helper
 *
 * @package MOC\Beer
 */
class BeerTitleViewHelper extends AbstractViewHelper {

	/**
	 * @param Beer $beer
	 */
	public function render(Beer $beer) {
		$returnValue =  $beer->getName();
		$brevery = $beer->getBrewery();
		if ($brevery !== NULL) {
			$returnValue .= ' (Bryggeri: ' . $brevery->getName() . ')';
		}
		return $returnValue;
	}
}
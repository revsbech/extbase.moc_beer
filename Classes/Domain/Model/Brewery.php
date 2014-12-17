<?php
namespace MOC\Beer\Domain\Model;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014 Jan-Erik Revsbech <janerik@moc.net>, MOC A/S
 *           View beers
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
 * Brewery
 */
class Brewery extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * name
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $name = '';

	/**
	 * Beers in this
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\MOC\Beer\Domain\Model\Beer>
	 * @cascade remove
	 * @lazy
	 */
	protected $beers = NULL;

	/**
	 * __construct
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all ObjectStorage properties
	 * Do not modify this method!
	 * It will be rewritten on each save in the extension builder
	 * You may modify the constructor of this class instead
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		$this->beers = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Returns the name
	 *
	 * @return string $name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets the name
	 *
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Adds a Beer
	 *
	 * @param \MOC\Beer\Domain\Model\Beer $beer
	 * @return void
	 */
	public function addBeer(\MOC\Beer\Domain\Model\Beer $beer) {
		$this->beers->attach($beer);
	}

	/**
	 * Removes a Beer
	 *
	 * @param \MOC\Beer\Domain\Model\Beer $beerToRemove The Beer to be removed
	 * @return void
	 */
	public function removeBeer(\MOC\Beer\Domain\Model\Beer $beerToRemove) {
		$this->beers->detach($beerToRemove);
	}

	/**
	 * Returns the beers
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\MOC\Beer\Domain\Model\Beer> $beers
	 */
	public function getBeers() {
		return $this->beers;
	}

	/**
	 * Sets the beers
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\MOC\Beer\Domain\Model\Beer> $beers
	 * @return void
	 */
	public function setBeers(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $beers) {
		$this->beers = $beers;
	}

}
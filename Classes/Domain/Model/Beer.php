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
 * Beer
 */
class Beer extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * alcoholByVolume
	 *
	 * @var float
	 */
	protected $alcoholByVolume = 0.0;

	/**
	 * name
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $name = '';

	/**
	 * @var \MOC\Beer\Domain\Model\Brewery
	 * @lazy
	 */
	protected $brewery;

	/**
	 * Returns the alcoholByVolume
	 *
	 * @return float $alcoholByVolume
	 */
	public function getAlcoholByVolume() {
		return $this->alcoholByVolume;
	}

	/**
	 * Sets the alcoholByVolume
	 *
	 * @param float $alcoholByVolume
	 * @return void
	 */
	public function setAlcoholByVolume($alcoholByVolume) {
		$this->alcoholByVolume = $alcoholByVolume;
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
	 * @return Brewery
	 */
	public function getBrewery() {
		return $this->brewery;
	}

	/**
	 * @param Brewery $brewery
	 * @return void
	 */
	public function setBrewery($brewery) {
		$this->brewery = $brewery;
	}

}
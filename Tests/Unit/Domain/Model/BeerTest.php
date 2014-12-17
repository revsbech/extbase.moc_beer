<?php

namespace MOC\Beer\Tests\Unit\Domain\Model;

/***************************************************************
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
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class \MOC\Beer\Domain\Model\Beer.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Jan-Erik Revsbech <janerik@moc.net>
 * @author View beers 
 */
class BeerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \MOC\Beer\Domain\Model\Beer
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \MOC\Beer\Domain\Model\Beer();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getAlcoholByVolumeReturnsInitialValueForFloat() {
		$this->assertSame(
			0.0,
			$this->subject->getAlcoholByVolume()
		);
	}

	/**
	 * @test
	 */
	public function setAlcoholByVolumeForFloatSetsAlcoholByVolume() {
		$this->subject->setAlcoholByVolume(3.14159265);

		$this->assertAttributeEquals(
			3.14159265,
			'alcoholByVolume',
			$this->subject,
			'',
			0.000000001
		);
	}

	/**
	 * @test
	 */
	public function getNameReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getName()
		);
	}

	/**
	 * @test
	 */
	public function setNameForStringSetsName() {
		$this->subject->setName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'name',
			$this->subject
		);
	}
}

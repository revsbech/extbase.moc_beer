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
 * Test case for class \MOC\Beer\Domain\Model\Brewery.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Jan-Erik Revsbech <janerik@moc.net>
 * @author View beers 
 */
class BreweryTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \MOC\Beer\Domain\Model\Brewery
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \MOC\Beer\Domain\Model\Brewery();
	}

	protected function tearDown() {
		unset($this->subject);
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

	/**
	 * @test
	 */
	public function getBeersReturnsInitialValueForBeer() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getBeers()
		);
	}

	/**
	 * @test
	 */
	public function setBeersForObjectStorageContainingBeerSetsBeers() {
		$beer = new \MOC\Beer\Domain\Model\Beer();
		$objectStorageHoldingExactlyOneBeers = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneBeers->attach($beer);
		$this->subject->setBeers($objectStorageHoldingExactlyOneBeers);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneBeers,
			'beers',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addBeerToObjectStorageHoldingBeers() {
		$beer = new \MOC\Beer\Domain\Model\Beer();
		$beersObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$beersObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($beer));
		$this->inject($this->subject, 'beers', $beersObjectStorageMock);

		$this->subject->addBeer($beer);
	}

	/**
	 * @test
	 */
	public function removeBeerFromObjectStorageHoldingBeers() {
		$beer = new \MOC\Beer\Domain\Model\Beer();
		$beersObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$beersObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($beer));
		$this->inject($this->subject, 'beers', $beersObjectStorageMock);

		$this->subject->removeBeer($beer);

	}
}

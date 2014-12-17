<?php
namespace MOC\Beer\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Jan-Erik Revsbech <janerik@moc.net>, MOC A/S
 *  			View beers 
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
 * Test case for class MOC\Beer\Controller\BeerController.
 *
 * @author Jan-Erik Revsbech <janerik@moc.net>
 * @author View beers 
 */
class BeerControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \MOC\Beer\Controller\BeerController
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = $this->getMock('MOC\\Beer\\Controller\\BeerController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllBeersFromRepositoryAndAssignsThemToView() {

		$allBeers = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$beerRepository = $this->getMock('MOC\\Beer\\Domain\\Repository\\BeerRepository', array('findAll'), array(), '', FALSE);
		$beerRepository->expects($this->once())->method('findAll')->will($this->returnValue($allBeers));
		$this->inject($this->subject, 'beerRepository', $beerRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('beers', $allBeers);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenBeerToView() {
		$beer = new \MOC\Beer\Domain\Model\Beer();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('beer', $beer);

		$this->subject->showAction($beer);
	}
}

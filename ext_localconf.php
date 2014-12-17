<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'MOC.' . $_EXTKEY,
	'Beers',
	array(
		'Beer' => 'list, show',
		'Brewery' => 'list, show',
		
	),
	// non-cacheable actions
	array(
		'Beer' => '',
		'Brewery' => '',
		
	)
);

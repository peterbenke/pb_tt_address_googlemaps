<?php

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Address List with Google Maps (extends tt_address)',
	'description' => 'Extends the extension tt_address with frontend view in Google maps.',
	'version' => '1.2.0',
	'category' => 'plugin',
	'author' => 'Peter Benke',
	'author_email' => 'info@typomotor.de',
	'state' => 'stable',
	'internal' => '',
	'uploadfolder' => '0',
	'createDirs' => '',
	'clearCacheOnLoad' => 0,
	'constraints' => array(
		'depends' => array(
			'typo3' => '7.6.0-8.7.99',
			'tt_address' => '3.1.0-3.9.99',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
);

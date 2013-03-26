<?php

/**
 * news_categories extension for Contao Open Source CMS
 * 
 * Copyright (C) 2013 Codefog
 * 
 * @package news_categories
 * @link    http://codefog.pl
 * @author  Webcontext <http://webcontext.com>
 * @author  Kamil Kuzminski <kamil.kuzminski@codefog.pl>
 * @license LGPL
 */


/**
 * Add a palette to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['newscategories'] = '{title_legend},name,headline,type;{config_legend},news_archives,news_resetCategories;{redirect_legend:hide},jumpTo;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';


/**
 * Extend a tl_module palette
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['newslist'] = str_replace('news_archives,', 'news_archives,news_filterCategories,news_filterDefault,', $GLOBALS['TL_DCA']['tl_module']['palettes']['newslist']);


/**
 * Add a new field to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['news_filterCategories'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['news_filterCategories'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['news_filterDefault'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['news_filterDefault'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'foreignKey'              => 'tl_news_category.title',
	'eval'                    => array('multiple'=>true),
	'sql'                     => "blob NULL"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['news_resetCategories'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['news_resetCategories'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'sql'                     => "char(1) NOT NULL default ''"
);
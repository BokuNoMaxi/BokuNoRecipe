<?php
defined('TYPO3_MODE') || die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
   'bokunorecipe',
   'tx_bokunorecipe_domain_model_recipe'
);

$GLOBALS['TCA']['tx_bokunorecipe_domain_model_recipe']['columns']['slug']['config']=[
   'type' => 'slug',
   'generatorOptions' => [
       'fields' => ['title', 'nav_title'],
       'fieldSeparator' => '/',
       'prefixParentPageSlug' => true,
       'replacements' => [
           '/' => '',
       ],
   ],
   'fallbackCharacter' => '-',
   'eval' => 'uniqueInSite',
   'default' => ''
];
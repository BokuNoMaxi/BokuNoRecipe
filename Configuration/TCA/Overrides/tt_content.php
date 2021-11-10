<?php
defined('TYPO3_MODE') || die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Bokunorecipe',
    'Bokunorecipe',
    'bokunorecipe'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Bokunorecipe',
    'Bokunoingredients',
    'bokunoingredients'
);

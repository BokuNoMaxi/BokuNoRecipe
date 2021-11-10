<?php
defined('TYPO3_MODE') || die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
   'bokunorecipe',
   'tx_bokunorecipe_domain_model_ingredients'
);

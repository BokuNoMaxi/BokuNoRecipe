<?php
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') || die();

(static function() {
    ExtensionManagementUtility::addLLrefForTCAdescr('tx_bokunorecipe_domain_model_recipe', 'EXT:bokunorecipe/Resources/Private/Language/locallang_csh_tx_bokunorecipe_domain_model_recipe.xlf');
    ExtensionManagementUtility::allowTableOnStandardPages('tx_bokunorecipe_domain_model_recipe');

    ExtensionManagementUtility::addLLrefForTCAdescr('tx_bokunorecipe_domain_model_ingredients', 'EXT:bokunorecipe/Resources/Private/Language/locallang_csh_tx_bokunorecipe_domain_model_ingredients.xlf');
    ExtensionManagementUtility::allowTableOnStandardPages('tx_bokunorecipe_domain_model_ingredients');

    ExtensionManagementUtility::addLLrefForTCAdescr('tx_bokunorecipe_domain_model_ingredientstorecipe', 'EXT:bokunorecipe/Resources/Private/Language/locallang_csh_tx_bokunorecipe_domain_model_ingredientstorecipe.xlf');
    ExtensionManagementUtility::allowTableOnStandardPages('tx_bokunorecipe_domain_model_ingredientstorecipe');
})();
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder

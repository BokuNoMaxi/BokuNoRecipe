<?php
defined('TYPO3') || die();

call_user_func(static function() {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bokunorecipe_domain_model_recipe', 'EXT:bokunorecipe/Resources/Private/Language/locallang_csh_tx_bokunorecipe_domain_model_recipe.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bokunorecipe_domain_model_recipe');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bokunorecipe_domain_model_ingredients', 'EXT:bokunorecipe/Resources/Private/Language/locallang_csh_tx_bokunorecipe_domain_model_ingredients.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bokunorecipe_domain_model_ingredients');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bokunorecipe_domain_model_ingredientstorecipe', 'EXT:bokunorecipe/Resources/Private/Language/locallang_csh_tx_bokunorecipe_domain_model_ingredientstorecipe.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bokunorecipe_domain_model_ingredientstorecipe');
});
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder
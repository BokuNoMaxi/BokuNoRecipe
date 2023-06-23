<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Bokunorecipe',
        'Bokunorecipe',
        [
            \BokuNo\Bokunorecipe\Controller\RecipeController::class => 'list, show, new, create, edit, update'
        ],
        // non-cacheable actions
        [
            \BokuNo\Bokunorecipe\Controller\RecipeController::class => 'create, update, delete, ',
            \BokuNo\Bokunorecipe\Controller\IngredientsController::class => 'create, update, delete'
        ]
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Bokunorecipe',
        'Bokunocookinghelper',
        [
            \BokuNo\Bokunorecipe\Controller\RecipeController::class => 'helper'
        ],
        // non-cacheable actions
        [
            \BokuNo\Bokunorecipe\Controller\RecipeController::class => 'helper'
        ]
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    bokunorecipe {
                        iconIdentifier = bokunorecipe-plugin-bokunorecipe
                        title = LLL:EXT:bokunorecipe/Resources/Private/Language/locallang_db.xlf:tx_bokunorecipe_bokunorecipe.name
                        description = LLL:EXT:bokunorecipe/Resources/Private/Language/locallang_db.xlf:tx_bokunorecipe_bokunorecipe.description
                        tt_content_defValues {
                            CType = list
                            list_type = bokunorecipe_bokunorecipe
                        }
                    }
                    bokunocookinghelper {
                        iconIdentifier = bokunorecipe-plugin-bokunocookinghelper
                        title = LLL:EXT:bokunorecipe/Resources/Private/Language/locallang_db.xlf:tx_bokunorecipe_bokunocookinghelper.name
                        description = LLL:EXT:bokunorecipe/Resources/Private/Language/locallang_db.xlf:tx_bokunorecipe_bokunocookinghelper.description
                        tt_content_defValues {
                            CType = list
                            list_type = bokunorecipe_bokunocookinghelper
                        }
                    }
                }
                show = *
            }
       }'
    );
})();
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder
use BokuNo\Bokunorecipe\Indexer\RecipeIndexer;

$GLOBALS["TYPO3_CONF_VARS"]["EXTCONF"]["ke_search"][
    "registerIndexerConfiguration"
][] = RecipeIndexer::class;
$GLOBALS["TYPO3_CONF_VARS"]["EXTCONF"]["ke_search"]["customIndexer"][] =
    RecipeIndexer::class;

$GLOBALS["TYPO3_CONF_VARS"]["EXTCONF"]["ke_search"]["fileReferenceTypes"][
    "tx_bokunorecipe_domain_model_recipe"
]["table"] = "tx_bokunorecipe_domain_model_recipe";
$GLOBALS["TYPO3_CONF_VARS"]["EXTCONF"]["ke_search"]["fileReferenceTypes"][
    "tx_bokunorecipe_domain_model_recipe"
]["field"] = "images";
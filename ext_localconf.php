<?php
defined('TYPO3_MODE') || die();

call_user_func(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Bokunorecipe',
        'Bokunorecipe',
        [
            \BokuNoRecipe\Bokunorecipe\Controller\RecipeController::class => 'list, show, new, create, edit, update'
        ],
        // non-cacheable actions
        [
            \BokuNoRecipe\Bokunorecipe\Controller\RecipeController::class => 'create, update, delete',
            \BokuNoRecipe\Bokunorecipe\Controller\IngredientsController::class => 'create, update, delete'
        ]
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Bokunorecipe',
        'Bokunoingredients',
        [
            \BokuNoRecipe\Bokunorecipe\Controller\IngredientsController::class => 'list, show, new, create, edit, update'
        ],
        // non-cacheable actions
        [
            \BokuNoRecipe\Bokunorecipe\Controller\RecipeController::class => 'create, update, delete',
            \BokuNoRecipe\Bokunorecipe\Controller\IngredientsController::class => 'create, update, delete'
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
                    bokunoingredients {
                        iconIdentifier = bokunorecipe-plugin-bokunoingredients
                        title = LLL:EXT:bokunorecipe/Resources/Private/Language/locallang_db.xlf:tx_bokunorecipe_bokunoingredients.name
                        description = LLL:EXT:bokunorecipe/Resources/Private/Language/locallang_db.xlf:tx_bokunorecipe_bokunoingredients.description
                        tt_content_defValues {
                            CType = list
                            list_type = bokunorecipe_bokunoingredients
                        }
                    }
                }
                show = *
            }
       }'
    );

    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
    $iconRegistry->registerIcon(
        'bokunorecipe-plugin-bokunorecipe',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        ['source' => 'EXT:bokunorecipe/Resources/Public/Icons/user_plugin_bokunorecipe.svg']
    );
    $iconRegistry->registerIcon(
        'bokunorecipe-plugin-bokunoingredients',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        ['source' => 'EXT:bokunorecipe/Resources/Public/Icons/user_plugin_bokunoingredients.svg']
    );
});

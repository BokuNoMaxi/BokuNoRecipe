<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:bokunorecipe/Resources/Private/Language/locallang_db.xlf:tx_bokunorecipe_domain_model_recipe',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'sortby' => 'sorting',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'title,portions,max_time,prep_time,teaser,preparation,slug',
        'iconfile' => 'EXT:bokunorecipe/Resources/Public/Icons/tx_bokunorecipe_domain_model_recipe.gif'
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid,l10n_parent,l10n_diffsource,hidden,title,portions,max_time,prep_time,teaser,preparation,publish_date,images,slug,ingredients,--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,starttime,endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ]
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_bokunorecipe_domain_model_recipe',
                'foreign_table_where' => 'AND {#tx_bokunorecipe_domain_model_recipe}.{#pid}=###CURRENT_PID### AND {#tx_bokunorecipe_domain_model_recipe}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],

        'title' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bokunorecipe/Resources/Private/Language/locallang_db.xlf:tx_bokunorecipe_domain_model_recipe.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required',
                'default' => ''
            ],
        ],
        'portions' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bokunorecipe/Resources/Private/Language/locallang_db.xlf:tx_bokunorecipe_domain_model_recipe.portions',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'max_time' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bokunorecipe/Resources/Private/Language/locallang_db.xlf:tx_bokunorecipe_domain_model_recipe.max_time',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'prep_time' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bokunorecipe/Resources/Private/Language/locallang_db.xlf:tx_bokunorecipe_domain_model_recipe.prep_time',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'teaser' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bokunorecipe/Resources/Private/Language/locallang_db.xlf:tx_bokunorecipe_domain_model_recipe.teaser',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'richtextConfiguration' => 'default',
                'fieldControl' => [
                    'fullScreenRichtext' => [
                        'disabled' => false,
                    ],
                ],
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],
            
        ],
        'preparation' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bokunorecipe/Resources/Private/Language/locallang_db.xlf:tx_bokunorecipe_domain_model_recipe.preparation',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'richtextConfiguration' => 'default',
                'fieldControl' => [
                    'fullScreenRichtext' => [
                        'disabled' => false,
                    ],
                ],
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],
            
        ],
        'publish_date' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bokunorecipe/Resources/Private/Language/locallang_db.xlf:tx_bokunorecipe_domain_model_recipe.publish_date',
            'config' => [
                'dbType' => 'date',
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 7,
                'eval' => 'date',
                'default' => null,
            ],
        ],
        'images' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bokunorecipe/Resources/Private/Language/locallang_db.xlf:tx_bokunorecipe_domain_model_recipe.images',
            'config' => 
            \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'images',
                [
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
                    ],
                    'foreign_match_fields' => [
                        'fieldname' => 'images',
                        'tablenames' => 'tx_bokunorecipe_domain_model_recipe',
                        'table_local' => 'sys_file',
                    ],
                    'maxitems' => 5,
                    'overrideChildTca' => ['types' => [
                        '0' => [
                            'showitem' => '
                            --palette--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                            'showitem' => '
                            --palette--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                            'showitem' => '
                            --palette--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
                            'showitem' => '
                            --palette--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
                            'showitem' => '
                            --palette--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
                            'showitem' => '
                            --palette--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ]
                    ]]
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),

        ],
        'slug' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bokunorecipe/Resources/Private/Language/locallang_db.xlf:tx_bokunorecipe_domain_model_recipe.slug',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'ingredients' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bokunorecipe/Resources/Private/Language/locallang_db.xlf:tx_bokunorecipe_domain_model_recipe.ingredients',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_bokunorecipe_domain_model_ingredientstorecipe',
                'foreign_field' => 'recipe',
                'foreign_sortby' => 'sorting',
                'maxitems' => 9999,
                'appearance' => [
                    'collapseAll' => 0,
                    'levelLinksPosition' => 'top',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'useSortable' => 1,
                    'showAllLocalizationLink' => 1
                ],
            ],

        ],
    
    ],
];

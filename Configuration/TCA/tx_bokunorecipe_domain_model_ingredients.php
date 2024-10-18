<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:bokunorecipe/Resources/Private/Language/locallang_db.xlf:tx_bokunorecipe_domain_model_ingredients',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
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
        'searchFields' => 'title,unit',
        'iconfile' => 'EXT:bokunorecipe/Resources/Public/Icons/tx_bokunorecipe_domain_model_ingredients.gif'
    ],
    'types' => [
        '1' => ['showitem' => 'title, unit, gluten, lactose, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, sys_language_uid, l10n_parent, l10n_diffsource, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',
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
                    ['label' => '', 'value' => 0],
                ],
                'foreign_table' => 'tx_bokunorecipe_domain_model_ingredients',
                'foreign_table_where' => 'AND {#tx_bokunorecipe_domain_model_ingredients}.{#pid}=###CURRENT_PID### AND {#tx_bokunorecipe_domain_model_ingredients}.{#sys_language_uid} IN (-1,0)',
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
                        'label' => '',
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
                'type' => 'datetime',
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
                'type' => 'datetime',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'categories' => [
            'config'=> [
                'type' => 'category',
            ],
        ],

        'title' => [
            'exclude' => false,
            'label' => 'LLL:EXT:bokunorecipe/Resources/Private/Language/locallang_db.xlf:tx_bokunorecipe_domain_model_ingredients.title',
            'description' => 'LLL:EXT:bokunorecipe/Resources/Private/Language/locallang_db.xlf:tx_bokunorecipe_domain_model_ingredients.title.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => '',
                'required' => true
            ],
        ],
        'unit' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bokunorecipe/Resources/Private/Language/locallang_db.xlf:tx_bokunorecipe_domain_model_ingredients.unit',
            'description' => 'LLL:EXT:bokunorecipe/Resources/Private/Language/locallang_db.xlf:tx_bokunorecipe_domain_model_ingredients.unit.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'gluten' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bokunorecipe/Resources/Private/Language/locallang_db.xlf:tx_bokunorecipe_domain_model_ingredients.gluten',
            'description' => 'LLL:EXT:bokunorecipe/Resources/Private/Language/locallang_db.xlf:tx_bokunorecipe_domain_model_ingredients.gluten.description',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        'label' => '',
                        1 => '',
                    ]
                ],
                'default' => 0,
            ]
        ],
        'lactose' => [
            'exclude' => true,
            'label' => 'LLL:EXT:bokunorecipe/Resources/Private/Language/locallang_db.xlf:tx_bokunorecipe_domain_model_ingredients.lactose',
            'description' => 'LLL:EXT:bokunorecipe/Resources/Private/Language/locallang_db.xlf:tx_bokunorecipe_domain_model_ingredients.lactose.description',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        'label' => '',
                        1 => '',
                    ]
                ],
                'default' => 0,
            ]
        ],
    
    ],
];

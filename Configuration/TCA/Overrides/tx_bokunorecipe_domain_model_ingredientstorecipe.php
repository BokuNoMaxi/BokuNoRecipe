<?php
defined("TYPO3") || die();

$GLOBALS["TCA"]["tx_bokunorecipe_domain_model_ingredientstorecipe"]["columns"][
    "alternative_measurement"
]["config"]["items"] = [
    ["---", 0],
    [
        "LLL:EXT:bokunorecipe/Resources/Private/Language/locallang_db.xlf:tx_bokunorecipe_bokunoingredients.alternativemessurement.teaspoon",
        1,
    ],
    [
        "LLL:EXT:bokunorecipe/Resources/Private/Language/locallang_db.xlf:tx_bokunorecipe_bokunoingredients.alternativemessurement.tablespoon",
        2,
    ],
    [
        "LLL:EXT:bokunorecipe/Resources/Private/Language/locallang_db.xlf:tx_bokunorecipe_bokunoingredients.alternativemessurement.knifepoint",
        3,
    ],
    [
        "LLL:EXT:bokunorecipe/Resources/Private/Language/locallang_db.xlf:tx_bokunorecipe_bokunoingredients.alternativemessurement.bunch",
        4,
    ],
    [
        "LLL:EXT:bokunorecipe/Resources/Private/Language/locallang_db.xlf:tx_bokunorecipe_bokunoingredients.alternativemessurement.need",
        5,
    ],
    [
        "LLL:EXT:bokunorecipe/Resources/Private/Language/locallang_db.xlf:tx_bokunorecipe_bokunoingredients.alternativemessurement.pinch",
        6,
    ],
    [
        "LLL:EXT:bokunorecipe/Resources/Private/Language/locallang_db.xlf:tx_bokunorecipe_bokunoingredients.alternativemessurement.handful",
        7,
    ],
    [
        "LLL:EXT:bokunorecipe/Resources/Private/Language/locallang_db.xlf:tx_bokunorecipe_bokunoingredients.alternativemessurement.optional",
        8,
    ],
    [
        "LLL:EXT:bokunorecipe/Resources/Private/Language/locallang_db.xlf:tx_bokunorecipe_bokunoingredients.alternativemessurement.pack",
        9,
    ],
];

$GLOBALS["TCA"]["tx_bokunorecipe_domain_model_ingredientstorecipe"]["columns"][
    "ingredient"
]["config"]["foreign_table_where"] = "order by title asc";

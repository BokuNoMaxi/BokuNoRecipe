<?php
defined("TYPO3") || die();

$ll = "LLL:EXT:bokunorecipe/Resources/Private/Language/locallang_db.xlf:";
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    "bokunorecipe",
    "tx_bokunorecipe_domain_model_recipe"
);

$GLOBALS["TCA"]["tx_bokunorecipe_domain_model_recipe"]["columns"]["slug"][
    "config"
] = [
    "type" => "slug",
    "generatorOptions" => [
        "fields" => ["title", "nav_title"],
        "fieldSeparator" => "/",
        "prefixParentPageSlug" => true,
        "replacements" => [
            "/" => "",
        ],
    ],
    "fallbackCharacter" => "-",
    "eval" => "uniqueInSite",
    "default" => "",
];

$GLOBALS["TCA"]["tx_bokunorecipe_domain_model_recipe"]["columns"]["related"][
    "config"
]["foreign_table_where"] = "order by title asc";

$GLOBALS["TCA"]["tx_bokunorecipe_domain_model_recipe"]["palettes"] = [
    "pTitle" => [
        "label" => "",
        "showitem" => "title, publish_date, slug",
    ],
    "pTags" => [
        "label" => "",
        "showitem" => "portions, prep_time, max_time, ",
    ],
];

$GLOBALS["TCA"]["tx_bokunorecipe_domain_model_recipe"]["types"]["1"] = [
    "showitem" =>
        "--palette--;;pTitle,--palette--;;pTags, teaser, preparation, --div--;" .
        $ll .
        "tx_bokunorecipe_domain_model_recipe.images, images, --div--;" .
        $ll .
        "tx_bokunorecipe_domain_model_recipe.ingredients, ingredients,--div--;" .
        $ll .
        "tx_bokunorecipe_domain_model_recipe.related, related, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, sys_language_uid, l10n_parent, l10n_diffsource, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden, starttime, endtime",
];

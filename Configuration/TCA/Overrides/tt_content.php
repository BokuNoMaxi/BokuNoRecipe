<?php
defined('TYPO3') || die();

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

$pluginSignature = ExtensionUtility::registerPlugin(
    'Bokunorecipe',
    'Bokunorecipe',
    'bokunorecipe'
);

$GLOBALS["TCA"]["tt_content"]["types"]["list"]["subtypes_addlist"][$pluginSignature] = "pi_flexform";
ExtensionManagementUtility::addPiFlexFormValue(
    $pluginSignature,
    "FILE:EXT:bokunorecipe/Configuration/FlexForms/Default.xml"
);

ExtensionUtility::registerPlugin(
    'Bokunorecipe',
    'Bokunocookinghelper',
    'bokunocookinghelper'
);

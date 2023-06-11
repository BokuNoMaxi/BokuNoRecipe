<?php

$EM_CONF[$_EXTKEY] = [
    "title" => "BokuNoRecipe",
    "description" => "This extension is for storing recipes in Typo3",
    "category" => "plugin",
    "author" => "Markus Ketterer",
    "author_email" => "ketterer.markus@gmx.at",
    "state" => "alpha",
    "clearCacheOnLoad" => 0,
    "version" => "1.0.0",
    "constraints" => [
        "depends" => [
            "typo3" => "10.4.0-10.4.99",
        ],
        "conflicts" => [],
        "suggests" => [],
    ],
];

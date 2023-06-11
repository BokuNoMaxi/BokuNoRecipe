<?php

declare(strict_types=1);

namespace BokuNo\Bokunorecipe\Domain\Repository;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Database\ConnectionPool;
use BokuNo\Bokunorecipe\Domain\Model\Recipe;
use TYPO3\CMS\Extbase\Persistence\Repository;
use BokuNo\Bokunorecipe\Domain\Model\Category;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Generic\Mapper\DataMapper;
use TYPO3\CMS\Extbase\Object\ObjectManagerInterface;

/**
 * This file is part of the "BokuNoRecipe" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2021 Markus Ketterer <ketterer.markus@gmx.at>
 */
/**
 * The repository for Recipes
 */
class RecipeRepository extends Repository
{
    const TABLE = "tx_bokunorecipe_domain_model_recipe";
    const TABLE_CATEGORY = "sys_category";
    const TABLE_CATEGORY_MAP = "sys_category_record_mm";
    /**
     * @var array
     */
    protected $defaultOrderings = [
        "sorting" => QueryInterface::ORDER_ASCENDING,
    ];

    private $dataMapper = null;

    /**
     * Constructs a new Repository
     *
     * @param \TYPO3\CMS\Extbase\Object\ObjectManagerInterface $objectManager
     */
    public function __construct(ObjectManagerInterface $objectManager)
    {
        parent::__construct($objectManager);
        $this->dataMapper = GeneralUtility::makeInstance(DataMapper::class);
    }

    public function findRecipe($sw = "", $categories = [])
    {
        $dm = GeneralUtility::makeInstance(DataMapper::class);
        // Get database connection
        $connection = GeneralUtility::makeInstance(
            ConnectionPool::class
        )->getConnectionForTable($this::TABLE);
        $queryBuilder = $connection->createQueryBuilder();
        $queryBuilder
            ->select("recipe.*")
            ->distinct()
            ->from($this::TABLE, "recipe")
            ->where(
                $queryBuilder
                    ->expr()
                    ->like(
                        "recipe.title",
                        $queryBuilder->createNamedParameter("%{$sw}%")
                    )
            );

        if (count($categories)) {
            $queryBuilder
                ->join(
                    "recipe",
                    RecipeRepository::TABLE_CATEGORY_MAP,
                    "category",
                    $queryBuilder
                        ->expr()
                        ->eq(
                            "category.uid_foreign",
                            $queryBuilder->quoteIdentifier("recipe.uid")
                        )
                )
                ->andWhere(
                    $queryBuilder->expr()->in("category.uid_local", $categories)
                );
        }

        $result = $queryBuilder->executeQuery()->fetchAllAssociative();
        $recipes = $this->dataMapper->map(Recipe::class, $result);
        return $recipes;
    }

    public function getAllCategoriesFromPid($pid)
    {
        $dm = GeneralUtility::makeInstance(DataMapper::class);
        $connection = GeneralUtility::makeInstance(
            ConnectionPool::class
        )->getConnectionForTable($this::TABLE_CATEGORY);

        $queryBuilder = $connection->createQueryBuilder();
        $queryBuilder
            ->select("*")
            ->from($this::TABLE_CATEGORY)
            ->where(
                $queryBuilder
                    ->expr()
                    ->eq("pid", $queryBuilder->createNamedParameter($pid))
            )
            ->andWhere($queryBuilder->expr()->gt("parent", 0));

        $categories = $this->dataMapper->map(
            Category::class,
            $queryBuilder->execute()->fetchAllAssociative()
        );

        return $categories;
    }
}

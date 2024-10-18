<?php

declare(strict_types=1);

namespace BokuNo\Bokunorecipe\Controller;

use TYPO3\CMS\Extbase\Annotation\IgnoreValidation;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use BokuNo\Bokunorecipe\Domain\Repository\RecipeRepository;
use BokuNo\Bokunorecipe\Domain\Repository\CategoryRepository;
use Psr\Http\Message\ResponseInterface;
use BokuNo\Bokunorecipe\Domain\Model\Recipe;
use TYPO3\CMS\Core\Pagination\ArrayPaginator;
use TYPO3\CMS\Core\Pagination\SimplePagination;

/**
 * This file is part of the "BokuNoRecipe" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2021 Markus Ketterer <ketterer.markus@gmx.at>
 */

/**
 * RecipeController
 */
class RecipeController extends ActionController
{
    public function __construct(
      private readonly RecipeRepository $recipeRepository,
      private readonly CategoryRepository $categoryRepository
    ) {

    }

    /**
     * action list
     */
    public function listAction(int $currentPage = 1): ResponseInterface
    {
        $sw =
            $this->request->hasArgument("sw") &&
            $this->request->getArgument("sw")
                ? $this->request->getArgument("sw")
                : false;
        $selCategories =
            $this->request->hasArgument("category") &&
            $this->request->getArgument("category")
                ? $this->request->getArgument("category")
                : [];
        if ($sw || $selCategories) {
            $recipes = $this->recipeRepository->findRecipe($sw, $selCategories);
        } else {
            $recipes = $this->recipeRepository->findAll()->toArray();
        }

        $arrayPaginator = new ArrayPaginator($recipes, $currentPage, 9);
        $paging = new SimplePagination($arrayPaginator);
        $this->view->assignMultiple([
            "recipes" => $recipes,
            "paginator" => $arrayPaginator,
            "paging" => $paging,
            "pages" => range(1, $paging->getLastPageNumber()),
            "categories" => $this->getCategories(),
            "selCategories" => $selCategories,
        ]);
        return $this->htmlResponse();
    }

    /**
     * action show
     */
    public function showAction(Recipe $recipe): ResponseInterface
    {
        $this->view->assign("recipe", $recipe);
        return $this->htmlResponse();
    }

    /**
     * action new
     *
     * @return string|object|null|void
     */
    public function newAction(): ResponseInterface
    {
        return $this->htmlResponse();
    }

    /**
     * action create
     *
     * @return ResponseInterface
     */
    public function createAction(Recipe $newRecipe)
    {
        $this->recipeRepository->add($newRecipe);
        $this->redirect("list");
    }

    /**
     * action edit
     */
    #[IgnoreValidation(['value' => 'recipe'])]
    public function editAction(Recipe $recipe): ResponseInterface
    {
        $this->view->assign("recipe", $recipe);
        return $this->htmlResponse();
    }

    /**
     * action update
     *
     * @return string|object|null|void
     */
    public function updateAction(Recipe $recipe)
    {
        $this->recipeRepository->update($recipe);
        $this->redirect("list");
    }

    /**
     * action delete
     *
     * @return string|object|null|void
     */
    public function deleteAction(Recipe $recipe)
    {
        $this->recipeRepository->remove($recipe);
        $this->redirect("list");
    }

    /**
     * action helper
     */
    public function helperAction(int $currentPage = 1): ResponseInterface
    {
        $withCategories =
            $this->request->hasArgument("category") &&
            $this->request->getArgument("category")
                ? $this->request->getArgument("category")
                : [];
        $recipes = [];
        if ($withCategories) {
            $recipes = $this->recipeRepository->findRecipe("", $withCategories);
            shuffle($recipes);
            $recipes = array_slice($recipes, 0, 3);
        }

        $arrayPaginator = new ArrayPaginator($recipes, $currentPage, 9);
        $paging = new SimplePagination($arrayPaginator);
        $this->view->assignMultiple([
            "recipes" => $recipes,
            "categories" => $this->getCategories(),
            "paginator" => $arrayPaginator,
            "paging" => $paging,
            "pages" => range(1, $paging->getLastPageNumber()),
            "withCategories" => $withCategories,
        ]);
        return $this->htmlResponse();
    }

    private function getCategories()
    {
        $recipeCategoryUid = $this->settings["recipeCategoryUid"];
        return $this->recipeRepository->getAllCategoriesFromPid(
            $recipeCategoryUid
        );
    }
}

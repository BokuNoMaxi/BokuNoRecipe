<?php

declare(strict_types=1);

namespace BokuNo\Bokunorecipe\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use BokuNo\Bokunorecipe\Domain\Repository\RecipeRepository;
use BokuNo\Bokunorecipe\Domain\Repository\CategoryRepository;
use Psr\Http\Message\ResponseInterface;
use BokuNo\Bokunorecipe\Domain\Model\Recipe;
use TYPO3\CMS\Core\Messaging\AbstractMessage;
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

    /**
     * recipeRepository
     *
     * @var \BokuNo\Bokunorecipe\Domain\Repository\RecipeRepository
     */
    protected $recipeRepository = null;

    /**
     * @var \BokuNo\Bokunorecipe\Domain\Repository\CategoryRepository
     */
    protected $categoryRepository = null;

    /**
     * @param \BokuNo\Bokunorecipe\Domain\Repository\RecipeRepository $recipeRepository
     */
    public function injectRecipeRepository(RecipeRepository $recipeRepository)
    {
        $this->recipeRepository = $recipeRepository;
    }

    /**
     * Inject a category repository to enable DI
     *
     * @param \BokuNo\Bokunorecipe\Domain\Repository\CategoryRepository $categoryRepository
     */
    public function injectCategoryRepository(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * action list
     *
     * @return string|object|null|void
     */
    public function listAction(): ResponseInterface
    {
        $recipes = $this->recipeRepository->findAll();
        $this->view->assign('recipes', $recipes);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \BokuNo\Bokunorecipe\Domain\Model\Recipe $recipe
     * @return string|object|null|void
     */
    public function showAction(Recipe $recipe): ResponseInterface
    {
        $this->view->assign('recipe', $recipe);
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
     * @param \BokuNo\Bokunorecipe\Domain\Model\Recipe $newRecipe
     * @return string|object|null|void
     */
    public function createAction(Recipe $newRecipe)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', AbstractMessage::WARNING);
        $this->recipeRepository->add($newRecipe);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \BokuNo\Bokunorecipe\Domain\Model\Recipe $recipe
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("recipe")
     * @return string|object|null|void
     */
    public function editAction(Recipe $recipe): ResponseInterface
    {
        $this->view->assign('recipe', $recipe);
        return $this->htmlResponse();
    }

    /**
     * action update
     *
     * @param \BokuNo\Bokunorecipe\Domain\Model\Recipe $recipe
     * @return string|object|null|void
     */
    public function updateAction(Recipe $recipe)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', AbstractMessage::WARNING);
        $this->recipeRepository->update($recipe);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \BokuNo\Bokunorecipe\Domain\Model\Recipe $recipe
     * @return string|object|null|void
     */
    public function deleteAction(Recipe $recipe)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', AbstractMessage::WARNING);
        $this->recipeRepository->remove($recipe);
        $this->redirect('list');
    }
}

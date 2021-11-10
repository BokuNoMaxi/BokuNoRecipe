<?php

declare(strict_types=1);

namespace BokuNo\Bokunorecipe\Controller;


/**
 * This file is part of the "BokuNoRecipe" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2021 Markus Ketterer <ketterer.markus@gmx.at>
 */

/**
 * IngredientsController
 */
class IngredientsController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * ingredientsRepository
     *
     * @var \BokuNo\Bokunorecipe\Domain\Repository\IngredientsRepository
     */
    protected $ingredientsRepository = null;

    /**
     * @param \BokuNo\Bokunorecipe\Domain\Repository\IngredientsRepository $ingredientsRepository
     */
    public function injectIngredientsRepository(\BokuNo\Bokunorecipe\Domain\Repository\IngredientsRepository $ingredientsRepository)
    {
        $this->ingredientsRepository = $ingredientsRepository;
    }

    /**
     * action list
     *
     * @return string|object|null|void
     */
    public function listAction()
    {
        $ingredients = $this->ingredientsRepository->findAll();
        $this->view->assign('ingredients', $ingredients);
    }

    /**
     * action show
     *
     * @param \BokuNo\Bokunorecipe\Domain\Model\Ingredients $ingredients
     * @return string|object|null|void
     */
    public function showAction(\BokuNo\Bokunorecipe\Domain\Model\Ingredients $ingredients)
    {
        $this->view->assign('ingredients', $ingredients);
    }

    /**
     * action new
     *
     * @return string|object|null|void
     */
    public function newAction()
    {
    }

    /**
     * action create
     *
     * @param \BokuNo\Bokunorecipe\Domain\Model\Ingredients $newIngredients
     * @return string|object|null|void
     */
    public function createAction(\BokuNo\Bokunorecipe\Domain\Model\Ingredients $newIngredients)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->ingredientsRepository->add($newIngredients);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \BokuNo\Bokunorecipe\Domain\Model\Ingredients $ingredients
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("ingredients")
     * @return string|object|null|void
     */
    public function editAction(\BokuNo\Bokunorecipe\Domain\Model\Ingredients $ingredients)
    {
        $this->view->assign('ingredients', $ingredients);
    }

    /**
     * action update
     *
     * @param \BokuNo\Bokunorecipe\Domain\Model\Ingredients $ingredients
     * @return string|object|null|void
     */
    public function updateAction(\BokuNo\Bokunorecipe\Domain\Model\Ingredients $ingredients)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->ingredientsRepository->update($ingredients);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \BokuNo\Bokunorecipe\Domain\Model\Ingredients $ingredients
     * @return string|object|null|void
     */
    public function deleteAction(\BokuNo\Bokunorecipe\Domain\Model\Ingredients $ingredients)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->ingredientsRepository->remove($ingredients);
        $this->redirect('list');
    }
}

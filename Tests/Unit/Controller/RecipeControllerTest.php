<?php

declare(strict_types=1);

namespace BokuNo\Bokunorecipe\Tests\Unit\Controller;

use BokuNo\Bokunorecipe\Controller\RecipeController;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use BokuNo\Bokunorecipe\Domain\Repository\RecipeRepository;
use BokuNo\Bokunorecipe\Domain\Model\Recipe;
use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use TYPO3Fluid\Fluid\View\ViewInterface;

/**
 * Test case
 *
 * @author Markus Ketterer <ketterer.markus@gmx.at>
 */
class RecipeControllerTest extends UnitTestCase
{
    /**
     * @var RecipeController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(RecipeController::class))
            ->onlyMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllRecipesFromRepositoryAndAssignsThemToView(): void
    {
        $allRecipes = $this->getMockBuilder(ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $recipeRepository = $this->getMockBuilder(RecipeRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $recipeRepository->expects(self::once())->method('findAll')->will(self::returnValue($allRecipes));
        $this->subject->_set('recipeRepository', $recipeRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('recipes', $allRecipes);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenRecipeToView(): void
    {
        $recipe = new Recipe();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('recipe', $recipe);

        $this->subject->showAction($recipe);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenRecipeToRecipeRepository(): void
    {
        $recipe = new Recipe();

        $recipeRepository = $this->getMockBuilder(RecipeRepository::class)
            ->onlyMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $recipeRepository->expects(self::once())->method('add')->with($recipe);
        $this->subject->_set('recipeRepository', $recipeRepository);

        $this->subject->createAction($recipe);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenRecipeToView(): void
    {
        $recipe = new Recipe();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('recipe', $recipe);

        $this->subject->editAction($recipe);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenRecipeInRecipeRepository(): void
    {
        $recipe = new Recipe();

        $recipeRepository = $this->getMockBuilder(RecipeRepository::class)
            ->onlyMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $recipeRepository->expects(self::once())->method('update')->with($recipe);
        $this->subject->_set('recipeRepository', $recipeRepository);

        $this->subject->updateAction($recipe);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenRecipeFromRecipeRepository(): void
    {
        $recipe = new Recipe();

        $recipeRepository = $this->getMockBuilder(RecipeRepository::class)
            ->onlyMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $recipeRepository->expects(self::once())->method('remove')->with($recipe);
        $this->subject->_set('recipeRepository', $recipeRepository);

        $this->subject->deleteAction($recipe);
    }
}

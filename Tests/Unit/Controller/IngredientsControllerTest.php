<?php

declare(strict_types=1);

namespace BokuNo\Bokunorecipe\Tests\Unit\Controller;

use BokuNo\Bokunorecipe\Controller\IngredientsController;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use BokuNo\Bokunorecipe\Domain\Repository\IngredientsRepository;
use BokuNo\Bokunorecipe\Domain\Model\Ingredients;
use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use TYPO3Fluid\Fluid\View\ViewInterface;

/**
 * Test case
 *
 * @author Markus Ketterer <ketterer.markus@gmx.at>
 */
class IngredientsControllerTest extends UnitTestCase
{
    /**
     * @var IngredientsController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(IngredientsController::class))
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
    public function listActionFetchesAllIngredientsFromRepositoryAndAssignsThemToView(): void
    {
        $allIngredients = $this->getMockBuilder(ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $ingredientsRepository = $this->getMockBuilder(IngredientsRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $ingredientsRepository->expects(self::once())->method('findAll')->will(self::returnValue($allIngredients));
        $this->subject->_set('ingredientsRepository', $ingredientsRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('ingredients', $allIngredients);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenIngredientsToView(): void
    {
        $ingredients = new Ingredients();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('ingredients', $ingredients);

        $this->subject->showAction($ingredients);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenIngredientsToIngredientsRepository(): void
    {
        $ingredients = new Ingredients();

        $ingredientsRepository = $this->getMockBuilder(IngredientsRepository::class)
            ->onlyMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $ingredientsRepository->expects(self::once())->method('add')->with($ingredients);
        $this->subject->_set('ingredientsRepository', $ingredientsRepository);

        $this->subject->createAction($ingredients);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenIngredientsToView(): void
    {
        $ingredients = new Ingredients();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('ingredients', $ingredients);

        $this->subject->editAction($ingredients);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenIngredientsInIngredientsRepository(): void
    {
        $ingredients = new Ingredients();

        $ingredientsRepository = $this->getMockBuilder(IngredientsRepository::class)
            ->onlyMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $ingredientsRepository->expects(self::once())->method('update')->with($ingredients);
        $this->subject->_set('ingredientsRepository', $ingredientsRepository);

        $this->subject->updateAction($ingredients);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenIngredientsFromIngredientsRepository(): void
    {
        $ingredients = new Ingredients();

        $ingredientsRepository = $this->getMockBuilder(IngredientsRepository::class)
            ->onlyMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $ingredientsRepository->expects(self::once())->method('remove')->with($ingredients);
        $this->subject->_set('ingredientsRepository', $ingredientsRepository);

        $this->subject->deleteAction($ingredients);
    }
}

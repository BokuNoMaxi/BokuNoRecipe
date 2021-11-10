<?php
declare(strict_types=1);

namespace BokuNo\Bokunorecipe\Tests\Unit\Controller;

use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 *
 * @author Markus Ketterer <ketterer.markus@gmx.at>
 */
class IngredientsControllerTest extends UnitTestCase
{
    /**
     * @var \BokuNo\Bokunorecipe\Controller\IngredientsController
     */
    protected $subject;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\BokuNo\Bokunorecipe\Controller\IngredientsController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllIngredientssFromRepositoryAndAssignsThemToView()
    {
        $allIngredientss = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $ingredientsRepository = $this->getMockBuilder(\BokuNo\Bokunorecipe\Domain\Repository\IngredientsRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $ingredientsRepository->expects(self::once())->method('findAll')->will(self::returnValue($allIngredientss));
        $this->inject($this->subject, 'ingredientsRepository', $ingredientsRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('ingredientss', $allIngredientss);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenIngredientsToView()
    {
        $ingredients = new \BokuNo\Bokunorecipe\Domain\Model\Ingredients();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('ingredients', $ingredients);

        $this->subject->showAction($ingredients);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenIngredientsToIngredientsRepository()
    {
        $ingredients = new \BokuNo\Bokunorecipe\Domain\Model\Ingredients();

        $ingredientsRepository = $this->getMockBuilder(\BokuNo\Bokunorecipe\Domain\Repository\IngredientsRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $ingredientsRepository->expects(self::once())->method('add')->with($ingredients);
        $this->inject($this->subject, 'ingredientsRepository', $ingredientsRepository);

        $this->subject->createAction($ingredients);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenIngredientsToView()
    {
        $ingredients = new \BokuNo\Bokunorecipe\Domain\Model\Ingredients();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('ingredients', $ingredients);

        $this->subject->editAction($ingredients);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenIngredientsInIngredientsRepository()
    {
        $ingredients = new \BokuNo\Bokunorecipe\Domain\Model\Ingredients();

        $ingredientsRepository = $this->getMockBuilder(\BokuNo\Bokunorecipe\Domain\Repository\IngredientsRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $ingredientsRepository->expects(self::once())->method('update')->with($ingredients);
        $this->inject($this->subject, 'ingredientsRepository', $ingredientsRepository);

        $this->subject->updateAction($ingredients);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenIngredientsFromIngredientsRepository()
    {
        $ingredients = new \BokuNo\Bokunorecipe\Domain\Model\Ingredients();

        $ingredientsRepository = $this->getMockBuilder(\BokuNo\Bokunorecipe\Domain\Repository\IngredientsRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $ingredientsRepository->expects(self::once())->method('remove')->with($ingredients);
        $this->inject($this->subject, 'ingredientsRepository', $ingredientsRepository);

        $this->subject->deleteAction($ingredients);
    }
}

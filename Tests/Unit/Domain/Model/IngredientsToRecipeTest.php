<?php
declare(strict_types=1);

namespace BokuNoRecipe\Bokunorecipe\Tests\Unit\Domain\Model;

use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 *
 * @author Markus Ketterer <ketterer.markus@gmx.at>
 */
class IngredientsToRecipeTest extends UnitTestCase
{
    /**
     * @var \BokuNoRecipe\Bokunorecipe\Domain\Model\IngredientsToRecipe
     */
    protected $subject;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \BokuNoRecipe\Bokunorecipe\Domain\Model\IngredientsToRecipe();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getQuantityReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getQuantity()
        );
    }

    /**
     * @test
     */
    public function setQuantityForStringSetsQuantity()
    {
        $this->subject->setQuantity('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'quantity',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAlternativeMeasurementReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getAlternativeMeasurement()
        );
    }

    /**
     * @test
     */
    public function setAlternativeMeasurementForIntSetsAlternativeMeasurement()
    {
        $this->subject->setAlternativeMeasurement(12);

        self::assertAttributeEquals(
            12,
            'alternativeMeasurement',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getIngredientReturnsInitialValueForIngredients()
    {
        self::assertEquals(
            null,
            $this->subject->getIngredient()
        );
    }

    /**
     * @test
     */
    public function setIngredientForIngredientsSetsIngredient()
    {
        $ingredientFixture = new \BokuNoRecipe\Bokunorecipe\Domain\Model\Ingredients();
        $this->subject->setIngredient($ingredientFixture);

        self::assertAttributeEquals(
            $ingredientFixture,
            'ingredient',
            $this->subject
        );
    }
}

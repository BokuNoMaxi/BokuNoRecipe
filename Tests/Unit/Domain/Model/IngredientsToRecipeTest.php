<?php

declare(strict_types=1);

namespace BokuNo\Bokunorecipe\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 *
 * @author Markus Ketterer <ketterer.markus@gmx.at>
 */
class IngredientsToRecipeTest extends UnitTestCase
{
    /**
     * @var \BokuNo\Bokunorecipe\Domain\Model\IngredientsToRecipe|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \BokuNo\Bokunorecipe\Domain\Model\IngredientsToRecipe::class,
            ['dummy']
        );
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getQuantityReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getQuantity()
        );
    }

    /**
     * @test
     */
    public function setQuantityForStringSetsQuantity(): void
    {
        $this->subject->setQuantity('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('quantity'));
    }

    /**
     * @test
     */
    public function getAlternativeMeasurementReturnsInitialValueForInt(): void
    {
        self::assertSame(
            0,
            $this->subject->getAlternativeMeasurement()
        );
    }

    /**
     * @test
     */
    public function setAlternativeMeasurementForIntSetsAlternativeMeasurement(): void
    {
        $this->subject->setAlternativeMeasurement(12);

        self::assertEquals(12, $this->subject->_get('alternativeMeasurement'));
    }

    /**
     * @test
     */
    public function getCustomGroupReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getCustomGroup()
        );
    }

    /**
     * @test
     */
    public function setCustomGroupForStringSetsCustomGroup(): void
    {
        $this->subject->setCustomGroup('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('customGroup'));
    }

    /**
     * @test
     */
    public function getIngredientReturnsInitialValueForIngredients(): void
    {
        self::assertEquals(
            null,
            $this->subject->getIngredient()
        );
    }

    /**
     * @test
     */
    public function setIngredientForIngredientsSetsIngredient(): void
    {
        $ingredientFixture = new \BokuNo\Bokunorecipe\Domain\Model\Ingredients();
        $this->subject->setIngredient($ingredientFixture);

        self::assertEquals($ingredientFixture, $this->subject->_get('ingredient'));
    }
}

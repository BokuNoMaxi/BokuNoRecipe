<?php

declare(strict_types=1);

namespace BokuNo\Bokunorecipe\Tests\Unit\Domain\Model;

use BokuNo\Bokunorecipe\Domain\Model\Ingredients;
use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 *
 * @author Markus Ketterer <ketterer.markus@gmx.at>
 */
class IngredientsTest extends UnitTestCase
{
    /**
     * @var Ingredients|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            Ingredients::class,
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
    public function getTitleReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle(): void
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('title'));
    }

    /**
     * @test
     */
    public function getUnitReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getUnit()
        );
    }

    /**
     * @test
     */
    public function setUnitForStringSetsUnit(): void
    {
        $this->subject->setUnit('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('unit'));
    }

    /**
     * @test
     */
    public function getGlutenReturnsInitialValueForBool(): void
    {
        self::assertFalse($this->subject->getGluten());
    }

    /**
     * @test
     */
    public function setGlutenForBoolSetsGluten(): void
    {
        $this->subject->setGluten(true);

        self::assertEquals(true, $this->subject->_get('gluten'));
    }

    /**
     * @test
     */
    public function getLactoseReturnsInitialValueForBool(): void
    {
        self::assertFalse($this->subject->getLactose());
    }

    /**
     * @test
     */
    public function setLactoseForBoolSetsLactose(): void
    {
        $this->subject->setLactose(true);

        self::assertEquals(true, $this->subject->_get('lactose'));
    }
}

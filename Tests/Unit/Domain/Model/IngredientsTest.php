<?php
declare(strict_types=1);

namespace BokuNo\Bokunorecipe\Tests\Unit\Domain\Model;

use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 *
 * @author Markus Ketterer <ketterer.markus@gmx.at>
 */
class IngredientsTest extends UnitTestCase
{
    /**
     * @var \BokuNo\Bokunorecipe\Domain\Model\Ingredients
     */
    protected $subject;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \BokuNo\Bokunorecipe\Domain\Model\Ingredients();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle()
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'title',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getUnitReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getUnit()
        );
    }

    /**
     * @test
     */
    public function setUnitForStringSetsUnit()
    {
        $this->subject->setUnit('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'unit',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getGlutenReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getGluten()
        );
    }

    /**
     * @test
     */
    public function setGlutenForBoolSetsGluten()
    {
        $this->subject->setGluten(true);

        self::assertAttributeEquals(
            true,
            'gluten',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getLactoseReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getLactose()
        );
    }

    /**
     * @test
     */
    public function setLactoseForBoolSetsLactose()
    {
        $this->subject->setLactose(true);

        self::assertAttributeEquals(
            true,
            'lactose',
            $this->subject
        );
    }
}

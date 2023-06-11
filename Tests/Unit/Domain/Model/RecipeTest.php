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
class RecipeTest extends UnitTestCase
{
    /**
     * @var \BokuNo\Bokunorecipe\Domain\Model\Recipe|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \BokuNo\Bokunorecipe\Domain\Model\Recipe::class,
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
    public function getPortionsReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getPortions()
        );
    }

    /**
     * @test
     */
    public function setPortionsForStringSetsPortions(): void
    {
        $this->subject->setPortions('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('portions'));
    }

    /**
     * @test
     */
    public function getMaxTimeReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getMaxTime()
        );
    }

    /**
     * @test
     */
    public function setMaxTimeForStringSetsMaxTime(): void
    {
        $this->subject->setMaxTime('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('maxTime'));
    }

    /**
     * @test
     */
    public function getPrepTimeReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getPrepTime()
        );
    }

    /**
     * @test
     */
    public function setPrepTimeForStringSetsPrepTime(): void
    {
        $this->subject->setPrepTime('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('prepTime'));
    }

    /**
     * @test
     */
    public function getTeaserReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getTeaser()
        );
    }

    /**
     * @test
     */
    public function setTeaserForStringSetsTeaser(): void
    {
        $this->subject->setTeaser('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('teaser'));
    }

    /**
     * @test
     */
    public function getPreparationReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getPreparation()
        );
    }

    /**
     * @test
     */
    public function setPreparationForStringSetsPreparation(): void
    {
        $this->subject->setPreparation('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('preparation'));
    }

    /**
     * @test
     */
    public function getPublishDateReturnsInitialValueForDateTime(): void
    {
        self::assertEquals(
            null,
            $this->subject->getPublishDate()
        );
    }

    /**
     * @test
     */
    public function setPublishDateForDateTimeSetsPublishDate(): void
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setPublishDate($dateTimeFixture);

        self::assertEquals($dateTimeFixture, $this->subject->_get('publishDate'));
    }

    /**
     * @test
     */
    public function getImagesReturnsInitialValueForFileReference(): void
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getImages()
        );
    }

    /**
     * @test
     */
    public function setImagesForFileReferenceSetsImages(): void
    {
        $image = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $objectStorageHoldingExactlyOneImages = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneImages->attach($image);
        $this->subject->setImages($objectStorageHoldingExactlyOneImages);

        self::assertEquals($objectStorageHoldingExactlyOneImages, $this->subject->_get('images'));
    }

    /**
     * @test
     */
    public function addImageToObjectStorageHoldingImages(): void
    {
        $image = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $imagesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $imagesObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($image));
        $this->subject->_set('images', $imagesObjectStorageMock);

        $this->subject->addImage($image);
    }

    /**
     * @test
     */
    public function removeImageFromObjectStorageHoldingImages(): void
    {
        $image = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $imagesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $imagesObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($image));
        $this->subject->_set('images', $imagesObjectStorageMock);

        $this->subject->removeImage($image);
    }

    /**
     * @test
     */
    public function getSlugReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getSlug()
        );
    }

    /**
     * @test
     */
    public function setSlugForStringSetsSlug(): void
    {
        $this->subject->setSlug('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('slug'));
    }

    /**
     * @test
     */
    public function getIngredientsReturnsInitialValueForIngredientsToRecipe(): void
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getIngredients()
        );
    }

    /**
     * @test
     */
    public function setIngredientsForObjectStorageContainingIngredientsToRecipeSetsIngredients(): void
    {
        $ingredient = new \BokuNo\Bokunorecipe\Domain\Model\IngredientsToRecipe();
        $objectStorageHoldingExactlyOneIngredients = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneIngredients->attach($ingredient);
        $this->subject->setIngredients($objectStorageHoldingExactlyOneIngredients);

        self::assertEquals($objectStorageHoldingExactlyOneIngredients, $this->subject->_get('ingredients'));
    }

    /**
     * @test
     */
    public function addIngredientToObjectStorageHoldingIngredients(): void
    {
        $ingredient = new \BokuNo\Bokunorecipe\Domain\Model\IngredientsToRecipe();
        $ingredientsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $ingredientsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($ingredient));
        $this->subject->_set('ingredients', $ingredientsObjectStorageMock);

        $this->subject->addIngredient($ingredient);
    }

    /**
     * @test
     */
    public function removeIngredientFromObjectStorageHoldingIngredients(): void
    {
        $ingredient = new \BokuNo\Bokunorecipe\Domain\Model\IngredientsToRecipe();
        $ingredientsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $ingredientsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($ingredient));
        $this->subject->_set('ingredients', $ingredientsObjectStorageMock);

        $this->subject->removeIngredient($ingredient);
    }
}

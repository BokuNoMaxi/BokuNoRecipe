<?php
declare(strict_types=1);

namespace BokuNo\Bokunorecipe\Tests\Unit\Domain\Model;

use BokuNo\Bokunorecipe\Domain\Model\Recipe;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use BokuNo\Bokunorecipe\Domain\Model\IngredientsToRecipe;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 *
 * @author Markus Ketterer <ketterer.markus@gmx.at>
 */
class RecipeTest extends UnitTestCase
{
    /**
     * @var \BokuNo\Bokunorecipe\Domain\Model\Recipe
     */
    protected $subject;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new Recipe();
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
    public function getPortionsReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getPortions()
        );
    }

    /**
     * @test
     */
    public function setPortionsForStringSetsPortions()
    {
        $this->subject->setPortions('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'portions',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getMaxTimeReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMaxTime()
        );
    }

    /**
     * @test
     */
    public function setMaxTimeForStringSetsMaxTime()
    {
        $this->subject->setMaxTime('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'maxTime',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPrepTimeReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getPrepTime()
        );
    }

    /**
     * @test
     */
    public function setPrepTimeForStringSetsPrepTime()
    {
        $this->subject->setPrepTime('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'prepTime',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTeaserReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTeaser()
        );
    }

    /**
     * @test
     */
    public function setTeaserForStringSetsTeaser()
    {
        $this->subject->setTeaser('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'teaser',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPreparationReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getPreparation()
        );
    }

    /**
     * @test
     */
    public function setPreparationForStringSetsPreparation()
    {
        $this->subject->setPreparation('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'preparation',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPublishDateReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getPublishDate()
        );
    }

    /**
     * @test
     */
    public function setPublishDateForDateTimeSetsPublishDate()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setPublishDate($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'publishDate',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getImagesReturnsInitialValueForFileReference()
    {
        $newObjectStorage = new ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getImages()
        );
    }

    /**
     * @test
     */
    public function setImagesForFileReferenceSetsImages()
    {
        $image = new FileReference();
        $objectStorageHoldingExactlyOneImages = new ObjectStorage();
        $objectStorageHoldingExactlyOneImages->attach($image);
        $this->subject->setImages($objectStorageHoldingExactlyOneImages);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneImages,
            'images',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addImageToObjectStorageHoldingImages()
    {
        $image = new FileReference();
        $imagesObjectStorageMock = $this->getMockBuilder(ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $imagesObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($image));
        $this->inject($this->subject, 'images', $imagesObjectStorageMock);

        $this->subject->addImage($image);
    }

    /**
     * @test
     */
    public function removeImageFromObjectStorageHoldingImages()
    {
        $image = new FileReference();
        $imagesObjectStorageMock = $this->getMockBuilder(ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $imagesObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($image));
        $this->inject($this->subject, 'images', $imagesObjectStorageMock);

        $this->subject->removeImage($image);
    }

    /**
     * @test
     */
    public function getSlugReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getSlug()
        );
    }

    /**
     * @test
     */
    public function setSlugForStringSetsSlug()
    {
        $this->subject->setSlug('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'slug',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getIngredientsReturnsInitialValueForIngredientsToRecipe()
    {
        $newObjectStorage = new ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getIngredients()
        );
    }

    /**
     * @test
     */
    public function setIngredientsForObjectStorageContainingIngredientsToRecipeSetsIngredients()
    {
        $ingredient = new IngredientsToRecipe();
        $objectStorageHoldingExactlyOneIngredients = new ObjectStorage();
        $objectStorageHoldingExactlyOneIngredients->attach($ingredient);
        $this->subject->setIngredients($objectStorageHoldingExactlyOneIngredients);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneIngredients,
            'ingredients',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addIngredientToObjectStorageHoldingIngredients()
    {
        $ingredient = new IngredientsToRecipe();
        $ingredientsObjectStorageMock = $this->getMockBuilder(ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $ingredientsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($ingredient));
        $this->inject($this->subject, 'ingredients', $ingredientsObjectStorageMock);

        $this->subject->addIngredient($ingredient);
    }

    /**
     * @test
     */
    public function removeIngredientFromObjectStorageHoldingIngredients()
    {
        $ingredient = new IngredientsToRecipe();
        $ingredientsObjectStorageMock = $this->getMockBuilder(ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $ingredientsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($ingredient));
        $this->inject($this->subject, 'ingredients', $ingredientsObjectStorageMock);

        $this->subject->removeIngredient($ingredient);
    }
}

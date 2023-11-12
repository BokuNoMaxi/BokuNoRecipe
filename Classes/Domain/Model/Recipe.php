<?php

declare(strict_types=1);

namespace BokuNo\Bokunorecipe\Domain\Model;

use TYPO3\CMS\Extbase\Annotation\Validate;
use TYPO3\CMS\Extbase\Annotation\ORM\Cascade;
use TYPO3\CMS\Extbase\DomainObject\AbstractValueObject;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;

/**
 * This file is part of the "BokuNoRecipe" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2021 Markus Ketterer <ketterer.markus@gmx.at>
 */

/**
 * Recipe
 */
class Recipe extends AbstractValueObject
{

    /**
     * @var ObjectStorage<Category>
     */
    protected $categories = null;

    /**
     * title
     *
     * @var string
     */
    #[Validate(['validator' => 'NotEmpty'])]
    protected $title = '';

    /**
     * portions
     *
     * @var string
     */
    protected $portions = '';

    /**
     * maxTime
     *
     * @var string
     */
    protected $maxTime = '';

    /**
     * prepTime
     *
     * @var string
     */
    protected $prepTime = '';

    /**
     * teaser
     *
     * @var string
     */
    protected $teaser = '';

    /**
     * preparation
     *
     * @var string
     */
    protected $preparation = '';

    /**
     * publishDate
     *
     * @var \DateTime
     */
    protected $publishDate = null;

    /**
     * images
     *
     * @var ObjectStorage<FileReference>
     */
    #[Cascade(['value' => 'remove'])]
    protected $images = null;

    /**
     * slug
     *
     * @var string
     */
    protected $slug = '';

    /**
     * ingredients
     *
     * @var ObjectStorage<IngredientsToRecipe>
     */
    #[Cascade(['value' => 'remove'])]
    protected $ingredients = null;

    /**
     * related
     *
     * @var ObjectStorage<\BokuNo\Bokunorecipe\Domain\Model\Recipe>
     */
    #[Cascade(['value' => 'remove'])]
    protected $related = null;

    /**
     * __construct
     */
    public function __construct()
    {

        // Do not remove the next line: It would break the functionality
        $this->initializeObject();
        $this->categories = new ObjectStorage();
    }

    /**
     * Initializes all ObjectStorage properties when model is reconstructed from DB (where __construct is not called)
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    public function initializeObject()
    {
        $this->images = $this->images ?: new ObjectStorage();
        $this->ingredients = $this->ingredients ?: new ObjectStorage();
        $this->related = $this->related ?: new ObjectStorage();
    }

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * Returns the preparation
     *
     * @return string $preparation
     */
    public function getPreparation()
    {
        return $this->preparation;
    }

    /**
     * Sets the preparation
     *
     * @param string $preparation
     * @return void
     */
    public function setPreparation(string $preparation)
    {
        $this->preparation = $preparation;
    }

    /**
     * Adds a FileReference
     *
     * @param FileReference $image
     * @return void
     */
    public function addImage(FileReference $image)
    {
        $this->images->attach($image);
    }

    /**
     * Removes a FileReference
     *
     * @param FileReference $imageToRemove The FileReference to be removed
     * @return void
     */
    public function removeImage(FileReference $imageToRemove)
    {
        $this->images->detach($imageToRemove);
    }

    /**
     * Returns the images
     *
     * @return ObjectStorage<FileReference> $images
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Sets the images
     *
     * @param ObjectStorage<FileReference> $images
     * @return void
     */
    public function setImages(ObjectStorage $images)
    {
        $this->images = $images;
    }

    /**
     * Adds a IngredientsToRecipe
     *
     * @param IngredientsToRecipe $ingredient
     * @return void
     */
    public function addIngredient(IngredientsToRecipe $ingredient)
    {
        $this->ingredients->attach($ingredient);
    }

    /**
     * Removes a IngredientsToRecipe
     *
     * @param IngredientsToRecipe $ingredientToRemove The IngredientsToRecipe to be removed
     * @return void
     */
    public function removeIngredient(IngredientsToRecipe $ingredientToRemove)
    {
        $this->ingredients->detach($ingredientToRemove);
    }

    /**
     * Returns the ingredients
     *
     * @return ObjectStorage<IngredientsToRecipe> $ingredients
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * Sets the ingredients
     *
     * @param ObjectStorage<IngredientsToRecipe> $ingredients
     * @return void
     */
    public function setIngredients(ObjectStorage $ingredients)
    {
        $this->ingredients = $ingredients;
    }

    /**
     * Returns the slug
     *
     * @return string $slug
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Sets the slug
     *
     * @param string $slug
     * @return void
     */
    public function setSlug(string $slug)
    {
        $this->slug = $slug;
    }

    /**
     * Returns the publishDate
     *
     * @return \DateTime $publishDate
     */
    public function getPublishDate()
    {
        return $this->publishDate;
    }

    /**
     * Sets the publishDate
     *
     * @param \DateTime $publishDate
     * @return void
     */
    public function setPublishDate(\DateTime $publishDate)
    {
        $this->publishDate = $publishDate;
    }

    /**
     * Returns the teaser
     *
     * @return string $teaser
     */
    public function getTeaser()
    {
        return $this->teaser;
    }

    /**
     * Sets the teaser
     *
     * @param string $teaser
     * @return void
     */
    public function setTeaser(string $teaser)
    {
        $this->teaser = $teaser;
    }

    /**
     * Get categories
     *
     * @return Category[]
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Get first category
     *
     * @return Category
     */
    public function getFirstCategory()
    {
        $categories = $this->getCategories();
        if (!is_null($categories)) {
            $categories->rewind();
            return $categories->current();
        } else {
            return null;
        }
    }

    /**
     * Set categories
     *
     * @param ObjectStorage $categories
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    /**
     * Adds a category to this categories.
     *
     * @param Category $category
     */
    public function addCategory(Category $category)
    {
        $this->getCategories()->attach($category);
    }

    /**
     * Returns Ingredients in a group seperated array
     *
     * @return array
     */
    public function getIngredientsInGroups()
    {
        $ingredients = $this->getIngredients();
        $return = [];
        foreach ($ingredients as $key => $ingredient) {
            $ingredientGroup = $ingredient->getCustomGroup();
            if ($ingredientGroup) {
                if (!$return[$ingredientGroup]) {
                    $return[$ingredientGroup] = [];
                }
                array_push($return[$ingredientGroup], $ingredient);
            } else {
                if (!$return['no-group']) {
                    $return['no-group'] = [];
                }
                array_push($return['no-group'], $ingredient);
            }
        }
        return $return;
    }

    /**
     * Returns the portions
     *
     * @return string portions
     */
    public function getPortions()
    {
        return $this->portions;
    }

    /**
     * Sets the portions
     *
     * @param string $portions
     * @return void
     */
    public function setPortions(string $portions)
    {
        $this->portions = $portions;
    }

    /**
     * Returns the maxTime
     *
     * @return string $maxTime
     */
    public function getMaxTime()
    {
        return $this->maxTime;
    }

    /**
     * Sets the maxTime
     *
     * @param string $maxTime
     * @return void
     */
    public function setMaxTime(string $maxTime)
    {
        $this->maxTime = $maxTime;
    }

    /**
     * Returns the prepTime
     *
     * @return string $prepTime
     */
    public function getPrepTime()
    {
        return $this->prepTime;
    }

    /**
     * Sets the prepTime
     *
     * @param string $prepTime
     * @return void
     */
    public function setPrepTime(string $prepTime)
    {
        $this->prepTime = $prepTime;
    }

    /**
     * Adds a Recipe
     *
     * @param \BokuNo\Bokunorecipe\Domain\Model\Recipe $related
     * @return void
     */
    public function addRelated(\BokuNo\Bokunorecipe\Domain\Model\Recipe $related)
    {
        $this->related->attach($related);
    }

    /**
     * Removes a Recipe
     *
     * @param \BokuNo\Bokunorecipe\Domain\Model\Recipe $relatedToRemove The Recipe to be removed
     * @return void
     */
    public function removeRelated(\BokuNo\Bokunorecipe\Domain\Model\Recipe $relatedToRemove)
    {
        $this->related->detach($relatedToRemove);
    }

    /**
     * Returns the related
     *
     * @return ObjectStorage<\BokuNo\Bokunorecipe\Domain\Model\Recipe>
     */
    public function getRelated()
    {
        return $this->related;
    }

    /**
     * Sets the related
     *
     * @param ObjectStorage<\BokuNo\Bokunorecipe\Domain\Model\Recipe> $related
     * @return void
     */
    public function setRelated(ObjectStorage $related)
    {
        $this->related = $related;
    }
}

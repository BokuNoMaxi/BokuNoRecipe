<?php

declare(strict_types=1);

namespace BokuNo\Bokunorecipe\Domain\Model;


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
class Recipe extends \TYPO3\CMS\Extbase\DomainObject\AbstractValueObject
{

    /**
     * title
     *
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $title = '';

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
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
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
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\BokuNo\Bokunorecipe\Domain\Model\IngredientsToRecipe>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $ingredients = null;

    /**
     * __construct
     */
    public function __construct()
    {

        // Do not remove the next line: It would break the functionality
        $this->initializeObject();
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
        $this->images = $this->images ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->ingredients = $this->ingredients ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function addImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
    {
        $this->images->attach($image);
    }

    /**
     * Removes a FileReference
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $imageToRemove The FileReference to be removed
     * @return void
     */
    public function removeImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $imageToRemove)
    {
        $this->images->detach($imageToRemove);
    }

    /**
     * Returns the images
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $images
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Sets the images
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $images
     * @return void
     */
    public function setImages(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $images)
    {
        $this->images = $images;
    }

    /**
     * Adds a IngredientsToRecipe
     *
     * @param \BokuNo\Bokunorecipe\Domain\Model\IngredientsToRecipe $ingredient
     * @return void
     */
    public function addIngredient(\BokuNo\Bokunorecipe\Domain\Model\IngredientsToRecipe $ingredient)
    {
        $this->ingredients->attach($ingredient);
    }

    /**
     * Removes a IngredientsToRecipe
     *
     * @param \BokuNo\Bokunorecipe\Domain\Model\IngredientsToRecipe $ingredientToRemove The IngredientsToRecipe to be removed
     * @return void
     */
    public function removeIngredient(\BokuNo\Bokunorecipe\Domain\Model\IngredientsToRecipe $ingredientToRemove)
    {
        $this->ingredients->detach($ingredientToRemove);
    }

    /**
     * Returns the ingredients
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\BokuNo\Bokunorecipe\Domain\Model\IngredientsToRecipe> $ingredients
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * Sets the ingredients
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\BokuNo\Bokunorecipe\Domain\Model\IngredientsToRecipe> $ingredients
     * @return void
     */
    public function setIngredients(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $ingredients)
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
}

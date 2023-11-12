<?php

declare(strict_types=1);

namespace BokuNo\Bokunorecipe\Domain\Model;

use TYPO3\CMS\Extbase\Annotation\Validate;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * This file is part of the "BokuNoRecipe" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2021 Markus Ketterer <ketterer.markus@gmx.at>
 */

/**
 * IngredientsToRecipe
 */
class IngredientsToRecipe extends AbstractEntity
{

    /**
     * quantity
     *
     * @var string
     */
    #[Validate(['validator' => 'NotEmpty'])]
    protected $quantity = '';

    /**
     * alternativeMeasurement
     *
     * @var int
     */
    #[Validate(['validator' => 'NotEmpty'])]
    protected $alternativeMeasurement = 0;

    /**
     * customGroup
     *
     * @var string
     */
    protected $customGroup = '';

    /**
     * ingredient
     *
     * @var Ingredients
     */
    protected $ingredient = null;

    /**
     * Returns the quantity
     *
     * @return string $quantity
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Sets the quantity
     *
     * @param string $quantity
     * @return void
     */
    public function setQuantity(string $quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * Returns the alternativeMeasurement
     *
     * @return int $alternativeMeasurement
     */
    public function getAlternativeMeasurement()
    {
        return $this->alternativeMeasurement;
    }

    /**
     * Sets the alternativeMeasurement
     *
     * @param int $alternativeMeasurement
     * @return void
     */
    public function setAlternativeMeasurement(int $alternativeMeasurement)
    {
        $this->alternativeMeasurement = $alternativeMeasurement;
    }

    /**
     * Returns the ingredient
     *
     * @return Ingredients $ingredient
     */
    public function getIngredient()
    {
        return $this->ingredient;
    }

    /**
     * Sets the ingredient
     *
     * @param Ingredients $ingredient
     * @return void
     */
    public function setIngredient(Ingredients $ingredient)
    {
        $this->ingredient = $ingredient;
    }

    /**
     * Returns the customGroup
     *
     * @return string customGroup
     */
    public function getCustomGroup()
    {
        return $this->customGroup;
    }

    /**
     * Sets the customGroup
     *
     * @param string $customGroup
     * @return void
     */
    public function setCustomGroup(string $customGroup)
    {
        $this->customGroup = $customGroup;
    }
}

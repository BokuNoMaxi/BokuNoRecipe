<?php

declare(strict_types=1);

namespace BokuNo\Bokunorecipe\Domain\Model;
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
 * Category
 */
class Category extends AbstractEntity
{

    /**
     * title
     *
     * @var string
     */
    protected $title = "";

    public function getTitle()
    {
        return $this->title;
    }

    /**
     * slug
     *
     * @var string
     */
    protected $slug = "";

    public function getSlug()
    {
        return $this->slug;
    }


}

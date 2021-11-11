<?php
declare(strict_types=1);

namespace BokuNo\Bokunorecipe\Tests\Unit\Domain\Model;

use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 *
 * @author Markus Ketterer <ketterer.markus@gmx.at>
 */
class CategoryTest extends UnitTestCase
{
    /**
     * @var \BokuNo\Bokunorecipe\Domain\Model\Category
     */
    protected $subject;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \BokuNo\Bokunorecipe\Domain\Model\Category();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function dummyTestToNotLeaveThisFileEmpty()
    {
        self::markTestIncomplete();
    }
}

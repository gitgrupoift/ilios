<?php

declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\MeshTree;
use Mockery as m;

/**
 * Tests for Entity MeshTree
 * @group model
 */
class MeshTreeTest extends EntityBase
{
    /**
     * @var MeshTree
     */
    protected $object;

    /**
     * Instantiate a MeshTree object
     */
    protected function setUp(): void
    {
        $this->object = new MeshTree();
    }

    public function testNotBlankValidation()
    {
        $notBlank = array(
            'treeNumber'
        );
        $this->validateNotBlanks($notBlank);

        $this->object->setTreeNumber('junk');
        $this->validate(0);
    }

    /**
     * @covers \App\Entity\MeshTree::setTreeNumber
     * @covers \App\Entity\MeshTree::getTreeNumber
     */
    public function testSetTreeNumber()
    {
        $this->basicSetTest('treeNumber', 'string');
    }

    /**
     * @covers \App\Entity\MeshTree::getDescriptor
     * @covers \App\Entity\MeshTree::setDescriptor
     */
    public function testSetDescriptor()
    {
        $this->entitySetTest('descriptor', "MeshDescriptor");
    }
}

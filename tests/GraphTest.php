<?php

/*
 * This file is part of the Orient package.
 *
 * (c) Alessandro Nadalin <alessandro.nadalin@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Class DijkstraTest
 *
 * @package     Osidays
 * @subpackage  Tests
 * @author      Alessandro Nadalin <alessandro.nadalin@gmail.com>
 */

use Osidays\Graph;
use Osidays\Graph\Vertex;

class GraphTest extends PHPUnit_Framework_TestCase
{
    public function testCalculatingGraphPotentials()
    {
        $node0 = new Vertex();
        $node1 = new Vertex();
        $node2 = new Vertex();
        $node3 = new Vertex();
        
        $node0->connect($node1, 3);
        $node0->connect($node2, 4);
        $node1->connect($node3, 1);
        $node2->connect($node3, 2);
        
        $graph = new Graph(array(
          $node0, $node1, $node2, $node3
        ));
        
        $this->assertEquals(3, $node1->getPotential());
        $this->assertEquals(0, $node0->getPotential());
        $this->assertEquals(4, $node2->getPotential());
        $this->assertEquals(4, $node3->getPotential());
    }
}


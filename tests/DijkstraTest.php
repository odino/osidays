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

use Osidays\Algorithm\ShortestPath\Dijkstra;
use Osidays\Graph;
use Osidays\Graph\Vertex;

class DijkstraTest extends PHPUnit_Framework_TestCase
{
    public function testSolvingTheAlgorithm()
    {
        $bengaluru  = new Vertex;
        $goa        = new Vertex;
        $pune       = new Vertex;
        $hyderabad  = new Vertex;
        $solapur    = new Vertex;
        $graph      = new Graph(array($bengaluru, $goa, $pune));
        $algorithm  = new Dijkstra();
        
        $this->assertEquals(array($bengaluru, $goa, $pune), $algorithm->solve());
    }
}


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
    /**
     * @dataProvider provider
     */
    public function testSolvingTheAlgorithm($path, $algorithm)
    {
        $this->assertEquals($path, $algorithm->solve());
    }
    
    /**
     * @expectedException \LogicException
     */
    public function testAnExceptionIsRaisedWithNegativelyConnectedVertices()
    {
        $bengaluru  = $this->getMock('Osidays\Graph\Vertex', array('connect', 'getPotential'));
        $goa        = $this->getMock('Osidays\Graph\Vertex', array('connect', 'getPotential'));       
        $goa->expects($this->any())
            ->method('getPotential')
            ->will($this->returnValue(-1));

        $algorithm  = new Dijkstra($bengaluru, $goa);
        $algorithm->solve();
    }
    
    public function provider()
    {
        $a = new Vertex();
        $b = new Vertex();
        $a->connect($b, 1);
        
        $set1 = array(
            array($a, $b), new Dijkstra($a, $b),
        );
        
        $bengaluru  = new Vertex;
        $goa        = new Vertex;
        $pune       = new Vertex;
        $hyderabad  = new Vertex;
        $solapur    = new Vertex;
        $bengaluru->connect($goa, 558);
        $goa->connect($pune, 449);
        $bengaluru->connect($hyderabad, 579);
        $hyderabad->connect($solapur, 306);
        $solapur->connect($pune, 251);

        $set2 = array(
            array($bengaluru, $goa, $pune), new Dijkstra($bengaluru, $pune),
        );

        $set3 = array(
            null, new Dijkstra($pune, $bengaluru),
        );
        
        return array(
            $set1, $set2, $set3
        );
    }
}


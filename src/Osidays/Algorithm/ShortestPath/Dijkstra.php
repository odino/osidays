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
 * Class Dijkstra
 *
 * @package     Osidays
 * @subpackage  Algorithm
 * @author      Alessandro Nadalin <alessandro.nadalin@gmail.com>
 */

namespace Osidays\Algorithm\ShortestPath;

use Osidays\Graph;
use Osidays\Graph\Vertex;

class Dijkstra
{
    protected $graph;
    protected $endingVertex;
    protected $startingVertex;
    
    public function __construct(Graph $graph, Vertex $from, Vertex $to)
    {
        $this->graph            = $graph;
        $this->startingVertex   = $from;
        $this->endingVertex     = $to;
    }
    
    public function getGraph()
    {
        return $this->graph;
    }
    
    public function solve()
    {
        $path   = array();
        $vertex = $this->getEndingVertex();
        $this->calculatePotentials(
                $this->getStartingVertex(), 
                $this->getEndingVertex()
        );
        
        while ($vertex != $this->getStartingVertex()) {
            $path[] = $vertex;
            $vertex = $vertex->getVertexGivingPotential();
        }
        
        $path[] = $this->getStartingVertex();
        
        return array_reverse($path);
    }
    
    protected function assignConnectedPotentials(Vertex $vertex)
    {
        foreach ($vertex->getConnections() as $connection)
        {
            $neighbour = $connection->getDestination();
            $potential = $vertex->getPotential() + $connection->getDistance();
            
            if (!$neighbour->getPotential() || $potential < $neighbour->getPotential()) {
                $neighbour->setPotential($potential, $vertex);
            }
            
            $this->assignConnectedPotentials($connection->getDestination());
        }
    }
    
    protected function calculatePotentials(Vertex $from, Vertex $to)
    {  
        $from->setPotential(0);
        $this->assignConnectedPotentials($from);
    }    
    
    protected function getEndingVertex()
    {
        return $this->endingVertex;
    }
    
    protected function getStartingVertex()
    {
        return $this->startingVertex;
    }
}


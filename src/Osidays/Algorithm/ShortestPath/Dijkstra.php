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
    
    /**
     * Creates a new algorithm object, setting the graph to be analyzed
     * and the starting and ending vertices of the path we need to calculate.
     *
     * @param Graph   $graph
     * @param Vertex  $from
     * @param Vertex  $to 
     */
    public function __construct(Graph $graph, Vertex $from, Vertex $to)
    {
        $this->graph            = $graph;
        $this->startingVertex   = $from;
        $this->endingVertex     = $to;
    }
    
    /**
     * Solves the algorithm.
     *
     * @return array The shortest path
     * @throws \LogicException
     */
    public function solve()
    {
        $path   = array();
        $vertex = $this->getEndingVertex();
        $this->calculatePotentials(
                $this->getStartingVertex(), 
                $this->getEndingVertex()
        );
        
        while ($vertex && $vertex != $this->getStartingVertex()) {
            if ($vertex->getPotential() < 0) {
              $message = sprintf(
                  "%s's algorithm does not support negatively-connected vertices",
                  __CLASS__
              );
              
              throw new \LogicException($message);
            }
            
            $path[] = $vertex;
            $vertex = $vertex->getVertexGivingPotential();
        }
        
        $path[] = $this->getStartingVertex();
        
        return array_reverse($path);
    }
    
    /**
     * Assigns potentials to a $vertex, recursively doing this operation on the
     * vertices to which the current $vertex is connected.
     * A potential is assigned in 2 cases:
     * - the $vertex has not potential
     * - the new potential is lower than the previous one
     *
     * @param Vertex $vertex 
     */
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
    
    /**
     * Returns the destination of the path.
     *
     * @return Vertex
     */
    protected function getEndingVertex()
    {
        return $this->endingVertex;
    }
    
    /**
     * Retrieves the starting vertex of the path.
     *
     * @return Vertex
     */
    protected function getStartingVertex()
    {
        return $this->startingVertex;
    }
}


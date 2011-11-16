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
 * Class Vertex
 *
 * @package     Osidays
 * @subpackage  Graph
 * @author      Alessandro Nadalin <alessandro.nadalin@gmail.com>
 */

namespace Osidays\Graph;

use Osidays\Graph\Edge;

class Vertex
{
    protected $edges              = array();
    protected $potential                = null;
    protected $vertexGivingPotential    = null;
    
    /**
     * Connects the current object to another $vertex.
     *
     * @param Vertex  $vertex
     * @param int     $distance 
     */
    public function connect(Vertex $vertex, $distance = 1)
    {
        $this->edges[] = new Edge($this, $vertex, $distance);
    }
    
    /**
     * Returns all the outgoing connections of the current object.
     *
     * @return array
     */
    public function getConnections()
    {
        return $this->edges;
    }
    
    /**
     * Returns the potential of the current object.
     *
     * @return int
     */
    public function getPotential()
    {
        return $this->potential;
    }
    
    /**
     * Returns the Vertex that assigned its current potential to the current
     * object.
     *
     * @return Vertex
     */
    public function getVertexGivingPotential()
    {
        return $this->vertexGivingPotential;
    }
    
    /**
     * Sets the $potential of the current object.
     * If $vertex is provided, it gets stored as the entity which assigned
     * to the current object its potential.
     *
     * @param int     $potential
     * @param Vertex  $vertex 
     */
    public function setPotential($potential, Vertex $vertex = null)
    {
        $this->potential                = (int) $potential;
        $this->vertexGivingPotential    = $vertex;
    }
}


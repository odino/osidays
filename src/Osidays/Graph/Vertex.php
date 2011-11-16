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
    
    public function connect(Vertex $vertex, $distance = 1)
    {
        $this->edges[] = new Edge($this, $vertex, $distance);
    }
    
    public function getConnections()
    {
        return $this->edges;
    }
    
    public function getPotential()
    {
        return $this->potential;
    }
    
    public function getVertexGivingPotential()
    {
        return $this->vertexGivingPotential;
    }
    
    public function setPotential($potential, Vertex $vertex = null)
    {
        $this->potential                = (int) $potential;
        $this->vertexGivingPotential    = $vertex;
    }
}


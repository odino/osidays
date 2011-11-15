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

class Vertex
{
    protected $connections  = array();
    protected $potential    = null;
    
    public function connect(Vertex $vertex, $distance = 1)
    {
        $this->connections[] = array(
          'vertex'    => $vertex,
          'distance'  => $distance,
        );
    }
    
    public function getConnections()
    {
        return $this->connections;
    }
    
    public function getPotential()
    {
        return $this->potential;
    }
    
    public function setPotential($potential)
    {
        $this->potential = (int) $potential;
    }
}


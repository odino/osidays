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

class Dijkstra
{
    public function solve()
    {
        $path   = array();
        $vertex = $this->getEndingVertex();
        $this->getGraph()->calculatePotentials();
        
        while ($vertex->getId() != $this->getStartingVertex()->getId()) {
            $path[] = $vertex;
            $vertex = $vertex->getVertexGivingPotential();
        }
        
        $path[] = $this->getStartingVertex();
        
        return array_reverse($path);
    }
}


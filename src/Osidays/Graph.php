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
 * Class Graph
 *
 * @package     Osidays
 * @subpackage  Graph
 * @author      Alessandro Nadalin <alessandro.nadalin@gmail.com>
 */

namespace Osidays;

use Osidays\Graph\Vertex;

class Graph
{
    protected $vertices = array();
    
    public function __construct(array $vertices)
    {
        $this->vertices = $vertices;
    }
    
    public function getVertices()
    {
        return $this->vertices;
    }
}


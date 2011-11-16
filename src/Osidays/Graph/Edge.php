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
 * Class Edge
 *
 * @package     Osidays
 * @subpackage  Graph
 * @author      Alessandro Nadalin <alessandro.nadalin@gmail.com>
 */

namespace Osidays\Graph;

use Osidays\Graph\Vertex;

class Edge
{
  protected $source;
  protected $destination;
  protected $distance;
  
  /**
   * Builds a new Edge, setting the $source and $destination of the object and
   * the distance between this 2 vertices.
   *
   * @param Vertex  $source
   * @param Vertex  $destination
   * @param int     $distance 
   */
  public function __construct(Vertex $source, Vertex $destination, $distance)
  {
    $this->source       = $source;
    $this->destination  = $destination;
    $this->distance     = (int) $distance;
  }
  
  /**
   * Returns the destination of the edge.
   *
   * @return Vertex
   */
  public function getDestination()
  {
    return $this->destination;
  }
  
  /**
   * Returns the distance between the vertices which are connected by the
   * current object.
   *
   * @return int
   */
  public function getDistance()
  {
    return $this->distance;
  }
  
  /**
   * Returns the source of the edge.
   *
   * @return Vertex
   */
  public function getSource()
  {
    return $this->source;
  }
}


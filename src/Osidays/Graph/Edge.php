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
  
  public function __construct(Vertex $source, Vertex $destination, $distance)
  {
    $this->source       = $source;
    $this->destination  = $destination;
    $this->distance     = (int) $distance;
  }
  
  public function getDestination()
  {
    return $this->destination;
  }
  
  public function getDistance()
  {
    return $this->distance;
  }
  
  public function getSource()
  {
    return $this->source;
  }
}


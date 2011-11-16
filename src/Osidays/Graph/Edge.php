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
  protected $from;
  protected $to;
  protected $distance;
  
  public function __construct(Vertex $from, Vertex $to, $distance)
  {
    $this->from     = $from;
    $this->to       = $to;
    $this->distance = (int) $distance;
  }
}


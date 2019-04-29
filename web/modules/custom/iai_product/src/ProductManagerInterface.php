<?php
namespace Drupal\iai_product;

use Drupal\node\NodeInterface;

/**
 * Defines the interface for retrieving fully loaded product nodes.
 */

interface ProductManagerInterface {

  /**
   * @param \Drupal\node\NodeInterface $product
   *
   * @return array
   *  Returns a fully loaded product node
   */
  public function retrieveProductImages(NodeInterface $product);
}
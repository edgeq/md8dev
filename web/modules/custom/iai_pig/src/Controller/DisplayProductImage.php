<?php
/**
 * @file
 * Contains \Drupal\iai_pig\DisplayProductImage
 */

namespace Drupal\iai_pig\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\file\Entity\File;
use Drupal\node\NodeInterface;

/**
 * Display a given image for a given product
 */

class DisplayProductImage extends ControllerBase {
  /**
   * Display a product image
   *
   * @param \Drupal\node\NodeInterface
   *  The full loaded node entity
   *
   * @param integer $delta
   *  The image instance to load
   *
   * @return array $render_array
   *  The render array
   */
  public function displayProductImage(NodeInterface $node, $delta) {
    if(isset($node->field_product_image[$delta])) {
      $imageData = $node->field_product_image[$delta]->getValue();
      $file = File::load($imageData['target_id']);
      $render_array['image_data'] = array(
        '#theme' => 'image_style',
        '#uri' => $file->getFileUri(),
        '#style_name' => 'product_large',
        '#alt' => $imageData['alt'],
      );
    }
    else {
      $render_array['image_data'] = [
        '#type' => 'markup',
        '#markup' => $this->t('You are viewing @title. Unfortunately, there is no image defined for delta: @delta.', array('@title' => $node->title->value, '@delta' => $delta)),
      ];
    }
    return $render_array;
  }
}


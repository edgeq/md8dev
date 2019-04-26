<?php
/**
 * @file
 * Contains \Drupal\custom_module\Controller\CustomModuleController
 *
 */

namespace Drupal\custom_module\Controller;

use Drupal\Core\Controller\ControllerBase;

class FirstController extends ControllerBase {
  public function content() {
    return array(
      '#type' => 'markup',
      '#markup' => t('This is my menu linked custom page'),
    );
  }
}
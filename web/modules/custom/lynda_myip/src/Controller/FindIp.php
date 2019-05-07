<?php
/**
 * @file
 * Contains the find IP controller
 */

namespace Drupal\lynda_myip\Controller;

use Drupal\Core\Controller\ControllerBase;

class FindIp extends ControllerBase {
  public function content() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Your IP is ') . $_SERVER['HTTP_X_FORWARDED_FOR'],
    ];
  }
}
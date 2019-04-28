<?php
/**
 * @file
 * Contains \Drupal\iai_aquifer|DisplayAquifers\
 */

namespace Drupal\iai_aquifer\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * The various methods in this controller build a render array to be displayed
 * in a page.
 */
class DisplayAquifers extends ControllerBase {

  /**
   * @param string $region
   *  Return total number of auifers in a region
   */
  public function getTotalAquifers($region = 'ALL'){

  }

  /**
   * Display aquifer names
   * @return array
   *  The render array
   */
  public function getAquiferNames() {

  }

  /**
   * @param string $aquiferName
   *  Name of aquifer for which to display data
   *
   * @return array
   *  The render array
   */
  public function getAquiferData($aquiferName) {

  }
}


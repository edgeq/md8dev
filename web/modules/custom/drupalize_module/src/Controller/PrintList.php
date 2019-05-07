<?php
/**
 * @file
 * Contains the print list controller
 */
namespace Drupal\drupalize_module\Controller;

use Drupal\Core\Controller\ControllerBase;

class PrintList extends ControllerBase {
  public function content() {
    $items = [];
    $items[] = 'Simple string';
    $items[] = [
      '#markup' => 'Simple <span>#markup</span> string',
    ];
    $items[] = [
      '#markup' => 'Custom item',
      '#wrapper_attributes' => [
        'class' => ['custom-item-class', 'emphasis-class'],
      ],
    ];
//    $items[] = [
//      '#markup' => 'Parent item',
//      'children' => [
//        'Simple string child',
//        'second string child',
//        [
//          '#markup' => 'Third child item with custom attributes',
//          '#wrapper_attributes' => [
//            'class' => ['custom-child-class'],
//          ],
//        ],
//      ],
//    ];

    return [
      '#theme' => 'drupalize_module_marquee',
      '#title' => $this->t("Example of using #theme item_list"),
      '#items' => $items,
    ];
  }


}
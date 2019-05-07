<?php
/**
 * @file
 * Provides a controller for printing tables
 */

namespace Drupal\drupalize_module\Controller;


use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Render\Element\Table;

class PrintTable extends ControllerBase {
  public function buildTable() {
    $build['table'] = [
      '#type' => 'table',
      '#caption' => $this->t('Our favorite colors.'),
      '#header' => [$this->t('Name'), $this->t('Favorite color')],
      '#rows' => [
        [$this->t('Amber'), $this->t('teal')],
        [$this->t('Addi'), $this->t('green')],
        [$this->t('Blake'), $this->t('#C0FF33')],
        [$this->t('Enid'), $this->t('indigo')],
        [$this->t('Joe'), $this->t('green')],
      ],
      '#description' => $this->t('Example of using #type.'),
    ];

    return $build['table'];
  }
}
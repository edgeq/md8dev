<?php

namespace Drupal\module_hero\Plugin\Block;

use Drupal\Core\Annotation\Translation;
use Drupal\Core\Block\BlockBase;

/**
 * Provides a block called "Example Hero Block"
 *
 * @Block(
 *   id = "module_hero_hero",
 *   admin_label = @Translation("Example Hero Block"),
 *   category = @Translation("Custom Block")
 *  )
 */
class HeroBlock extends BlockBase {

  /**
   * {@inheritDoc}
   */
  public function build() {
    $heroes = [
      ["hero_name" => "Aquaman", "real_name" => "Arthur Curry"],
      ["hero_name" => "Namor The Sub-Mariner", "real_name" => "Namor McKenzie"],
      ["hero_name" => "Marineman", "real_name" => "Bernie Sanders"],
      ["hero_name" => "Ariel", "real_name" => "Sansa Stark"],
      ["hero_name" => "Tempest", "real_name" => "Pete B."],
      ["hero_name" => "The Drowned God", "real_name" => "Theon Greyjoy"],
    ];

    $table = [
      '#type' => 'table',
      '#header' => [
        $this->t('Hero Name'),
        $this->t('Real Name'),
      ]
    ];

    foreach($heroes as $hero) {
      $table[] = [
        'hero_name' => [
          '#type' => '#markup',
          '#markup' => $hero['hero_name'],
        ],
        'real_name' => [
          '#type' => '#markup',
          '#markup' => $hero['real_name'],
        ],
      ];
    }

    return $table;
  }

}
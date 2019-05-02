<?php

namespace Drupal\module_hero\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\module_hero\HeroArticleService;
use Drupal\Core\Config\ConfigFactory;


/**
 * The Hero Controller
 */
class HeroController extends ControllerBase {
  private $articleHeroService;
  protected $configFactory;
  protected $currentUser;

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('module_hero.hero_articles'),
      $container->get('config.factory'),
      $container->get('current_user')
    );
  }

  public function __construct(HeroArticleService $articleHeroService, ConfigFactory $configFactory, $currentUser) {
    $this->articleHeroService = $articleHeroService;
    $this->configFactory = $configFactory;
    $this->currentUser = $currentUser;
  }

  public function heroList() {
    $heroes = [
      ["name" => "Aquaman"],
      ["name" => "Namor The Sub-Mariner"],
      ["name" => "Marineman"],
      ["name" => "Ariel"],
      ["name" => "Tempest"],
      ["name" => "The Drowned God"],
    ];

    if ($this->currentUser->hasPermission('can see hero list')) {
      return [
        '#theme' => 'hero_list',
        '#items' => $heroes,
        '#title' => $this->configFactory->get('module_hero.settings')->get('hero_list_title'),
        '#subtitle' => $this->t('What is dead may never die.')
      ];
    }
    else {
      return [
        '#theme' => 'hero_list',
        '#items' => [],
        '#title' => $this->configFactory->get('module_hero.settings')->get('hero_list_title'),
        '#subtitle' => $this->t('What is dead may never die.')
      ];
    }


  }

}
<?php

namespace Drupal\module_hero\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\module_hero\HeroArticleService;


/**
 * The Hero Controller
 */
class HeroController extends ControllerBase {
  private $articleHeroService;

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('module_hero.hero_articles')
    );
  }

  public function __construct(HeroArticleService $articleHeroService) {
    $this->articleHeroService = $articleHeroService;
  }

  public function heroList() {
    kint($this->articleHeroService->getHeroArticles()); die();
    $heroes = [
      ["name" => "Aquaman"],
      ["name" => "Namor The Sub-Mariner"],
      ["name" => "Marineman"],
      ["name" => "Ariel"],
      ["name" => "Tempest"],
      ["name" => "The Drowned God"],
    ];


    return [
      '#theme' => 'hero_list',
      '#items' => $heroes,
      '#title' => $this->t('Drowned heroes.'),
      '#subtitle' => $this->t('What is dead may never die.')
    ];

  }

}
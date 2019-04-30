<?php
namespace Drupal\iai_aquifer\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Entity\EntityRepositoryInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides an Aquifer block with the names of the Aquifers
 *
 * @Block(
 *   id = "aquifer_block",
 *   admin_label = @Translation("Aquifer Listing"),
 *   category = @Translation("Lists (Views)") *
 * )
 */
class AquiferBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * The entity storage for aquifers
   *
   * @var \Drupal\Core\Entity\EntityStorageInterface
   */
  protected $nodeStorage;

  /**
   * @var \Drupal\Core\Entity\EntityRepositoryInterface
   */
  protected $entityRepository;

  public function __construct(array $configuration, $plugin_id, $plugin_definition, EntityTypeManagerInterface $entity_type_manager, EntityRepositoryInterface $entity_repository) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->nodeStorage = $entity_type_manager->getStorage('node');
    $this->entityRepository = $entity_repository;
  }

  /**
   * {@inheritDoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('entity_type.manager'),
      $container->get('entity.repository')
    );
  }

  /**
   * {@inheritDoc}
   */
  public function defaultConfiguration() {
   return array(
     'block_count' => 5,
   );
  }

  /**
   * {@inheritDoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $range = range(2, 20);
    $form['block_count'] = array(
      '#type' => 'select',
      '#title' => $this->t('Number of aquifer items in block'),
      '#default_value' => $this->configuration['block_count'],
      '#options' => array_combine($range, $range),
    );
    return $form;
  }

  /**
   * {@inheritDoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['block_count'] = $form_state->getValue('block_count');
  }

  /**
   * {@inheritDoc}
   */
  public function build() {
   $result = $this->nodeStorage->getQuery()
     ->condition('type', 'aquifer')
     ->condition('status', 1)
     ->range(0, $this->configuration['block_count'])
     ->sort('title', 'ASC')
     ->execute();

   if ($result) {
     $items = $this->nodeStorage->loadMultiple($result);
     $build['list'] = [
       '#theme' => 'item_list',
       '#items' => [],
     ];

     foreach ($items as $item) {
       $translatedItem = $this->entityRepository->getTranslationFromContext($item);
       $build['list']['#items'][$items->id()] = [
         '#type' => 'markup',
         '#markup' => $translatedItem->label(),
       ];
     }
     $build['#cache']['tags'][] = 'node_list';
     return $build;
   }
  }
}
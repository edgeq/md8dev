<?php
namespace Drupal\module_hero\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Custom Hero Form
 */
class HeroForm extends FormBase {

  /**
   * {@inheritDoc}
   */
  public function getFormId() {
    return 'module_hero_heroform';
  }

  /**
   * {@inheritDoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // two text fields for heroes to duke it out
    $form['rival_1'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Rival One'),
    ];
    $form['rival_2'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Rival Two'),
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Fight'),
    ];


    return $form;
  }

  /**
   * {@inheritDoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $winner = rand(1, 2);
    drupal_set_message(
      'The winner between ' . $form_state->getValue('rival_1') . ' and ' . $form_state->getValue('rival_2') . ' is ' . $form_state->getValue('rival_' . $winner)
    );
  }

  /**
   * {@inheritDoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    if (empty($form_state->getValue('rival_1'))) {
      $form_state->setErrorByName('rival_1', $this->t('Please specify Rival One'));

    }
  }


}
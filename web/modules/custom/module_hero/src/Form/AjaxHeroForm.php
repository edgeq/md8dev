<?php

namespace Drupal\module_hero\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;

class AjaxHeroForm extends FormBase {

  /**
   * {@inheritDoc}
   */
  public function getFormId() {
    return 'module_hero_ajaxhero';
  }

  /**
   * @inheritDoc
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // two text fields for heroes to duke it out
    $form['message'] = [
      '#type' => 'markup',
      '#markup' => '<div class="result_message"></div>',
    ];
    $form['rival_1'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Rival One'),
    ];
    $form['rival_2'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Rival Two'),
    ];
    $form['submit'] = [
      '#type' => 'button',
      '#value' => $this->t('Battle'),
      '#ajax' => [
        'callback' => '::setMessage',
      ]
    ];


    return $form;
  }

  public function setMessage(array &$form, FormStateInterface $form_state){
    $winner = rand(1, 2);
    $response = new AjaxResponse();
    $response->addCommand(
      new HtmlCommand(
        '.result_message',
        'The winner is ' . $form_state->getValue('rival_' . $winner)
      )
    );

    return $response;
  }
  /**
   * {@inheritDoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    drupal_set_message(
      'Form submitted'
    );
  }


}
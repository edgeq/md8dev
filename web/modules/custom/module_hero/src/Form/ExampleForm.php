<?php

namespace Drupal\module_hero\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class ExampleForm extends FormBase {

  /**
   * {@inheritDoc}
   */
  public function getFormId() {
    return 'module_hero_example_form';
  }

  /**
   * {@inheritDoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['some_form_element'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Input'),
    ];
    $form['text'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Enter lots of text'),
    ];
    $form['select_box'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Choose yes or no'),
    ];
    $form['settings']['active'] = array(
      '#type' => 'radios',
      '#title' => $this
        ->t('Poll status'),
      '#default_value' => 0,
      '#options' => array(
        0 => $this
          ->t('Closed'),
        1 => $this
          ->t('Active'),
        2 => $this
          ->t('Pending'),
      ),
    );
    $form['example_select'] = [
      '#type' => 'select',
      '#title' => $this->t('Select element'),
      '#options' => [
        '1' => $this->t('One'),
        '2' => $this->t('Two'),
        '3' => $this->t('Three'),
      ],
    ];
    $form['event_date'] = array(
      '#type' => 'date',
      '#title' => $this
        ->t('Event Start'),
      '#default_value' => array(
        'year' => 2020,
        'month' => 2,
        'day' => 15,
      ),
    );

    return $form;
  }

  /**
   * @inheritDoc
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    drupal_set_message(
      'Form submitted'
    );
  }


}
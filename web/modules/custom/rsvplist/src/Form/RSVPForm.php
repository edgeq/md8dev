<?php
/**
 * @file
 * Contains \Drupal\rsvplist\Form\RSVPForm
 *
 */

namespace Drupal\rsvplist\Form;

use Drupal\Core\Database\Database;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class RSVPForm extends FormBase {
  /**
   * (@inheritdoc)
   */
  public function getFormId() {
    // Give this instance of the form an ID.
    return 'rsvp_email_form';
  }
  public function buildForm(array $form, FormStateInterface $form_state) {
    // setting up $node based on current route/node
    $node = \Drupal::routeMatch()->getParameter('node');
    // getting the node id value
    $nid = $node;
    // define the email form element
    $form['email'] = array(
      '#title' => t('Email Address'),
      '#type' => 'textfield',
      '#size' => 25,
      '#description' => t("We'll send updates to the email address you provide"),
      '#required' => TRUE,
    );
    // define the submit form element
    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('RSVP'),
    );
    // use the $nid as the form's hidden nid value
    $form['nid'] = array(
      '#type' => 'hidden',
      '#value' => $nid,
    );
    return $form;
  }

  /**
   * (@inheritdoc)
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $value = $form_state->getValue('email');
    if($value == !\Drupal::service('email.validator')->isValid($value)) {
      $form_state->setErrorByName('email', t('The email address %mail is not valid', array('%mail' => $value)));
    }
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    // load all current user information
    $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
    // insert the following fields into rsvplist table in db
    db_insert('rsvplist')
      ->fields(array(
        'mail' => $form_state->getValue('email'),
        'nid' => $form_state->getValue('nid'),
        'uid' => $user->id(),
        'created' => time(),
      ))->execute();
    drupal_set_message(t('Thank you for RSVPing, you are on the list for the event'));
  }
}
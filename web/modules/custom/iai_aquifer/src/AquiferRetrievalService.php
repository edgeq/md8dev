<?php
namespace Drupal\iai_aquifer;

/**
 * An implementation of AquiferRetrievalServiceInterface.
 */

/******************************************************************************
 **                                                                          **
 ** This is a mocked up service. It doesn't actually use any external        **
 ** service.                                                                 **
 **                                                                          **
 ******************************************************************************/

class AquiferRetrievalService implements AquiferRetrievalServiceInterface {
  protected $restEndpoint;

  /**
   * Constructs the Aquifer Retrieval Service object.
   *
   * @param string $rest_endpoint
   */
  public function __construct(string $rest_endpoint) {
    $this->restEndpoint = $rest_endpoint;
  }

  /**
   * {@inheritDoc}
   */
  public function getTotalAquifers($region = 'ALL') {
    return 100;
  }

  /**
   * {@inheritDoc}
   */
  public function getAquiferNames($region = 'ALL', $limit = -1, $offset = 0) {
    $aquiferNames = array();
    $aquiferNames = array(
      'bigBlue',
      'deepOcean',
      'vastSea',
    );
    return $aquiferNames;
  }

  /**
   * @inheritDoc
   */
  public function getAquiferData($name) {
    $aquiferData = array();
    switch ($name) {
      case 'bigBlue':
        $aquiferData['coordinates'] = '47.7231° N, 86.9407° W';
        $aquiferData['status'] = 'low';
        $aquiferData['volume'] = 1000000;
        break;
      case 'deepOcean':
        $aquiferData['coordinates'] = '14.5994° S, 28.6731° W';
        $aquiferData['status'] = 'full';
        $aquiferData['volume'] = 1000000000000;
        break;
      case 'vastSea':
        $aquiferData['coordinates'] = '34.5531° N, 18.0480° E';
        $aquiferData['status'] = 'adequate';
        $aquiferData['volume'] = 1000000000;
        break;
      default:
        $aquiferData['coordinates'] = 'unknown';
        $aquiferData['status'] = 'N/A';
        $aquiferData['volume'] = 'unknown';
    }
    return $aquiferData;
  }
}
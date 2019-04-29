<?php
namespace Drupal\iai_aquifer;

/**
 * Defines an interface that provides information about aquifers.
 *
 * This interface defines methods to retrieve information about aquifers.
 * It is possible to find out about all known aquifers as well as to find out
 * details about a specific aquifer.
 */
interface AquiferRetrievalServiceInterface {

  /**
   * Get the total number of aquifers
   *
   * @param string $region
   *  Region to which to limit the search
   *
   * @param int
   *  The number of tracked aquifers
   */
  public function getTotalAquifers($region = 'ALL');

  /**
   * Get the names of aquifers
   * @param string $region
   *  Region to which to limit the search
   * @param integer $limit
   *  The number of results to return
   * @param integer $offset
   *  The amount of results to skip
   *
   * @return array
   *  The name of aquifers
   */
  public function getAquiferNames($region = 'ALL', $limit = -1, $offset = 0);

  /**
   * Retrieve the current data for a given aquifer
   *
   * @param string $name
   *  The name of the aquifer for which the data is being retrieved
   *
   * @return array
   *  An associative array that contains the properties and their
   *   corresponding values for an aquifer. The properties are:
   *     coordinates: The latitude / longitude of the aquifer
   *     status: [ empty | critical | low | adequate | full | overflowing ]
   *     volume: measured in cubic liters
   */
  public function getAquiferData($name);
}
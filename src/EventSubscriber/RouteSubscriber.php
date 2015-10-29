<?php

namespace Drupal\simplesamlphp_auth\EventSubscriber;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

class RouteSubscriber extends RouteSubscriberBase {

  /**
   * Alters routes for the IdP single logout feature, if it's active.
   *
   * @param \Symfony\Component\Routing\RouteCollection $collection
   *   The route collection for adding routes.
   */
  protected function alterRoutes(RouteCollection $collection) {
    $config = \Drupal::config('simplesamlphp_auth.settings');
    // Set the Single Log Off URL, if it's enabled.
    if ($config->get('allow.slo')) {
      if ($route = $collection->get('user.logout')) {
        $route->setPath('/simplesamlphp_auth/logout');
      }
    }
  }

}

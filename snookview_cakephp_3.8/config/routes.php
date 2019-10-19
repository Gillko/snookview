<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 * Cache: Routes are cached to improve performance, check the RoutingMiddleware
 * constructor in your `src/Application.php` file to change this behavior.
 *
 */
Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    // Register scoped middleware for in scopes.
    $routes->registerMiddleware('csrf', new CsrfProtectionMiddleware([
        'httpOnly' => true
    ]));

    /**
     * Apply a middleware to the current route scope.
     * Requires middleware to be registered via `Application::routes()` with `registerMiddleware()`
     */
    $routes->applyMiddleware('csrf');

    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    /*Admin add routes*/
    $routes->connect('/admin/videos/add', ['controller' => 'videos', 'action' => 'adminAdd']);

    $routes->connect('/admin/items/add', ['controller' => 'items', 'action' => 'adminAdd']);

    $routes->connect('/admin/comments/add', ['controller' => 'comments', 'action' => 'adminAdd']);

    $routes->connect('/admin/favorites/add', ['controller' => 'favorites', 'action' => 'adminAdd']);

    $routes->connect('/admin/sessions/add', ['controller' => 'sessions', 'action' => 'adminAdd']);

    $routes->connect('/admin/players/add', ['controller' => 'players', 'action' => 'adminAdd']);

    $routes->connect('/admin/rankings/add', ['controller' => 'rankings', 'action' => 'adminAdd']);

    $routes->connect('/admin/rounds/add', ['controller' => 'rounds', 'action' => 'adminAdd']);

    $routes->connect('/admin/seasons/add', ['controller' => 'seasons', 'action' => 'adminAdd']);

    $routes->connect('/admin/timelines/add', ['controller' => 'timelines', 'action' => 'adminAdd']);

    $routes->connect('/admin/tournaments/add', ['controller' => 'tournaments', 'action' => 'verify']);

    $routes->connect('/users/verify', ['controller' => 'users', 'action' => 'adminAdd']);
    /*Admin add routes*/

    /*Verify account*/
    $routes->connect('/admin/users/add', ['controller' => 'users', 'action' => 'adminAdd']);
    /*Verify account*/

    /*Admin index routes*/
    $routes->connect('/videos/admin-index', ['controller' => 'videos', 'action' => 'adminIndex']);
    /*Admin index routes*/


    $routes->connect('/admin/videos/edit/', ['controller' => 'videos', 'action' => 'adminEdit']);

    $routes->connect('/admin/items/edit/{$id}', ['controller' => 'items', 'action' => 'adminEdit']);

    $routes->connect(
        '/videos/edit/:id',
        [
            'controller' => 'Videos', 
            'action' => 'edit'
        ]
    )
    ->setPatterns(
        [
            'id' => '\d+'
        ]
    )
    ->setPass(
        [
            'id'
        ]
    );

    $routes->connect(
        '/videos/*',
        [
            'controller' => 'Videos', 
            'action' => 'view'
        ]
    );

    /*videos with slug*/
    $routes->connect(
        '/videos/:id/:slug',
        [
            'controller' => 'Videos', 
            'action' => 'view'
        ]
    )
    // Define the route elements in the route template
    // to pass as function arguments. Order matters since this
    // will simply map ":id" to $articleId in your action
    ->setPass(
        [
            'id', 
            'slug'
        ]
    )
    // Define a pattern that `id` must match.
    ->setPatterns(
        [
            'id' => '[0-9]+',
        ]
    );
     /*videos with slug*/


    /*players with slug*/
    $routes->connect(
        '/players/:id/:slug',
        [
            'controller' => 'Players', 
            'action' => 'view'
        ]
    )
    // Define the route elements in the route template
    // to pass as function arguments. Order matters since this
    // will simply map ":id" to $articleId in your action
    ->setPass(
        [
            'id', 
            'slug'
        ]
    )
    // Define a pattern that `id` must match.
    ->setPatterns(
        [
            'id' => '[0-9]+',
        ]
    );
    /*players with slug*/

    /*tournaments with slug*/
    $routes->connect(
        '/tournaments/:id/:slug',
        [
            'controller' => 'Tournaments', 
            'action' => 'view'
        ]
    )
    // Define the route elements in the route template
    // to pass as function arguments. Order matters since this
    // will simply map ":id" to $articleId in your action
    ->setPass(
        [
            'id', 
            'slug'
        ]
    )
    // Define a pattern that `id` must match.
    ->setPatterns(
        [
            'id' => '[0-9]+',
        ]
    );
     /*tournaments with slug*/

    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *
     * ```
     * $routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);
     * $routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);
     * ```
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks(DashedRoute::class);
});

//Router::connect('/videos/*', array('controller' => 'videos', 'action' => 'view'));

/**
 * If you need a different set of middleware or none at all,
 * open new scope and define routes there.
 *
 * ```
 * Router::scope('/api', function (RouteBuilder $routes) {
 *     // No $routes->applyMiddleware() here.
 *     // Connect API actions here.
 * });
 * ```
 */
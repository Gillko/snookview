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
    //$routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    $routes->connect('/', ['controller' => 'index', 'action' => 'index']);

   /* $routes->connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
    $routes->connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));*/

    $routes->connect(
        '/videos/*',
        [
            'controller' => 'Videos', 
            'action' => 'view'
        ]
    );

    $routes->connect('/login'   , ['controller' => 'users'  , 'action' => 'login']);
    $routes->connect('/logout'  , ['controller' => 'users'  , 'action' => 'logout']);

    /*Admin add routes*/
    $routes->connect('/admin/videos/add'        , ['controller' => 'videos'     , 'action' => 'adminAdd']);
    $routes->connect('/admin/items/add'         , ['controller' => 'items'      , 'action' => 'adminAdd']);
    $routes->connect('/admin/comments/add'      , ['controller' => 'comments'   , 'action' => 'adminAdd']);
    $routes->connect('/admin/favorites/add'     , ['controller' => 'favorites'  , 'action' => 'adminAdd']);
    $routes->connect('/admin/sessions/add'      , ['controller' => 'sessions'   , 'action' => 'adminAdd']);
    $routes->connect('/admin/players/add'       , ['controller' => 'players'    , 'action' => 'adminAdd']);
    $routes->connect('/admin/rankings/add'      , ['controller' => 'rankings'   , 'action' => 'adminAdd']);
    $routes->connect('/admin/rounds/add'        , ['controller' => 'rounds'     , 'action' => 'adminAdd']);
    $routes->connect('/admin/seasons/add'       , ['controller' => 'seasons'    , 'action' => 'adminAdd']);
    $routes->connect('/admin/timelines/add'     , ['controller' => 'timelines'  , 'action' => 'adminAdd']);
    $routes->connect('/admin/tournaments/add'   , ['controller' => 'tournaments', 'action' => 'adminAdd']);
    $routes->connect('/admin/users/add'         , ['controller' => 'users'      , 'action' => 'adminAdd']);
    /*Admin add routes*/

    /*Verify account*/
    $routes->connect('/users/verify', ['controller' => 'users', 'action' => 'verify']);
    /*Verify account*/

    /*Admin index routes*/
    $routes->connect('/admin/videos/'       , ['controller' => 'videos'     , 'action' => 'adminIndex']);
    $routes->connect('/admin/seasons/'      , ['controller' => 'seasons'    , 'action' => 'adminIndex']);
    $routes->connect('/admin/timelines/'    , ['controller' => 'timelines'  , 'action' => 'adminIndex']);
    $routes->connect('/admin/items/'        , ['controller' => 'items'      , 'action' => 'adminIndex']);
    $routes->connect('/admin/rankings/'     , ['controller' => 'rankings'   , 'action' => 'adminIndex']);
    $routes->connect('/admin/users/'        , ['controller' => 'users'      , 'action' => 'adminIndex']);
    $routes->connect('/admin/comments/'     , ['controller' => 'comments'   , 'action' => 'adminIndex']);
    $routes->connect('/admin/rounds/'       , ['controller' => 'rounds'     , 'action' => 'adminIndex']);
    $routes->connect('/admin/tournaments/'  , ['controller' => 'tournaments', 'action' => 'adminIndex']);
    $routes->connect('/admin/favorites/'    , ['controller' => 'favorites'  , 'action' => 'adminIndex']);
    $routes->connect('/admin/players/'      , ['controller' => 'players'    , 'action' => 'adminIndex']);
    $routes->connect('/admin/sessions/'     , ['controller' => 'sessions'   , 'action' => 'adminIndex']);
    /*Admin index routes*/

    /*Admin view routes*/
    $routes->connect('/admin/users/view/:id'        , ['controller' => 'users'      , 'action' => 'adminView'])->setPatterns(['id' => '\d+'])->setPass(['id']);
    $routes->connect('/admin/videos/view/:id'       , ['controller' => 'videos'     , 'action' => 'adminView'])->setPatterns(['id' => '\d+'])->setPass(['id']);
    $routes->connect('/admin/seasons/view/:id'      , ['controller' => 'seasons'    , 'action' => 'adminView'])->setPatterns(['id' => '\d+'])->setPass(['id']);
    $routes->connect('/admin/timelines/view/:id'    , ['controller' => 'timelines'  , 'action' => 'adminView'])->setPatterns(['id' => '\d+'])->setPass(['id']);
    $routes->connect('/admin/items/view/:id'        , ['controller' => 'items'      , 'action' => 'adminView'])->setPatterns(['id' => '\d+'])->setPass(['id']);
    $routes->connect('/admin/rankings/view/:id'     , ['controller' => 'rankings'   , 'action' => 'adminView'])->setPatterns(['id' => '\d+'])->setPass(['id']);
    $routes->connect('/admin/comments/view/:id'     , ['controller' => 'comments'   , 'action' => 'adminView'])->setPatterns(['id' => '\d+'])->setPass(['id']);
    $routes->connect('/admin/rounds/view/:id'       , ['controller' => 'rounds'     , 'action' => 'adminView'])->setPatterns(['id' => '\d+'])->setPass(['id']);
    $routes->connect('/admin/tournaments/view/:id'  , ['controller' => 'tournaments', 'action' => 'adminView'])->setPatterns(['id' => '\d+'])->setPass(['id']);
    $routes->connect('/admin/favorites/view/:id'    , ['controller' => 'favorites'  , 'action' => 'adminView'])->setPatterns(['id' => '\d+'])->setPass(['id']);
    $routes->connect('/admin/players/view/:id'      , ['controller' => 'players'    , 'action' => 'adminView'])->setPatterns(['id' => '\d+'])->setPass(['id']);
    $routes->connect('/admin/sessions/view/:id'     , ['controller' => 'sessions'   , 'action' => 'adminView'])->setPatterns(['id' => '\d+'])->setPass(['id']);
    /*Admin view routes*/

    /*Admin edit routes*/
    $routes->connect('/admin/comments/edit/:id'     , ['controller' => 'Comments'       , 'action' => 'adminEdit'])->setPatterns(['id' => '\d+'])->setPass(['id']);
    $routes->connect('/admin/favorites/edit/:id'    , ['controller' => 'Favorites'      , 'action' => 'adminEdit'])->setPatterns(['id' => '\d+'])->setPass(['id']);
    $routes->connect('/admin/items/edit/:id'        , ['controller' => 'Items'          , 'action' => 'adminEdit'])->setPatterns(['id' => '\d+'])->setPass(['id']);
    $routes->connect('/admin/players/edit/:id'      , ['controller' => 'Players'        , 'action' => 'adminEdit'])->setPatterns(['id' => '\d+'])->setPass(['id']);
    $routes->connect('/admin/rankings/edit/:id'     , ['controller' => 'Rankings'       , 'action' => 'adminEdit'])->setPatterns(['id' => '\d+'])->setPass(['id']);
    $routes->connect('/admin/rounds/edit/:id'       , ['controller' => 'Rounds'         , 'action' => 'adminEdit'])->setPatterns(['id' => '\d+'])->setPass(['id']);
    $routes->connect('/admin/seasons/edit/:id'      , ['controller' => 'Seasons'        , 'action' => 'adminEdit'])->setPatterns(['id' => '\d+'])->setPass(['id']);
    $routes->connect('/admin/sessions/edit/:id'     , ['controller' => 'Sessions'       , 'action' => 'adminEdit'])->setPatterns(['id' => '\d+'])->setPass(['id']);
    $routes->connect('/admin/timelines/edit/:id'    , ['controller' => 'Timelines'      , 'action' => 'adminEdit'])->setPatterns(['id' => '\d+'])->setPass(['id']);
    $routes->connect('/admin/tournaments/edit/:id'  , ['controller' => 'Tournaments'    , 'action' => 'adminEdit'])->setPatterns(['id' => '\d+'])->setPass(['id']);
    $routes->connect('/admin/users/edit/:id'        , ['controller' => 'Users'          , 'action' => 'adminEdit'])->setPatterns(['id' => '\d+'])->setPass(['id']);
    $routes->connect('/admin/comments/edit/:id'     , ['controller' => 'Comments'       , 'action' => 'adminEdit'])->setPatterns(['id' => '\d+'])->setPass(['id']);
    $routes->connect('/admin/rankings/edit/:id'     , ['controller' => 'Rankings'       , 'action' => 'adminEdit'])->setPatterns(['id' => '\d+'])->setPass(['id']);
    $routes->connect('/admin/videos/edit/:id'       , ['controller' => 'Videos'         , 'action' => 'adminEdit'])->setPatterns(['id' => '\d+'])->setPass(['id']);
    /*Admin edit routes*/

    /*Admin delete records*/
    $routes->connect('/admin/users/delete/:id'          , ['controller' => 'users'      , 'action' => 'adminDelete']);
    $routes->connect('/admin/videos/delete/:id'         , ['controller' => 'videos'     , 'action' => 'adminDelete']);
    $routes->connect('/admin/items/delete/:id'          , ['controller' => 'items'      , 'action' => 'adminDelete']);
    $routes->connect('/admin/comments/delete/:id'       , ['controller' => 'comments'   , 'action' => 'adminDelete']);
    $routes->connect('/admin/favorites/delete/:id'      , ['controller' => 'favorites'  , 'action' => 'adminDelete']);
    $routes->connect('/admin/sessions/delete/:id'       , ['controller' => 'sessions'   , 'action' => 'adminDelete']);
    $routes->connect('/admin/players/delete/:id'        , ['controller' => 'players'    , 'action' => 'adminDelete']);
    $routes->connect('/admin/rankings/delete/:id'       , ['controller' => 'rankings'   , 'action' => 'adminDelete']);
    $routes->connect('/admin/rounds/delete/:id'         , ['controller' => 'rounds'     , 'action' => 'adminDelete']);
    $routes->connect('/admin/seasons/delete/:id'        , ['controller' => 'seasons'    , 'action' => 'adminDelete']);
    $routes->connect('/admin/timelines/delete/:id'      , ['controller' => 'timelines'  , 'action' => 'adminDelete']);
    $routes->connect('/admin/tournaments/delete/:id'    , ['controller' => 'tournaments', 'action' => 'adminDelete']);
    /*Admin delete records*/


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
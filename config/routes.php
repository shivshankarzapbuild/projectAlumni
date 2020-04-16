<?php
/**
 * Routes configuration.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * It's loaded within the context of `Application::routes()` method which
 * receives a `RouteBuilder` instance `$routes` as method argument.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;


/*
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
 */
/** @var \Cake\Routing\RouteBuilder $routes */
$routes->setRouteClass(DashedRoute::class);

$routes->scope('/', function (RouteBuilder $builder) {
    // Register scoped middleware for in scopes.
    $builder->registerMiddleware('csrf', new CsrfProtectionMiddleware([
        'httpOnly' => true,
    ]));

    /*
     * Apply a middleware to the current route scope.
     * Requires middleware to be registered through `Application::routes()` with `registerMiddleware()`
     */
    $builder->applyMiddleware('csrf');

    /*
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, templates/Pages/home.php)...
     */
    

    // Users Routes 

    $builder->connect('/', ['controller' => 'Users', 'action' => 'index']);
    $builder->connect('/users/home', ['controller' => 'Users', 'action' => 'home']);
    $builder->connect('/users/login', ['controller' => 'Users', 'action' => 'login']);
    $builder->connect('/users/profile', ['controller' => 'Users', 'action' => 'profile']);
    
    $builder->connect('/users/admin', ['controller' => 'Users', 'action' => 'admin']);
    $builder->connect('/users/searchuser', ['controller' => 'Users', 'action' => 'searchuser']);
    $builder->connect('/users/registration', ['controller' => 'Users', 'action' => 'registration']);
    $builder->connect('/posts/logout', ['controller' => 'Users', 'action' => 'logout']);
    $builder->connect('/users/resetpassword', ['controller' => 'Users', 'action' => 'resetpassword']);
    $builder->connect('/users/forgotpassword', ['controller' => 'Users', 'action' => 'forgotpassword']);


    // Posts Routes 

    $builder->connect('/users/posts/add', ['controller' => 'Posts', 'action' => 'add']);


    // Comments Routes

    $builder->connect('/users/comments/add/*', ['controller' => 'Comments', 'action' => 'add']);
    $builder->connect('/users/comments/edit/*', ['controller' => 'Comments', 'action' => 'edit']);
    $builder->connect('/users/comments/delete/*', ['controller' => 'Comments', 'action' => 'delete']);



    // Reports Controller


    $builder->connect('/users/reports/add', ['controller' => 'Reports', 'action' => 'add']);
    $builder->connect('/users/reports/view/*', ['controller' => 'Reports', 'action' => 'view']);


    // Messages routes

        $builder->connect('/users/messages/chat/', ['controller' => 'Messages', 'action' => 'chat']);
        $builder->connect('/users/messages/view', ['controller' => 'Messages', 'action' => 'view']);
        $builder->connect('/users/messages/add', ['controller' => 'Messages', 'action' => 'add']);
        $builder->connect('/users/messages/message', ['controller' => 'Messages', 'action' => 'message']);
        $builder->connect('/users/messages/onlineusers', ['controller' => 'Messages', 'action' => 'onlineusers']);
        $builder->connect('/users/messages/insert', ['controller' => 'Messages', 'action' => 'insert']);
        $builder->connect('/users/messages/fetchhistory', ['controller' => 'Messages', 'action' => 'fetchhistory']);


    // $builder->connect('/admin', ['prefix' => 'Admin','controller' => 'Admins', 'action' => 'index']);
    // $builder->connect('/admin/users', ['controller' => 'Admins', 'action' => 'users']);



    /*
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    $builder->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    Router::prefix('Admin', function (RouteBuilder $routes) {
    // All routes here will be prefixed with `/admin`
    // And have the prefix => admin route element added.
    $routes->connect('/', ['controller' => 'Admins', 'action' => 'index']);
    $routes->connect('/*', ['controller' => 'error', 'action' => 'error']);

    $routes->connect('/users', ['controller' => 'Admins', 'action' => 'users']);
    $routes->connect('/posts', ['controller' => 'Admins', 'action' => 'post']);
    $routes->connect('/comments', ['controller' => 'Admins', 'action' => 'comments']);
    $routes->connect('/deletedmessages', ['controller' => 'Admins', 'action' => 'deletedmessages']);
    $routes->connect('/deletedconversations', ['controller' => 'Admins', 'action' => 'deletedconversations']);
    $routes->connect('/logout', ['controller' => 'Users', 'action' => 'logout']);
    $routes->connect('/reports', ['controller' => 'Admins', 'action' => 'reports']);
    $routes->fallbacks(DashedRoute::class);
    });
    /*
     * Connect catchall routes for all controllers.
     *
     * The `fallbacks` method is a shortcut for
     *
     * ```
     * $builder->connect('/:controller', ['action' => 'index']);
     * $builder->connect('/:controller/:action/*', []);
     * ```
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $builder->fallbacks();
});


/*
 * If you need a different set of middleware or none at all,
 * open new scope and define routes there.
 *
 * ```
 * $routes->scope('/api', function (RouteBuilder $builder) {
 *     // No $builder->applyMiddleware() here.
 *     // Connect API actions here.
 * });
 * ```
 */

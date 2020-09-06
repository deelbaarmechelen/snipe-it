<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 18/09/19
 * Time: 17:30
 */

namespace App\Console\Commands;

/**
 * Class RouteListCommand
 * @package App\Console\Commands
 * Bypass middleware security checks for php artisan route:list command
 */
class RouteListCommand extends \Illuminate\Foundation\Console\RouteListCommand
{
    protected function getMiddleware($route)
    {
        // https://laracasts.com/discuss/channels/general-discussion/routelist-and-authorization
//        return collect($route->gatherMiddleware())->map(function ($middleware) {
//            return $middleware instanceof Closure ? 'Closure' : $middleware;
//        })->implode(',');


        $middlewares = array_values($route->middleware());

//        $middlewares = array_unique(
//            array_merge($middlewares, $this->getPatternFilters($route))
//        );

        $actionName = $route->getActionName();

        return implode(',', $middlewares);
    }
}
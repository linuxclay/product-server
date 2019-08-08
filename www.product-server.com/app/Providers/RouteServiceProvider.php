<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $routes = [
        'api' => [
            'v1' => [
                'domain'     => 'domain.api',
                'prefix'     => 'v1',
                'namespace'  => 'App\Http\Controllers\Api\V1',
                'middleware' => ['signed', 'request.expired'],
                'files'      => [
                    'routes/api/v1/ping.php',
                ],
            ],
        ],
        'common' => [
            'pulbics' => [
                'domain'     => '*',
                'prefix'     => 'common',
                'namespace'  => 'App\Http\Controllers\Common',
                'middleware' => [],
                'files'      => [
                    'routes/common/publics.php',
                ],
            ],
        ],
    ];

    public function boot()
    {
        $this->mapRoutes();
    }

    protected function mapRoutes()
    {
        $domain = head(explode(':', get_http_host()));

        foreach ($this->routes as $name => $version)
        {
            foreach ($version as $route)
            {
                if ($route['domain'] != '*' && $domain != config($route['domain'])) continue;

                $this->loadRoutes($route);
            }
        }
    }

    /**
     * @param $route
     */
    protected function loadRoutes($route)
    {
        foreach ($route['files'] as $file)
        {
            $this->app->router->group(
                array_only($route, ['namespace', 'prefix', 'middleware']),
                function ($router) use ($file)
                {
                    require base_path($file);
                }
            );
        }
    }
}

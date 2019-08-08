<?php

namespace App\Http\Middleware;

use Closure;

class CorsControl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $return_data =  $next($request);

        if ('OPTIONS' == $request->getMethod())
        {
            $return_data->setStatusCode(204);
            $return_data->header('Access-Control-Allow-Methods', 'POST, GET, DELETE, OPTIONS, DELETE');
            $return_data->header('Access-Control-Allow-Headers', 'Content-Type, x-requested-with, Agent-Authorization');
        }
    
        $return_data->header('Access-Control-Allow-Origin','*');
        
        return $return_data;
    }
}
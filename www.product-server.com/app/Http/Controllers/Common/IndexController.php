<?php

namespace App\Http\Controllers\Common;

use App\Exceptions\AppException;
use App\Exceptions\AuthException;
use App\Exceptions\ExampleException;

/**
 * 通用控制器
 *
 */
class IndexController extends BaseController
{
    /**
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function now()
    {
        return $this->revert([
            'now'      => get_now(),
            'timezone' => config('app.timezone'),
        ]);
    }

    /**
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function exceptions()
    {
        $items = [
            'AppException'     => AppException::getCodeMaps(),
            'AuthException'    => AuthException::getCodeMaps(),
            'ExampleException' => ExampleException::getCodeMaps(),
        ];

        return $this->revert($items);
    }
}
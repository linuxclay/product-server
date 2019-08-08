<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Web\BaseController;
use App\Modules\Example\Business\ExampleBusiness;

/**
 * Example controller
 *
 */
class ExampleController extends BaseController
{
    /**
     * @return array
     */
    public function pong()
    {
        app('Logger')->info('hello world!');
        
        return $this->revert(['ping' => 'pong'], 'ok');
    }

    /**
     * @param Request $request
     * @param ExampleBusiness $exampleBusiness
     * @return array|\Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     * @throws \App\Exceptions\ApiException
     * @throws \App\Exceptions\AppException
     * @throws \App\Exceptions\RuntimeException
     */
    public function test(Request $request, ExampleBusiness $exampleBusiness)
    {
//        return $this->revert($exampleBusiness->dao($request->all()));
//        return $this->revert($exampleBusiness->invoke());
        return $this->revert($exampleBusiness->api());
    }
}
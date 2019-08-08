<?php

namespace App\Http\Controllers;

use App\Kernel\Traits\ApiResponseTrait;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use ApiResponseTrait;

    /**
     * 接口响应
     *
     * @param $data
     * @param string $message
     * @return array|\Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    protected function revert($data, string $message = '')
    {
        if (is_object($data) && method_exists($data,'toArray'))
        {
            $data = $data->toArray();
        }
        else if (! is_null($data) && ! is_array($data))
        {
            $data = (array) $data;
        }
        
        if (isset($data['code']) && isset($data['data']) && isset($data['module']))
        {
            if ($message) $data['message'] = $message;

            return $data;
        }
        
        $response = [
            'code'    => 0,
            'message' => $message ?: 'success!',
            'data'    => $data,
            'time'    => get_now(),
            'module'  => config('service.name'),
        ];
        
        return $this->ok($response);
    }
}

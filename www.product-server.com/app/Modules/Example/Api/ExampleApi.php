<?php

namespace App\Modules\Example\Api;

use App\Kernel\Base\BaseApi;

/**
 * 示例 api 请求
 *
 */
class ExampleApi extends BaseApi
{
    /**
     * @var string
     */
    protected $module = 'example';


    /**
     * @return bool
     */
    protected function authorize(): bool
    {
        return true;
    }

    /**
     * Ping
     *
     * @throws \App\Exceptions\ApiException
     * @throws \App\Exceptions\AppException
     * @throws \App\Exceptions\RuntimeException
     */
    public function ping()
    {
        $params = [
            'hello' => 'world'
        ];

        return $this->get('ping', $params);
    }
}
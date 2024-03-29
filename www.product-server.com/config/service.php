<?php

return [

    /*
    |--------------------------------------------------------------------------
    | 服务名称
    |--------------------------------------------------------------------------
    */

    'name' =>  'cfb-example-service',

    /*
    |--------------------------------------------------------------------------
    | 签名密钥
    |--------------------------------------------------------------------------
    */

    'sign_key' =>  env('TEMPLATE_SERVICE_KEY'),

    /*
    |--------------------------------------------------------------------------
    | 是否开启请求签名校验
    |--------------------------------------------------------------------------
    */

    'validation_sign' => env('TEMPLATE_VALIDATION_SIGN', true),
];

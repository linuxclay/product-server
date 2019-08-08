<?php

namespace App\Modules\Example\Validator;

use \Prettus\Validator\LaravelValidator;
use Prettus\Validator\Contracts\ValidatorInterface;

/**
 * 测试校验规则
 *
 */
class TestValidator extends LaravelValidator
{
    /**
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'title' => 'required|int|max:0',
            'text'  => 'min:3',
            'author'=> 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'title' => 'required'
        ]
    ];

    /**
     * @var array
     */
    protected $messages = [
        'required' => 'The :attribute field is required.',
    ];

    /**
     * @var array
     */
    protected $attributes = [
        'title' => 'Title',
    ];
}
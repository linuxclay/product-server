<?php

namespace App\Modules\Example\Business;

use App\Kernel\Base\BaseBusiness;
use App\Modules\Example\Api\ExampleApi;
use App\Modules\Example\Dao\ExampleDao;
use App\Modules\Example\Invoke\ExampleInvoke;
use App\Modules\Example\Validator\TestValidator;
use Prettus\Validator\Contracts\ValidatorInterface;

/**
 * 测试业务
 *
 */
class ExampleBusiness extends BaseBusiness
{
    /**
     * @var ExampleDao
     */
    protected $exampleDao;
    
    /**
     * @var ExampleApi
     */
    protected $exampleApi;
    
    /**
     * @var ExampleInvoke
     */
    protected $exampleInvoke;

    /**
     * ExampleBusiness constructor.
     *
     * @param ExampleDao $exampleDao
     * @param ExampleApi $exampleApi
     * @param ExampleInvoke $exampleInvoke
     */
    public function __construct(
        ExampleDao $exampleDao,
        ExampleApi $exampleApi,
        ExampleInvoke $exampleInvoke
    )
    {
        $this->exampleDao    = $exampleDao;
        $this->exampleApi    = $exampleApi;
        $this->exampleInvoke = $exampleInvoke;
    }
    
    /**
     * 实例方法
     */
    public function invoke()
    {
        return $this->exampleInvoke->example();
    }

    /**
     * @return mixed
     * @throws \App\Exceptions\ApiException
     * @throws \App\Exceptions\AppException
     * @throws \App\Exceptions\RuntimeException
     */
    public function api()
    {
        return $this->exampleApi->ping();
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function dao(array $params)
    {
        app(TestValidator::class)->with($params)->passesOrFail(ValidatorInterface::RULE_CREATE);

        return $this->exampleDao->find(1);
    }
}
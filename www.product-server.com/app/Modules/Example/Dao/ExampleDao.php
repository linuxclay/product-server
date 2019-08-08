<?php

namespace App\Modules\Example\Dao;

use App\Kernel\Base\BaseDao;
use App\Modules\Example\Model\Example;
use Illuminate\Database\Eloquent\Model;
use app\Modules\Example\Constant\Number;

/**
 *
 *
 */
class ExampleDao extends BaseDao
{
    protected function getModel() :Model
    {
        return app(Example::class);
    }

    public function store(array $params, array $extra = [])
    {
        $extra['step'] = Number::ONE;

        $model = $this->getModel();

        $model->fill($params);
        $model->forceFill($extra);
        $model->save();

        return $model;
    }
}

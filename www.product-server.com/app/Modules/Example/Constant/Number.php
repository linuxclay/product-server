<?php

namespace app\Modules\Example\Constant;

use App\Kernel\Base\BaseConstant;

/**
 * 常量类示例
 *
 */
class Number extends BaseConstant
{
    /**
     * One
     *
     * @var int
     */
    const ONE = 1;

    /**
     * Two
     *
     * @var int
     */
    const TWO = 2;

    /**
     * @return array|mixed
     */
    public static function getNames()
    {
        return [
            self::ONE => 'one',
            self::TWO => 'two',
        ];
    }
}
<?php

namespace FreeAbarms\TimestampBetween;

use Encore\Admin\Grid\Filter\Between;

class TimestampBetween extends Between
{
public function condition($inputs)
    {
        // $inputs即为传进来的参数，格式化成timestamp再去构建条件

        if(!isset($inputs['time'])){
            return;
        }

        if(empty($inputs['time'])){
            return;
        } else {
            $value = $inputs['time'];
        }

        if (!isset($value['start'])) {
            $value['end'] = strtotime($value['end']);
            return $this->buildCondition($this->column, '<=', $value['end']);
        }

        if (!isset($value['end'])) {
            $value['start'] = strtotime($value['start']);
            return $this->buildCondition($this->column, '>=', $value['start']);
        }

        $this->query = 'whereBetween';

        $value['end'] = strtotime($value['end']);
        $value['start'] = strtotime($value['start']);

        return $this->buildCondition($this->column, $value);
    }
}

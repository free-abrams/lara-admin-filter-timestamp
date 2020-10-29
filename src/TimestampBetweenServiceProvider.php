<?php

namespace FreeAbarms\TimestampBetween;

use Illuminate\Support\ServiceProvider;
use Encore\Admin\Grid\Filter;

class TimestampBetweenServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        Filter::extend('timestampBetween', TimestampBetween::class);
    }
}

<?php

namespace Devability\LaravelCafebazaar;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Devability\LaravelCafebazaar\Skeleton\SkeletonClass
 */
class LaravelCafebazaarFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-cafebazaar';
    }
}

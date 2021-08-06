<?php

namespace Stephenjude\Braincert;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Stephenjude\Braincert\Braincert
 */
class BraincertFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'braincert-laravel';
    }
}

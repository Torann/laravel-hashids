<?php

namespace Torann\Hashids\Facade;

use Illuminate\Support\Facades\Facade as IlluminateFacade;

class Hashids extends IlluminateFacade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'hashids';
    }
}
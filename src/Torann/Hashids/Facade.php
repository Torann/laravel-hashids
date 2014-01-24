<?php namespace Torann\Hashids;

use Illuminate\Support\Facades\Facade;

class Facade extends Facade {

    /**
     * Get the registered component.
     *
     * @return object
     */
    protected static function getFacadeAccessor() { return 'hashids'; }

}
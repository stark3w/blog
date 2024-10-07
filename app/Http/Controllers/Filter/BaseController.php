<?php

namespace App\Http\Controllers\Filter;

use App\Services\Filter\Service;

class BaseController
{
    public $service;

    /**
     * @param $service
     */
    public function __construct(Service $service)
    {
        $this->service = $service;
    }


}

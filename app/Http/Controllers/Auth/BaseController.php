<?php

namespace App\Http\Controllers\Auth;

use App\Services\Auth\Service;

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

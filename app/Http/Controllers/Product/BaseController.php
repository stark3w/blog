<?php

namespace App\Http\Controllers\Product;

use App\Services\Product\Service;

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

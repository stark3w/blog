<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Auth\Service;
use Illuminate\Http\Request;

class BaseController extends Controller
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

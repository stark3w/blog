<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Catalog;

class CatalogController extends Controller
{

    public function index()
    {
        $catalogs = Catalog::paginate(5);

        return view('catalogs.index', compact('catalogs'));
    }

}

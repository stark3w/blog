<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordController extends BaseController
{
    public function create(Request $request)
    {
        return view('auth.reset-password', compact('request'));
    }

    public function store(ResetPasswordRequest $request)
    {
        $data = $request->validated();

       $this->service->resetPassword($data);
    }
}

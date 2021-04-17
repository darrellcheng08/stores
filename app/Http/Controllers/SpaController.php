<?php

namespace App\Http\Controllers;

use Auth;

class SpaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['login']]);
    }

    public function __invoke()
    {
        if (!request()->expectsJson()) {
            return view('admin.dashboard');
        } else {
            return response()->view('errors.404', [], 404);
        }
    }
}
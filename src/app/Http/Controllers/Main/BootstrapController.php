<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BootstrapController extends Controller
{
    public function index(): View
    {
        return view('main.index');
    }
}

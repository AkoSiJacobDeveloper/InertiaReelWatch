<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PageController extends Controller
{
    public function welcome() {
        return Inertia::render('Welcome', [
            'appName' => 'ReelWatch',
            'time' => now()->toDateTimeString(),
        ]);
    }

    public function about() {
        return Inertia::render('About', [
            'developerName' => 'Paul Jacob Tocmo',
            'appVersion' => app()->version()
        ]);
    }

    public function contact() {
        return Inertia::render('Contact', [
            'email' => 'pauljacobtocmo96@gmail.com',
        ]);
    }
}

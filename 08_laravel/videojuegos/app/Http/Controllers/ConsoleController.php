<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsoleController extends Controller
{
    public function index() {
        $consolas = [
            "PS4",
            "PS5",
            "Nintendo Switch"
        ];

        return view('consolas',["consolas" => $consolas]);
    }
}

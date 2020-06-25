<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class consultaController extends Controller
{
    public function inicio()
    {
        return view('consulta/inicio');
    }
}

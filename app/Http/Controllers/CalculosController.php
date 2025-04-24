<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculosController extends Controller
{
    function soma($x, $y)
    {
        return 'Soma: ' . $x + $y;
    }
    function subtracao($x, $y)
    {
        return 'Subtração: ' . $x - $y;
    }
    function multiplicacao($x, $y)
    {
        return 'Multiplicacao: ' . $x * $y;
    }
    function divisao($x, $y)
    {
        return 'Divisao: ' . $x / $y;
    }
    function quadrado($x)
    {
        return 'Quadrado: ' . $x * $x;
    }
}

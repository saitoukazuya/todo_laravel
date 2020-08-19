<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// 8月１５日作成
class TopController extends Controller
{
    public function __invoke($id)
    {
        return view('top.blade.php');
    }
}


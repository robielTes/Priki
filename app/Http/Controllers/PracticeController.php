<?php

namespace App\Http\Controllers;

use App\Models\Practice;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PracticeController extends Controller
{
    public function show(int $id)
    {
        $practice = Practice::find($id);
        return view('pratice.show', compact('practice'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Practice;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PracticeController extends Controller
{
    public function show(int $id)
    {
        $practice = Practice::publishedOpinion($id);
        return view('pratices.show', compact('practice'));
    }
}

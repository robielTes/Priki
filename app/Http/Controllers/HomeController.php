<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Practice;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $practices = Practice::publication();
        return view('days.index', compact('practices'));
    }

    public function show(int $nbDays)
    {
        $practices = Practice::publishedModifiedOnes($nbDays);
        return view('days.show', compact('practices', 'nbDays'));
    }


}

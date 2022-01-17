<?php

namespace App\Http\Controllers;

use App\Models\Opinion;
use App\Models\OpinionReference;
use App\Models\Practice;

class PracticeController extends Controller
{
    public function index()
    {
        $practices = Practice::all();
        return view('practices.index', compact('practices'));
    }

    public function show(int $id)
    {

        $practice = Practice::publishedOpinion($id);
        $hasPublished= Practice::UserPublishedOpinion($id);
        return view('practices.show', compact('practice','hasPublished'));
    }


}

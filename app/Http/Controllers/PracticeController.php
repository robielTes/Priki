<?php

namespace App\Http\Controllers;

use App\Models\Opinion;
use App\Models\OpinionReference;
use App\Models\Practice;

class PracticeController extends Controller
{
    public function show(int $id)
    {

        $practice = Practice::publishedOpinion($id);
        $hasPublished= Practice::UserPublishedOpinion($id);
        return view('pratices.show', compact('practice','hasPublished'));
    }


}

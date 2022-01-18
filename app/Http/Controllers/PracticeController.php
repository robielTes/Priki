<?php

namespace App\Http\Controllers;

use App\Models\Practice;
use Illuminate\Support\Facades\Gate;

class PracticeController extends Controller
{
    public function index()
    {
        if (!Gate::allows('isModerator')) {
            abort(403);
        }
        $practices = Practice::all();
        return view('practices.index', compact('practices'));
    }

    public function show(int $id)
    {

        $practice = Practice::publishedOpinion($id);
        $hasPublished = Practice::UserPublishedOpinion($id);
        return view('practices.show', compact('practice', 'hasPublished'));
    }


}

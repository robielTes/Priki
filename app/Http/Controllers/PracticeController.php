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
        $practicesDomains = Practice::all()->sortBy('publication_state_id')->groupBy('domain_id');
        return view('practices.index', compact('practicesDomains'));
    }

    public function show(int $id)
    {

        $practice = Practice::publishedOpinion($id);
        $hasPublished = Practice::UserPublishedOpinion($id);
        return view('practices.show', compact('practice', 'hasPublished'));
    }


}

<?php

namespace App\Http\Controllers;

use App\Models\Changelog;
use App\Models\Practice;
use App\Models\PublicationState;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class PracticeController extends Controller
{
    public function index()
    {
        if (!Gate::allows('access-moderator')) {
            abort(403);
        }
        $practicesDomains = Practice::all()->sortBy('publication_state_id')->groupBy('domain_id');
        return view('practices.index', compact('practicesDomains'));
    }

    public function show(int $id)
    {
       if (!Gate::allows('published', Practice::findOrFail($id))) {
            abort(403);
        }
       $histories = Changelog::with('user')->get()->where('practice_id',$id);
        $practice = Practice::publishedOpinion($id);
        $hasPublished = Practice::UserPublishedOpinion($id);
        return view('practices.show', compact('practice', 'hasPublished','histories'));
    }

    public function edit(int $id)
    {

        $practice = Practice::publishedOpinion($id);
        $hasPublished = Practice::UserPublishedOpinion($id);
        return view('practices.edit', compact('practice', 'hasPublished'));
    }

    public function update(Practice $practice)
    {
       $this->authorize('edit',$practice);
        $previously = $practice->title;
        $data = request()->validate([
            'title' => ['required','max:40','min:3','unique:practices'],
        ]);
        $practice->update($data);
        $practice->save();

        Changelog::create([
            'user_id' => auth()->user()->id,
            'practice_id' => $practice->id,
            'reason' => request()->raison,
            'previously' => $previously


        ]);
        return redirect()->route('practices.show', ['id' => $practice->id]);
    }

    public function editState(int $id)
    {

        if (!Gate::allows('access-moderator')) {
            abort(403);
        }
        $practice = Practice::publishedOpinion($id);
        $hasPublished = Practice::UserPublishedOpinion($id);
        return view('practices.state.edit', compact('practice', 'hasPublished'));
    }

    public function updateState(int $id)
    {
        $practice = Practice::findOrFail($id);
        $this->authorize('update',$practice);
        Practice::publise($practice);
        return redirect('days')->with('success', 'Item successfully publication!');
    }



}

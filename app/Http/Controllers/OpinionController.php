<?php

namespace App\Http\Controllers;

use App\Models\Opinion;
use App\Models\Practice;
use App\Models\UserOpinion;
use Illuminate\Http\Request;
use \Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;

class OpinionController extends Controller
{
    public function store(Request $request, int $id): RedirectResponse
    {
        Opinion::newOpinion($request, $id);
        $practice = Practice::findOrFail($id);
        if (!Gate::allows('update', $practice)) {
            return redirect()->route('practices.show', ['id' => $id]);
        }

        return redirect()->route('practices.state.edit', ['id' => $id]);
    }

    public function destroy(Request $request, int $id, int $oId): RedirectResponse
    {
        Opinion::findOrFail($oId)->delete();

        return redirect()->route('practices.show', ['id' => $id]);
    }

    public function updateVote(Request $request, int $id, int $oId, int $vote): RedirectResponse
    {
        UserOpinion::updateOrCreate(
            ['opinion_id' => $oId, 'user_id' => auth()->user()->id],
            ['user_id' => auth()->user()->id, 'opinion_id' => $oId, 'comment' => "", 'points' => $vote]);

        return redirect()->route('practices.show', ['id' => $id]);
    }

    public function updateComment(Request $request, int $id, int $oId): RedirectResponse
    {
        $request->validate([
            'comment' => ['required', 'max:1000', 'min:5'],
        ]);
        UserOpinion::updateOrCreate(
            ['opinion_id' => $oId, 'user_id' => auth()->user()->id],
            ['user_id' => auth()->user()->id, 'opinion_id' => $oId, 'comment' => $request->comment]);

        return redirect()->route('practices.show', ['id' => $id]);
    }
}

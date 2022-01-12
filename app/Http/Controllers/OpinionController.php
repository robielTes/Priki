<?php

namespace App\Http\Controllers;

use App\Models\Opinion;
use App\Models\Practice;
use App\Models\UserOpinion;
use Illuminate\Http\Request;

class OpinionController extends Controller
{
    public function store(Request $request, int $id)
    {
        Opinion::newOpinion($request, $id);

        return redirect()->route('practices.show', ['id' => $id]);
    }

    public function destroy(Request $request, int $id, int $oId)
    {
        Opinion::find($oId)->delete();

        return redirect()->route('practices.show', ['id' => $id]);
    }
    public function updateVote(Request $request, int $id, int $oId, int $vote)
    {
        UserOpinion::updateOrCreate(
            ['opinion_id'=> $oId, 'user_id'=> auth()->user()->id],
            ['user_id' => auth()->user()->id, 'opinion_id' => $oId, 'comment' => "", 'points' => $vote]);

        return redirect()->route('practices.show', ['id' => $id]);
    }
    public function updateComment(Request $request, int $id, int $oId)
    {
        UserOpinion::updateOrCreate(
            ['opinion_id'=> $oId, 'user_id'=> auth()->user()->id],
            ['user_id' => auth()->user()->id, 'opinion_id' => $oId, 'comment' => $_REQUEST['comment']]);

        return redirect()->route('practices.show', ['id' => $id]);
    }
}

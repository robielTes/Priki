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
    public function addVote(Request $request, int $id, int $vote)
    {
        if(UserOpinion::canVote(5)){
            //add vote
        }

        return redirect()->route('practices.show', ['id' => $id]);
    }
}

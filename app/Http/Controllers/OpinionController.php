<?php

namespace App\Http\Controllers;

use App\Models\Opinion;
use App\Models\Practice;
use Illuminate\Http\Request;

class OpinionController extends Controller
{
    public function store(Request $request, int $id)
    {

        $request->validate([
            'opinion' => ['required', 'max:5000', 'min:5'],
        ]);
        Opinion::create([
            'description' => $request->opinion,
            'practice_id' => $id,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('practices.show',['id' => $id]);
    }
}

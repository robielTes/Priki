<?php

namespace App\Http\Controllers;

use App\Models\Reference;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReferenceController extends Controller
{
    public function index()
    {
        $references = Reference::all();
        return view('references.index', compact('references'));
    }

    public function create()
    {
        return view('references.create');
    }

    public function store(Request $request,): RedirectResponse
    {
        $request->validate([
            'description' => ['required', 'max:100', 'min:10'],
            'url' => ['required', 'URL'],
        ]);

       if(Reference::where('url', $request->url)->first() === null){
             Reference::create([
                 'description' => $request->description,
                 'url' => $request->url]);
             return redirect()->route('references')->with('success', 'Item created successfully!');
         }else{
             return redirect()->route('references.create')->with('error','Failed to created Item!');
         }
    }
}

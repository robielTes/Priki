<?php

namespace App\Http\Controllers;

use App\Models\Practice;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    public function index()
    {
        $domains = Practice::domainSize();
        $practices = Practice::publication();
        return view('domains.index', compact('practices','domains'));
    }

    public function show( string $slug)
    {
        session(['domain' => $slug]);
        $domains = Practice::domainSize();
        $practices = Practice::publicationByDomain($slug);
        return view('domains.show', compact('practices','domains'));
    }
}

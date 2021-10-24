<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasteRequest;
use App\Models\Paste;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PasteController extends Controller
{
    public function index(): View
    {
        $pastes = Paste::publicPastes()
            ->actualPastes()
            ->latest()->limit(10)->get();
        return view('pastes.index', compact('pastes'));
    }

    public function store(PasteRequest $request, Paste $paste)
    {
        $hash = Str::random(8);
        $paste->fill($request->validated());
        $paste->hash = $hash;
        $paste->save();
        return Redirect::route('show.paste', [$hash]);
    }

    public function show(string $hash)
    {
        $paste = Paste::where('hash', $hash)
            ->actualPastes()
            ->firstOrFail();
        $pastes = Paste::publicPastes()
            ->actualPastes()
            ->latest()->limit(10)->get();
        return view('pastes.show', compact('pastes', 'paste'));
    }
}

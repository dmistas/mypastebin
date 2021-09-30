<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasteRequest;
use App\Models\Paste;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PasteController extends Controller
{
    public function index(): View
    {
        $pastes = Paste::where('access', Paste::ACCESS_PUBLIC)
            ->where(function ($query) {
                $query->where(function ($query) {
                    $query->whereDate('expiration_time', '>=', Carbon::now()->toDateString())
                        ->whereTime('expiration_time', '>=', Carbon::now()->toTimeString());
                })
                    ->orWhere(function ($query) {
                        $query->where('expiration_time', '=', null);
                    });
            })
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
            ->whereDate('expiration_time', '>=', Carbon::now()->toDateString())
            ->whereTime('expiration_time', '>=', Carbon::now()->toTimeString())
            ->firstOrFail();
        $pastes = Paste::where('access', Paste::ACCESS_PUBLIC)
            ->where(function ($query) {
                $query->where(function ($query) {
                    $query->whereDate('expiration_time', '>=', Carbon::now()->toDateString())
                        ->whereTime('expiration_time', '>=', Carbon::now()->toTimeString());
                })
                    ->orWhere(function ($query) {
                        $query->where('expiration_time', '=', null);
                    });
            })
            ->latest()->limit(10)->get();
        return view('pastes.show', compact('pastes', 'paste'));
    }
}

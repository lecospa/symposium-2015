<?php

namespace App\Http\Controllers;

use App\Talk;
use App\Person;

class PlenarySessionController extends Controller
{
    public function index()
    {
        $plenary_session_people = Person::with('talks')->whereHas('talks', function ($query) {
            $query->plenary();
        })->orderBy('last_name', 'asc')->get();

        return view('plenary_session.index', ['plenary_session_people' => $plenary_session_people]);
    }

    public function show($talk_id)
    {
        $talk = Talk::with('person')->findOrFail($talk_id);

        if ($talk->session != 'Plenary') {
            abort(404);
        }

        return view('plenary_session.show', ['talk' => $talk]);
    }
}

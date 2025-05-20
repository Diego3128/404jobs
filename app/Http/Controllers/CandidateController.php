<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;

class CandidateController extends Controller
{
    public function index(Vacancy $vacancy)
    {
        return view('candidates.index', compact('vacancy'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FollowSuggestionsController extends Controller
{
    public function index()
    {
        return view('follow-suggestions.show');
    }
}

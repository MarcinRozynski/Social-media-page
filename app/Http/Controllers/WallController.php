<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;

class WallController extends Controller
{
    public function main()
    {
        $profiles = Profile::all();

        return view('wall.wall', compact('profiles'));
    }
}

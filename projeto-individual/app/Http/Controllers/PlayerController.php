<?php

namespace App\Http\Controllers;

use App\Models\Players;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function __construct(Players $players)
    {
        $this->model = $players;
    }

    public function index()
    {
        $players = Players::all();

        return view('home', compact('players'));
    }
}

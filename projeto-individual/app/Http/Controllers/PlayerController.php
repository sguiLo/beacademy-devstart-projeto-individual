<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function __construct(Player $player)
    {
        $this->model = $player;
    }

    public function index()
    {

        $players = Player::all();
        return view('players.index', compact('players'));
    }

    public function show($id)
    {
        $player = Player::find($id);
        if (!$player = Player::find($id))
            return redirect()->route('players.index');

        return view('players.show', compact('player'));
    }
}

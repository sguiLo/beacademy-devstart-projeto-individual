<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\User;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function __construct(Player $player)
    {
        $this->model = $player;
    }

    public function index()
    {
        $users = User::all();
        $players = Player::all();
        return view('players.index', compact('players', 'users'));
    }

    public function show($id)
    {
        $player = Player::find($id);
        if (!$player = Player::find($id))
            return redirect()->route('players.index');

        return view('players.show', compact('player'));
    }

    public function create()
    {
        return view('players.create',);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $this->model->create($data);

        return redirect()->route('players.index');
    }
}

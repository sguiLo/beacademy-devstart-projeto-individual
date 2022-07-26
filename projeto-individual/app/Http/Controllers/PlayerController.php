<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        if ($request->photo) {
            $file = $request['photo'];
            $path = $file->store('jogadores', 'public');
            $data['photo'] = $path;
        }

        $this->model->create($data);

        return redirect()->route('players.index');
    }

    public function edit($id)
    {
        if (!$player = $this->model->find($id))
            return redirect()->route('players.index');

        return view('players.edit', compact('player'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        if (!$player = $this->model->find($id))
            return back();

        if ($request->photo) {
            if ($player->photo && Storage::exists($player->photo)) {
                Storage::delete($player->photo);
            }
            $data['photo'] =  $request->photo->store('jogadores', 'public');
        }

        $player->update($data);

        return redirect()->route('players.show', $player->id);
    }

    public function destroy($id)
    {
        if (!$player = $this->model->find($id))
            return back();

        $player->delete();
        return redirect()->route('players.index');
    }
}

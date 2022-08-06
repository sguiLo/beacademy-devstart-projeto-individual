<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlayerController extends Controller
{
    public function __construct(Player $player)
    {
        $this->model = $player;
    }

    public function index(Request $request)
    {


        $players = $this->model->getPlayers(
            $request->search ?? ''
        );

        return view('players.index', compact('players'));
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
            // $file = $request['photo'];
            // $path = $file->store('jogadores', 'public');
            // $data['photo'] = $path;
            $data['photo'] = $request->file('photo')->store('jogadores', 'public');
            Storage::disk('s3')->put($data['photo'], file_get_contents($request->photo));
        }

        $this->model->create($data);
        return redirect()->route('players.index')->with('create', 'Jogador adicionado com sucesso');
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
                Storage::delete('https://devstart-galo.s3.amazonaws.com/' . $player->photo);
            }
            $path = $request->photo->store('/jogadores', 's3');
            $data['photo'] =  $request->photo->store('jogadores', 'public');
        }

        $player->update($data);

        return redirect()->route('players.show', $player->id)->with('update', 'Jogador atualizado com sucesso');
    }

    public function destroy($id)
    {
        if (!$player = $this->model->find($id))
            return back();

        $player->delete();
        return redirect()->route('players.index')->with('destroy', 'Jogador excluido com sucesso');
    }
}

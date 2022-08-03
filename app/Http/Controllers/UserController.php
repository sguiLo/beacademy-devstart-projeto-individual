<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Models\Players;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function index(Request $request)
    {
        $users = $this->model->getUsers(
            $request->search ?? ''
        );
        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::find($id);
        if (!$user = User::find($id))
            return redirect()->route('users.index');

        return view('users.show', compact('user'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserFormRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->passwword);

        $this->model->create($data);
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function edit($id)
    {
        if (!$user = $this->model->find($id))
            return redirect()->route('users.index');

        return view('users.edit', compact('user'));
    }

    public function update(UserFormRequest $request, $id)
    {
        if (!$user = $this->model->find($id))
            return redirect()->route('users.index');

        $data = $request->only('name');

        if ($request->password)
            $data['password'] = bcrypt($request->password);

        $data['is_admin'] = $request->admin ? 1 : 0;

        $user->update($data);

        return redirect()->route('users.show', $user->id)->with('update', 'Usuário atualizado com sucesso.');
    }

    public function destroy($id)
    {
        if (!$user = $this->model->find($id))
            return redirect()->route('users.index');

        $user->delete();
        return redirect()->route('users.index')->with('destroy', 'Usuário excluído com sucesso.');
    }
}

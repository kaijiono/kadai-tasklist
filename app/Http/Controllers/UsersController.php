<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // 追加

class UsersController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);

        return view('users.index', [
            'users' => $users,
        ]);
    }
    public function show($id)
    {
        $user = User::find($id);

        return view('users.show', [
            'user' => $user,
        ]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:255',
        ]);

        $request->user()->tasks()->create([
            'content' => $request->content,
        ]);

        return redirect('/');
    }
    public function destroy($id)
    {
        $task = \App\Task::find($id);

        if (\Auth::user()->id === $task->user_id) {
            $task->delete();
        }

        return redirect()->back();
    }
}
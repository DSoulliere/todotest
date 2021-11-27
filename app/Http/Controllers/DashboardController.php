<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $user = auth()->user();
        $tasks = $user->tasks()->get();
        $users  = User::all();

        return view('dashboard')->with(compact('user', 'users', 'tasks'));
    }
}

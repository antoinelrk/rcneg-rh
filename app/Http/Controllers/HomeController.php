<?php

namespace App\Http\Controllers;

use App\Club;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard, koinkoin.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(User $user) {
        $users = $user->sortable()->get();
        return view('home', compact('users'));
    }
}

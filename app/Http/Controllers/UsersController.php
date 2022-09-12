<?php

namespace App\Http\Controllers;

use App\Club;
use App\User;
use Carbon\Carbon;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $users = User::get();
        return view('pages.users.index', compact('users'));
    }

    public function showMember($member_code) {
        $user = User::where('member_code', $member_code)->first();
        return view('pages.users.show', compact('user'));
    }

    public function showCreateForm() {
        $clubs = Club::get();
        return view('pages.users.create', compact('clubs'));
    }

    public function showEditForm($member_code) {
        $clubs = Club::get();
        $user = User::where('member_code', $member_code)->first();
        return view('pages.users.edit', compact('user', 'clubs'));
    }

    public function showDeleteForm($id) {
        $user = User::where('id', $id)->first();
        return view('pages.users.delete', compact('user'));
    }

    public function store(Request $request) {


        $user = User::create([
            'indicative' => $request->indicative != null ? strtoupper($request->indicative) : null,
            'last_name' => strtoupper($request->last_name),
            'first_name' => utf8_decode(ucfirst(strtolower($request->first_name))),
            'address' => ucfirst(strtolower($request->address)),
            'postal_code' => $request->postal_code,
            'city' => ucfirst(strtolower($request->city)),
            'region' => ucfirst(strtolower($request->region)),
            'country' => strtoupper($request->country),
            'comment' => $request->comment,
            'club_id' => intval($request->club),
            'phone' => $request->phone,
            'self_phone' => $request->self_phone,
            'om' => ($request->om != null ? 1 : 0),
            'member_code' => $request->member_code,
            //'birth_at' => $request->birth_at != null ? Carbon::createFromFormat('Y-m-d H-i-s', $request->birth_at, 'Europe/Paris') : null,
            'birth_at' => $request->birth_at != null ? Carbon::createFromFormat("Y-m-d", $request->birth_at) : null,
            'email' => $request->email != null ? strtolower($request->email) : null,
            //'password' => bcrypt('salsa'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        if ($user->save()) {
            return redirect('/');
        } else {
            return redirect(back());
        }
    }

    public function update(Request $request, $member_code) {
        $user = User::where('member_code', $member_code)->first();

        $user->indicative = strtoupper($request->indicative);
        $user->last_name = strtoupper($request->last_name);
        $user->first_name = $request->first_name;
        $user->address = $request->address;
        $user->postal_code = $request->postal_code;
        $user->city = $request->city;
        $user->region = $request->region;
        $user->country = strtoupper($request->country);
        $user->club_id = intval($request->club_id);
        $user->phone = $request->phone;
        $user->self_phone = $request->self_phone;
        $user->om = ($request->om == "true" ? 1 : 0);
        $user->birth_at = $request->birth_at != null ? Carbon::createFromFormat("Y-m-d", $request->birth_at) : null;
        $user->email = $request->email;
        //$user->portrait = $request->portrait; // TODO: Change uploading system
        $user->password = bcrypt($request->password);
        $user->updated_at = Carbon::now();

        if ($user->save()) {
            return redirect('/');
        } else {
            return redirect(back());
        }
    }

    public function destroy($id) {
        User::destroy($id);
        return redirect(route('home'));
    }
}

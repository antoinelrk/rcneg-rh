<?php

namespace App\Http\Controllers;

use App\Club;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClubsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($indicative) {
        $club = Club::where('indicative', $indicative)->first();

        return view('pages.clubs.show', compact('club'));
    }

    public function showEditForm($indicative) {
        $club = Club::where('indicative', $indicative)->first();
        return view('pages.clubs.edit', compact('club'));
    }

    /*
     * Resources
     */
    public function store(Request $request) {
        $club = Club::create([
            'indicative' => strtoupper($request->indicative),
            'address' => $request->address,
            'postal_code' => intval($request->postal_code),
            'city' => ucwords(strtolower($request->city)),
            'region' => ucwords(strtolower($request->region)),
            'country' => strtoupper($request->country),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        if ($club->save()) {
            return redirect(route('clubs.show', $club->indicative));
        } else {
            return redirect(back());
        }
    }

    public function update(Request $request, $id) {
        $club = Club::where('id', $id)->first();

        $club->update([
            'indicative' => strtoupper($request->indicative),
            'address' => $request->address,
            'postal_code' => intval($request->postal_code),
            'city' => ucwords(strtolower($request->city)),
            'region' => ucwords(strtolower($request->region)),
            'country' => strtoupper($request->country),
            'updated_at' => Carbon::now(),
        ]);

        return redirect(route('clubs.show', $club->indicative));
    }

    public function delete($id) {

    }
}

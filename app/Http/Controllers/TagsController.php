<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class TagsController extends Controller
{
    public $pdf;

    public function __construct()
    {
        $this->middleware('auth');
        $this->pdf = App::make('dompdf.wrapper');
    }

    public function generatePdf($member_code) {
        /* Generate all users vignettes */
        $member = User::where('member_code', $member_code)->first();

        $date = Carbon::now();
        $tag = $this->pdf->loadView('pdf.tags_letter', compact('member', 'date'))->setWarnings(false)->setPaper('a4', 'portrait');
        $tag->save(storage_path() . '\app\public\tags\\' . $member->member_code . '_' . $member->indicative . '_' . $date->format('Y') . '.pdf');

        /* Testing code */
        /*$user = User::where('id', 1)->first();

        $tag = $this->pdf->loadView('pdf.tags_letter', compact('user', 'date'))->setWarnings(false)->setPaper('a4', 'portrait');
        $tag->save(storage_path() . '\app\public\tags\\' . $user->member_code . '_' . $user->indicative . '.pdf');*/

        return redirect(route('home'));
    }
}

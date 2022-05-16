<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// マニュアルからコピペ
use Illuminate\Support\Facades\Auth;

// マニュアルからコピペ
use Illuminate\Support\Facades\Log;

class LectureController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $userId = Auth::id();

        Log::info('LectureController_index' . Auth::id());

        // dd($user, $userId);

        return view('lectures.index');
    }
    //
    // public function index()
    // {
    //     dd(Auth::id());

    // }
}

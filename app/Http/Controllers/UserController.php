<?php

namespace App\Http\Controllers;

use App\Models\Url;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showLinks(){
        $links = Url::all()->where('user_id',Auth::user()->id);
        return view('home/pages/myLinks')->with('data',$links);
    }

}

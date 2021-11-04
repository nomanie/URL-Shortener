<?php

namespace App\Http\Controllers;

use App\Models\Url;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function showAllLinks(){
        if(Auth::user()->role == 2){
            $links = Url::all();
            return view('home/pages/allLinks')->with('data',$links);
        }
        else{
            return "Error, this page is not exists";
        }
    }
    public function showUsers(){
        $users = User::all();
        return view('home/pages/showUsers')->with('data',$users);
    }
    public function deleteUser($id){
        User::where('id',$id)->delete();
    }
    public function addUser(Request $request){
        $input = $request->all();

        $user = User::create([
            'name'=>$input['name'],
            'role'=>$input['role'],
            'email'=>$input['email'],
            'password'=>bcrypt($input['password']),
        ]);
        if($input['verified'] == 1){
            $user->markEmailAsVerified();
        }
        return back();
    }
    public function editUser($id, Request $request){
        $input = $request->all();
        unset($input['_token']);
        if($input['verified'] == 1){
            $input['email_verified_at'] = Carbon::now();
        }
        else{
            $input['email_verified_at'] = null;
        }
        unset($input['verified']);
        User::where('id',$id)->update($input);
        return back();
    }
}

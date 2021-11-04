<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UrlController extends Controller
{
    public function index(){
        return view("home/pages/url");
    }
    public function generate(Request $request){
        if(Auth::user()){
            $user = Auth::user()->id;
        }
        else{
            $user = Null;
        }
        $input = $request->all();
        $input['user_id']=$user;
        $input['exp_time'] = Carbon::now()->addDays($input['time']);
        unset($input['time']);
        $input['created_at']=Carbon::now();
        $input['updated_at']=Carbon::now();
        Url::insert([$input]);
        return route('url',['url'=>$input['url']]);
    }
    public function showUrl($url){
        $url = Url::select('user_url','exp_time')->where('url',$url)->get();
        return view("home/pages/url")->with('url',$url);
    }
    public function delete($url){
        Url::where('url',$url)->delete();
    }

}

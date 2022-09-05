<?php

namespace App\Http\Controllers;

use App\Mail\postMail;
use App\Models\{Category,Post,Subcategory};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    public function index(){
        
        $posts = Cache::remember('posts',15,function(){
            return Post::all();
        });
        // Cache::add('posts',$posts);
        // Cache::flush();
        // dd( Cache::get('posts'));
        return view('welcome',['posts'=>$posts]);  
    }
    public function sendMail(){
        $data = ['title'=>'sendemail','date'=>'30-8-2022'];
        Mail::to('himdrakibulislam$gmail.com')->send(new postMail($data));
        return 'sent';
    }
}

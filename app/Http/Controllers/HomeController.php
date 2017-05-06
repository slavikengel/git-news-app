<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\News;
use Auth;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        dd(User::first()->roles()->count());

//        $user = Auth::user();
////       $user = User::find();
//        $admin = Role::where('slug','admin')->first();
//        $user->roles()->save($admin);
//        $user = $user->fresh();
//        $admin = $admin->fresh();
//        $admin->users;
//        $user->news()->create([
//            'title' => 'Hello world!',
//            'content' => '# Hello world content!!!',
//        ]);
//        News::first()->user(); // тут будет User к которому добавили новость
//        return view('home');

        //dd(User::find(2)->roles);



//        $user = User::first();
//        $roleUser = Role::where('slug', 'user')->first();
//        $user->roles()->save($roleUser);

//        $user = User::first();
//        $user->news()->create([
//            'title' => 'Hello world!',
//            'content' => '# Hello world content!!!',
//        ]);

    }
}

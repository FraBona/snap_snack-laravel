<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        //$currentRestaurant = Restaurant::table('restaurants')->where('user_id');
        //$restaurants = Restaurant::all();
        $user = Auth::user()->id;
        $restaurant = Restaurant::where('user_id', '=', $user)->first();
      /*  $exist = false;
        foreach($restaurants as $restaurant){
            if(($restaurant->user_id === $user)){
                $exist = true;
            }
        }*/
        
        return view('admin.dashboard',compact('user','restaurant'));
    }
    
}

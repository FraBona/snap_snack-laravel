<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class StatsController extends Controller
{
    public function index(){

        $user = Auth::user()->id;
        $restaurant = Restaurant::where('user_id', '=', $user)->first();
        if ($restaurant) {
            // Calcola il conteggio degli ordini per ciascun mese di tutti gli anni
            $startYear = 2020; // Anno di inizio
            $endYear = Carbon::now()->year; // Anno corrente
        
            for ($year = $startYear; $year <= $endYear; $year++) {
                for ($month = 1; $month <= 12; $month++) {
                    $startOfMonth = Carbon::create($year, $month, 1)->startOfMonth();
                    $endOfMonth = Carbon::create($year, $month, 1)->endOfMonth();
        
                    // Conta gli ordini del ristorante nell'intervallo di tempo specificato
                    $orderCount = Order::where('restaurant_id', $restaurant->id)
                                       ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
                                       ->count();
        
                    // Aggiungi il conteggio degli ordini all'array associativo
                    $orderCountsByMonth["$year-$month"] = $orderCount;
                }
            }
        }
        return view('admin.stats.index', compact('orderCountsByMonth'));
    }

}

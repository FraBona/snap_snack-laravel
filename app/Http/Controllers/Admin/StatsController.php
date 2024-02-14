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
    // Inizializza l'array per contenere i dati dell'ordine e l'ammontare delle vendite
    $ordersData = [];

    // Calcola il conteggio degli ordini per ciascun mese di tutti gli anni
    $startYear = 2023; // Anno di inizio
    $endYear = Carbon::now()->year; // Anno corrente

    for ($year = $startYear; $year <= $endYear; $year++) {
        for ($month = 1; $month <= 12; $month++) {
            $startOfMonth = Carbon::create($year, $month, 1)->startOfMonth();
            $endOfMonth = Carbon::create($year, $month, 1)->endOfMonth();
    
            // Ottieni gli ordini del ristorante nell'intervallo di tempo specificato
            $orders = Order::where('restaurant_id', $restaurant->id)
                           ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
                           ->get();
            
            // Inizializza il conteggio degli ordini e l'ammontare delle vendite per questo mese
            $orderCount = 0;
            $totalSalesAmount = 0;

            // Calcola il conteggio degli ordini e l'ammontare delle vendite per questo mese
            foreach ($orders as $order) {
                $orderCount++;
                $totalSalesAmount += $order->amount;
            }

            // Aggiungi i dati dell'ordine e l'ammontare delle vendite all'array associativo
            $ordersData["$year-$month"] = [
                'orderCount' => $orderCount,
                'totalSalesAmount' => $totalSalesAmount
            ];
        }
    }
}
        return view('admin.stats.index', compact('orderCount','totalSalesAmount','ordersData'));
    }

}

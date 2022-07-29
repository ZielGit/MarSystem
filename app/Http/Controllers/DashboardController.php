<?php

namespace App\Http\Controllers;

use App\Models\Gathering;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dailyGatherings = Gathering::where('created_at', '>=', Carbon::now()->subDays(30))
            ->selectRaw('DATE_FORMAT(created_at, "%d/%m/%Y") as day')
            ->selectRaw('sum(overall_weight) as total')
            ->groupBy('day')
            ->get();
        
        return view('dashboard', compact('dailyGatherings'));
    }
}

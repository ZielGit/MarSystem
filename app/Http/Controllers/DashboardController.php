<?php

namespace App\Http\Controllers;

use App\Models\Gathering;
use App\Models\Release;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $gatheringCarton = Gathering::whereDate('created_at', '=', Carbon::now())->sum('carton_weight');
        $gatheringPlastic = Gathering::whereDate('created_at', '=', Carbon::now())->sum('plastic_weight');

        $dailyReleases = Release::where('created_at', '>=', Carbon::now()->subDays(30))
            ->selectRaw('DATE_FORMAT(created_at, "%d/%m/%Y") as day')
            ->selectRaw('sum(quantity_released) as total')
            ->groupBy('day')
            ->get();

        $dailyGatherings = Gathering::where('created_at', '>=', Carbon::now()->subDays(30))
            ->selectRaw('DATE_FORMAT(created_at, "%d/%m/%Y") as day')
            ->selectRaw('sum(overall_weight) as total')
            ->groupBy('day')
            ->get();
        
        return view('dashboard', compact('gatheringCarton', 'gatheringPlastic', 'dailyGatherings', 'dailyReleases'));
    }
}

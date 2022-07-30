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
        
        return view('dashboard', compact('dailyGatherings', 'dailyReleases'));
    }
}

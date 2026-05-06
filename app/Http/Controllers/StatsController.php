<?php

namespace App\Http\Controllers;

use App\Models\Visit;

class StatsController extends Controller
{
    public function index()
    {
        $visitsPerHour = Visit::selectRaw('hour, COUNT(*) as count')
            ->where('hour', '>=', now()->subDay())
            ->groupBy('hour')
            ->orderBy('hour', 'asc')
            ->get();

        $cityStats = Visit::selectRaw('city, COUNT(*) as count')
            ->groupBy('city')
            ->orderBy('count', 'desc')
            ->get();

        return view('dashboard', compact('visitsPerHour', 'cityStats'));
    }
}

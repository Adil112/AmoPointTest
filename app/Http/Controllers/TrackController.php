<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TrackController extends Controller
{
    public function store(Request $request)
    {
        $ip = $request->ip();
        $geo = Http::get("http://ip-api.com/json/{$ip}")->json();
        $hour = now()->startOfHour();

        Visit::updateOrCreate(
            [
                'ip' => $ip,
                'hour' => $hour
            ],
            [
                'city' => $geo['city'] ?? null,
                'url' => $request->url,
                'user_agent' => $request->user_agent,
                'device' => $this->parseDevice($request->user_agent),
            ]
        );

        return response()->json(['status' => 'ok']);
    }

    private function parseDevice($ua)
    {
        if (str_contains($ua, 'Mobile')) return 'mobile';
        if (str_contains($ua, 'Tablet')) return 'tablet';
        return 'desktop';
    }
}

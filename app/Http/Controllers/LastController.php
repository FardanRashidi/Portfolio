<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LastController extends Controller
{
    public function index()
    {
        return view('lastfm');
    }

    public function getTopTracks(Request $request)
    {
        $user = $request->input('user');
        $period = $request->input('period', 'overall');
        $limit = $request->input('limit', 10);

        $apiKey = '017a47e13e97a50f04dd755b028d823b';

        $response = Http::get("http://ws.audioscrobbler.com/2.0/", [
            'method' => 'user.getTopTracks',
            'user' => $user,
            'period' => $period,
            'limit' => $limit,
            'api_key' => $apiKey,
            'format' => 'json',
        ]);

        $topTracks = $response->json()['toptracks']['track'];

        return response()->json(compact('topTracks', 'user'));
    }

    public function getWeeklyTrackChart(Request $request)
    {
        $apiKey = config('lastfm.api_key'); 
        $username = $request->input('username');
        $from = $request->input('from'); // Unix timestamp of start date
        $to = $request->input('to'); // Unix timestamp of end date

        $response = Http::get('http://ws.audioscrobbler.com/2.0/', [
            'method' => 'user.getweeklytrackchart',
            'user' => $username,
            'from' => $from,
            'to' => $to,
            'api_key' => $apiKey,
            'format' => 'json',
        ]);

        $data = $response->json();

        // You can process the $data array here and return the desired output
        return response()->json($data);
    }
}

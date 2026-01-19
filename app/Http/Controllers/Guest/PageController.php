<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Train;
use Illuminate\Http\Request;
/* non so cos'è carbon mi devo informare */
use Carbon\Carbon;

class PageController extends Controller
{
    public function index()
    {
        $today = today();
        $todayFormatted = $today->format("d-m-Y");
        // dd($todayFormatted);
        $trains = Train::where("departure_time", ">", today())
            ->orderBy("departure_time", "asc") /* crescente -> asc ---- decrescente -> desc */
            ->get();
        // dd($trains);

        return view("index", compact("trains", "todayFormatted"));
    }
}

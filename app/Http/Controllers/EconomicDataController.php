<?php

namespace App\Http\Controllers;

use App\Http\Resources\EconomicDataResource;
use App\Models\EconomicData;
use Illuminate\Http\Request;

class EconomicDataController extends Controller
{
    public function fetchEconomicData(Request $request)
    {
        // Get the value of the "name" query parameter
        $name = $request->query('name', 'Inflation');

        // Fetch data from the economic_data table where infoType is equal to $name
        $statistics = EconomicData::where('infoType', $name)
            ->orderBy('date', 'asc')
            ->get();

        // Transform the data using EconomicDataResource
        $economicDataResource = EconomicDataResource::collection($statistics);

        return response()->json(['name' => $name, 'statistics' => $economicDataResource]);
    }
}

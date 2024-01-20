<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatisticsRequest;
use App\Http\Resources\StatisticsResource;
use App\Models\Statistics;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index()
    {
        $stats = Statistics::take(100)->get();

        return response()->json($stats, 200);
    }

    public function fetchStatisticsByRegion($region)
    {
        if ($region === 'null') {
            // Fetch statistics with null region_id
            $statsWithoutRegion = Statistics::whereNull('region_id')
                ->selectRaw("DATE_FORMAT(created_date, '%Y-%m-%d') as date, ROUND(AVG(average)) as average")
                ->groupBy('date')
                ->havingRaw('ROUND(AVG(average)) >= 2000')
                ->orderBy('date', 'asc')
                ->get();

            return response()->json(StatisticsResource::collection($statsWithoutRegion), 200);
        } else {
            // Fetch statistics with the specified region_id
            $statsWithRegion = Statistics::where('region_id', $region)
                ->selectRaw("DATE_FORMAT(created_date, '%Y-%m-%d') as date, ROUND(AVG(average)) as average")
                ->groupBy('date')
                ->orderBy('date', 'asc')
                ->get();

            return response()->json(StatisticsResource::collection($statsWithRegion), 200);
        }
    }


    public function fetchStatisticsByMark($mark)
    {

        if ($mark === 'null') {
            // Fetch statistics with null region_id
            $statsWithoutRegion = Statistics::whereNull('mark_id')
                ->selectRaw("DATE_FORMAT(created_date, '%Y-%m-%d') as date, ROUND(AVG(average)) as average")
                ->groupBy('date')
                ->havingRaw('ROUND(AVG(average)) >= 2000')
                ->orderBy('date', 'asc')
                ->get();

            return response()->json(StatisticsResource::collection($statsWithoutRegion), 200);
        } else {
            // Fetch statistics with the specified region_id
            $statsWithRegion = Statistics::where('region_id', $mark)
                ->selectRaw("DATE_FORMAT(created_date, '%Y-%m-%d') as date, ROUND(AVG(average)) as average")
                ->groupBy('date')
                ->orderBy('date', 'asc')
                ->get();

            return response()->json(StatisticsResource::collection($statsWithRegion), 200);
        }
    }

    public function fetchStatisticsByChildDistrict($childDistrictId)
    {
        if ($childDistrictId === 'null') {
            // Fetch statistics with null region_id
            $statsWithoutRegion = Statistics::whereNull('childdistrictid')
                ->selectRaw("DATE_FORMAT(created_date, '%Y-%m-%d') as date, ROUND(AVG(average)) as average")
                ->groupBy('date')
                ->havingRaw('ROUND(AVG(average)) >= 2000')
                ->orderBy('date', 'asc')
                ->get();

            return response()->json(StatisticsResource::collection($statsWithoutRegion), 200);
        } else {
            // Fetch statistics with the specified region_id
            $statsWithRegion = Statistics::where('childdistrictid', $childDistrictId)
                ->selectRaw("DATE_FORMAT(created_date, '%Y-%m-%d') as date, ROUND(AVG(average)) as average")
                ->groupBy('date')
                ->orderBy('date', 'asc')
                ->get();

            return response()->json(StatisticsResource::collection($statsWithRegion), 200);
        }
    }


}

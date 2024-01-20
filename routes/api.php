<?php

use App\Http\Controllers\StatisticsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/statistics', [StatisticsController::class, 'index']);
Route::get('/statistics/region/{region}', [StatisticsController::class, 'fetchStatisticsByRegion']);
Route::get('/statistics/mark/{mark}', [StatisticsController::class, 'fetchStatisticsByMark']);
Route::get('/statistics/child-district/{child}', [StatisticsController::class, 'fetchStatisticsByChildDistrict']);


Route::get('/economic-data', [\App\Http\Controllers\EconomicDataController::class, 'fetchEconomicData']);

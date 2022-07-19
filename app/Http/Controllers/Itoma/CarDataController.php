<?php

namespace App\Http\Controllers\Itoma;

use App\Http\Controllers\Controller;
use App\Http\Requests\Itoma\jsonCarsRequest;
use App\Http\Resources\Itoma\jsonCarsResource;
use App\Http\Resources\Itoma\jsonCarsResourceCollection;
use App\Models\Itoma\Car;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CarDataController extends Controller
{
    public function jsonCars(jsonCarsRequest $request) {
        if($request->query('date')) {
            $dateFilter = Carbon::create($request->query('date'))->format('Y-m-d');
        } else {
            $dateFilter = Carbon::now()->format('Y-m-d');
        }
        return new jsonCarsResourceCollection(Car::paginate(30), $dateFilter);
    }
}

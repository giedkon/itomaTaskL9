<?php

namespace App\Http\Controllers\Itoma;

use App\Http\Controllers\Controller;
use App\Http\Requests\Itoma\jsonCarsRequest;
use App\Http\Resources\Itoma\jsonCarsResource;
use App\Http\Resources\Itoma\jsonCarsResourceCollection;
use App\Models\Itoma\Car;
use Carbon\Carbon;
use Illuminate\Http\Request;

/**
 *  Controller for the car API call
 */
class CarDataController extends Controller
{
    /**
     * @param jsonCarsRequest $request request containing validation for date & page
     * 
     * @return jsonCarsResourceCollection formatted Car json resource with additional information
     */
    public function jsonCars(jsonCarsRequest $request) {
        // Get date from query, if it doesn't exist assign today
        if($request->query('date')) {
            $dateFilter = Carbon::create($request->query('date'))->format('Y-m-d');
        } else {
            $dateFilter = Carbon::now()->format('Y-m-d');
        }
        // Return a JSON resource of all cars with management & status filtered by dateFilter
        return new jsonCarsResourceCollection(Car::paginate(30), $dateFilter);
    }
}

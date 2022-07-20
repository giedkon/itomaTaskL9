<?php

namespace App\Http\Resources\Itoma;

use Illuminate\Http\Resources\Json\ResourceCollection;

class jsonCarsResourceCollection extends ResourceCollection
{

    /**
     * @var date $dateFilter filter to use in Car status and management relationships
     */
    private $dateFilter;

    /**
     * Create a new resource instance.
     *
     * @param  mixed  $resource
     * @return void
     */
    public function __construct($resource, $dateFilter)
    {
        // Initiliaze the ResourceCollection
        parent::__construct($resource);
        $this->resource = $resource;

        // Assign $dateFilter a value
        $this->dateFilter = $dateFilter;
    }
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // Map all the Car Resources into a collection and provide them with the $dateFilter
        return $this->collection->map(function(jsonCarsResource $resource) use($request){
            return $resource->dateFilter($this->dateFilter)->toArray($request);
        })->all();
    }
}

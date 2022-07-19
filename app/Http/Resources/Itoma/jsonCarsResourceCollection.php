<?php

namespace App\Http\Resources\Itoma;

use Illuminate\Http\Resources\Json\ResourceCollection;

class jsonCarsResourceCollection extends ResourceCollection
{

    /**
     * @var
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
        // Ensure you call the parent constructor
        parent::__construct($resource);
        $this->resource = $resource;

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
        return $this->collection->map(function(jsonCarsResource $resource) use($request){
            return $resource->dateFilter($this->dateFilter)->toArray($request);
        })->all();
    }
}

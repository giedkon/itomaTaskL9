<?php

namespace App\Http\Resources\Itoma;

use App\Models\Itoma\CarStatus;
use App\Models\Itoma\Department;
use App\Models\Itoma\Status;
use App\Models\Itoma\User;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class jsonCarsResource extends JsonResource
{
    /**
     * @var
     */
    protected $dateFilter;

    public function dateFilter($value){
        $this->dateFilter = $value;
        return $this;
    }
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $management = $this->carManagementByDate($this->dateFilter);

        if (isset($management->department_id)) {
            $mkey = 'departments';
            $mvalue = new jsonDepartmentResource(Department::find($management->department_id));
        } else {
            $mkey = 'users';
            $mvalue = new jsonUserResource(User::find($management->user_id));
        }

        $status = $this->carStatusByDate($this->dateFilter);
        $svalue = new jsonCarStatusResource(Status::find($status->status_id));

        $pManagement = $this->carPreviousManagementByDate($this->dateFilter);

        if (isset($pManagement->department_id)) {
            $pmkey = 'previous_departments';
            $pmvalue = new jsonDepartmentResource(Department::find($pManagement->department_id));
        } else {
            $pmkey = 'previous_users';
            $pmvalue = new jsonUserResource(User::find($pManagement->user_id));
        }


        return [
            'cars' => [
                'number' => $this->number,
                'year_made' => $this->year_made,
                'model' => $this->model,
            ],
            $mkey => $mvalue,
            'car_status' => $svalue['name'],
            $pmkey => $pmvalue
        ];
    }
}

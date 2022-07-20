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
     * @var date $dateFilter filter to use in Car status and management relationships
     */
    protected $dateFilter;

    /**
     * @param date $value provided $dateFilter from ResourceCollection
     * 
     * @return JsonResource resource with assigned $dateFilter 
     */
    public function dateFilter($value)
    {
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
        // Get CarManagement model for this date
        // then add a department or user name to the jsonResource
        $management = $this->carManagementByDate($this->dateFilter);
        if (isset($management->department_id)) {
            $mkey = 'departments';
            $mvalue = new jsonDepartmentResource(Department::find($management->department_id));
        } else {
            $mkey = 'users';
            $mvalue = new jsonUserResource(User::find($management->user_id));
        }

        // Get CarStatus model for this date
        $status = $this->carStatusByDate($this->dateFilter);
        $svalue = new jsonCarStatusResource(Status::find($status->status_id));

        // Get previous CarManagement model for this date
        // then add a department or user name to the jsonResource
        $pManagement = $this->carPreviousManagementByDate($this->dateFilter);
        if (isset($pManagement->department_id)) {
            $pmkey = 'previous_departments';
            $pmvalue = new jsonDepartmentResource(Department::find($pManagement->department_id));
        } else {
            $pmkey = 'previous_users';
            $pmvalue = new jsonUserResource(User::find($pManagement->user_id));
        }

        // Return JSON data with additional variables we found earlier
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

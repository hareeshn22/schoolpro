<?php
namespace App\Http\Resources;

use App\Models\Course;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);

        // return [
        //     'id'        => $this->id,
        //     'school'    => School::find($this->school_id)->name,
        //     'course'    => Course::find($this->course_id)->name,
        //     'fname'     => $this->first_name,
        //     'lname'     => $this->last_name,
        //     'photo'     => $this->photo,
        //     'birthdate' => $this->birthdate,
        //     'gender'    => $this->gender,
        //     'rollno'    => $this->roll_no,
        //     'address'   => $this->address,

        // ];

    }
}

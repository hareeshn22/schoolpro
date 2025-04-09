<?php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Course;
use App\Models\School;
use App\Models\Student;
use App\Models\Guardian;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

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

        return [
            'id'         => $this->id,
            'school_id'  => $this->school_id,
            'course_id' => $this->course_id,
            'course'    => Course::find($this->course_id)->name,
            'photo'     => $this->photo,
            'first_name' => $this->first_name,
            'last_name'  => $this->last_name,
            'birthdate'  => $this->birthdate,
            'gender'     => $this->gender,
            'phone'      => $this->whenLoaded('guardian',  fn () => $this->guardian->phone),
            'email'      => $this->whenLoaded('guardian',  fn () => $this->guardian->email),
            'father_name'=> $this->father_name,
            'roll_no'     => $this->roll_no,
            'address'    => $this->address,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

        ];

    }
}

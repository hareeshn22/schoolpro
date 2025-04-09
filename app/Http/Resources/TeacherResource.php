<?php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Subject;
use App\Models\School;

class TeacherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        return [
            'id'         => $this->id,
            'school_id'  => $this->school_id,
            'subject_id' => $this->subject_id,
            'subject'    => Subject::find($this->subject_id)->name,
            'first_name' => $this->first_name,
            'last_name'  => $this->last_name,
            'birthdate' => $this->birthdate,
            'gender'    => $this->gender,
            'phone'     => $this->phone,
            'email'     => $this->email,
            'username'  => $this->username,
            'address'   => $this->address,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,         

        ];

    }
}

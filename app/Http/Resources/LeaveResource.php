<?php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LeaveResource extends JsonResource
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
            'student_id' => $this->student_id,
            'teacher_id' => $this->teacher_id,
            'student'    => substr($this->student->last_name, 0, 1) . ' ' . $this->student->first_name,
            'teacher'    => substr($this->teacher->last_name, 0, 1) . ' ' . $this->teacher->first_name,
            'leavedate'  => $this->leavedate,
            'reason'     => $this->reason,
        ];

    }
}

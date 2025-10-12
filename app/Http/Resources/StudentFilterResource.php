<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Course;

class StudentFilterResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->first_name . ' ' . $this->last_name,
            'selected_today' => $this->when(isset($this->selected_today), $this->selected_today),
            'course_id' => $this->course_id,
            'course'    => Course::find($this->course_id)->name,
            'roll_no'     => $this->roll_no,
        ];

    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlayerResource extends JsonResource
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
            'id'   => $this->id,
            'student_id' => $this->student_id,
            'name' => $this->student->first_name . ' ' . $this->student->last_name,
            // add more player fields as needed
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GroupResource extends JsonResource
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
            'name' => $this->name,
            'created_by' => $this->created_by,
            'is_archived' => $this->is_archived,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            'students' => $this->students->map(function ($student) {
                return [
                    'id' => $student->id,
                    'first_name' => $student->first_name,
                    'last_name' => $student->last_name,
                    'roll_no' => $student->roll_no,
                ];
            }),
        ];

    }
}

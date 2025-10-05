<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class SportResource extends JsonResource
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
            'category' => $this->category,
            'icon_path' => $this->icon_path,

            // Registered students count
            'registered_students' => $this->students()->count(),
           // Only today's timetables
            'timetables' => $this->timetables
               
                ->map(function ($timetable) {
                    return [
                        'day'  => $timetable->day_of_week,
                        'time' => $timetable->start_time,
                    ];
                })
                ->values(),

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class SportTodayResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        $today = strtolower(Carbon::now()->format('l'));

        // Get the first matching timetable for today
        $todayTime = optional(
            $this->timetables->firstWhere('day_of_week', $today)
        )->start_time;
        // Format to AM/PM if time exists
        $formattedTime = $todayTime
            ? Carbon::createFromFormat('H:i:s', $todayTime)->format('g:i A')
            : null;


        return [
            'id' => $this->id,
            'name' => $this->name,
            'category' => $this->category,
            'icon_path' => $this->icon_path,
            'students' => $this->students->count(),
            // Single time string or null
            'today_time' => $formattedTime,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];

    }
}

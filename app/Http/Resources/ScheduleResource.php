<?php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleResource extends JsonResource
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
            'course_id'  => $this->course_id,
            'subject'    => $this->subject->name,
            'period'     => $this->period->start_time,
            'day'        => $this->day,
        ];

        // $transformed = [
        //     "id"   => 1,
        //     "day"  => "MON",
        //     "data" => [],
        // ];

        // foreach ($data as $entry) {
        //     $timing  = $entry['period'];
        //     $subject = $entry['subject'];

        //     $transformed["data"][] = [
        //         "timing"  => $timing,
        //         "subject" => $subject,
        //     ];
        // }

        // return response()->json([$transformed]);

    }
}

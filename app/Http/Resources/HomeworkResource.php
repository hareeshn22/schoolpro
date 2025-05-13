<?php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use DB;

class HomeworkResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        $data = DB::table('homework_data')->where('homework_id', $this->id)->get();
        $merged = collect($data)
            ->groupBy('course_id', 'subject_id', 'status')
            ->map(function ($group, $courseId) {
                return [
                    'course_id' => $courseId,
                    'Done'      => $group->where('status', 'done')->count(),
                    'Not Done'  => $group->where('status', 'not done')->count(),
                ];
            })
            ->values()
            ->toArray();

        return [
            'id'         => $this->id,
            'school_id'  => $this->school_id,
            'course_id'  => $this->course_id,
            'subject_id' => $this->subject_id,
            'teacher_id' => $this->teacher_id,
            'school'     => $this->school->name,
            'course'     => $this->course->name,
            'subject'    => $this->subject->name,
            'teacher'    => $this->teacher->first_name,
            'workdate'   => $this->workdate,
            'title'      => $this->title,
            'content'    => $this->content,
            // 'data'       => $merged,
        ];

    }
}

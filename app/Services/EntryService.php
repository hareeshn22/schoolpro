<?php

namespace App\Services;

use App\Models\Entry;
use App\Models\EntryPlayer;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class EntryService
{
    public function createEntry(array $data): Entry
    {
        $this->validateStudents($data['type'], $data['student_ids']);

        return DB::transaction(function () use ($data) {
            $entry = Entry::create([
                'competition_id' => $data['competition_id'],
                'school_id'      => $data['school_id'],
                'type'           => $data['type'],
                'title'          => $data['title'] ?? null,
                // 'lead_player_id' => $data['lead_player_id'] ?? null,
            ]);

            foreach ($data['student_ids'] as $studentId) {
                EntryPlayer::create([
                    'entry_id'   => $entry->id,
                    'student_id' => $studentId,
                ]);
            }

            return $entry;
        });
    }

    protected function validateStudents(string $type, array $studentIds): void
    {
        $count = count($studentIds);

        switch ($type) {
            case 'individual':
                if ($count !== 1) {
                    throw ValidationException::withMessages([
                        'student_ids' => 'Individual entry must have exactly 1 student.',
                    ]);
                }
                break;

            case 'doubles':
                if ($count !== 2) {
                    throw ValidationException::withMessages([
                        'student_ids' => 'Doubles entry must have exactly 2 students.',
                    ]);
                }
                break;

            case 'mixed':
                if ($count !== 2) {
                    throw ValidationException::withMessages([
                        'student_ids' => 'Mixed entry must have exactly 2 students (1 male, 1 female).',
                    ]);
                }
                $genders = \App\Models\Student::whereIn('id', $studentIds)->pluck('gender')->toArray();
                if (count(array_unique($genders)) !== 2) {
                    throw ValidationException::withMessages([
                        'student_ids' => 'Mixed entry must include 1 male and 1 female.',
                    ]);
                }
                break;

            case 'team':
                if ($count < 3) {
                    throw ValidationException::withMessages([
                        'student_ids' => 'Team entry must have at least 3 students.',
                    ]);
                }
                break;
        }
    }
}

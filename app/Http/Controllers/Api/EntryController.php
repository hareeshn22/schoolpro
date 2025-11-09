<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\Entry;

use App\Services\EntryService;
use App\Http\Resources\EntryResource;
use App\Models\EntryPlayer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;


class EntryController extends BaseController
{
    protected $service;

    public function __construct(EntryService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index($sid, $cid)
    {
        return EntryResource::collection(Entry::with('players')->where('school_id', '=', $sid)->where('competition_id', '=', $cid)->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // return response()->json([
        //     $request->all()
        // ]);
        // $validated = $request->validate([
        //     'competition_id' => 'required|exists:competitions,id',
        //     'school_id'      => 'required|exists:schools,id',
        //     'type'           => 'required|in:individual,doubles,mixed,team',
        //     'title'          => 'nullable|string|max:255',
        //     // 'lead_player_id' => 'nullable|exists:students,id',
        //     'student_ids'    => 'required|array|min:1',
        //     // 'student_ids.*'  => 'required|exists:students,id',
        // ]);

        // $entry = $this->service->createEntry($validated);

        // // return response()->json([
        // //     'message' => 'Entry submitted successfully',
        // //     // 'entry'   => $entry->load('players.student'),
        // // ]);
        // if ($entry) {
        //     return $this->sendResponse('Success', 'Entry submitted successfully.');
        // } else {
        //     return $this->sendError('Error.', ['error' => 'error occured']);
        // }
        try {
            if ($request->type === 'team') {
                // ✅ TEAM ENTRY VALIDATION
                $validated = $request->validate([
                    'competition_id' => 'required|exists:competitions,id',
                    'school_id'      => 'required|exists:schools,id',
                    'type'           => 'required|in:individual,doubles,mixed,team',
                    'title'          => 'required|string|max:255',
                ]);

                // Always create a new team entry
                $entry = $this->service->createTeamEntry($validated);

                return $this->sendResponse('Success', 'Team entry submitted successfully.');
            }

            if ($request->type === 'doubles') {
                // ✅ DOUBLES ENTRY VALIDATION
                $validated = $request->validate([
                    'competition_id' => 'required|exists:competitions,id',
                    'school_id'      => 'required|exists:schools,id',
                    'type'           => 'required|in:individual,doubles,mixed,team',
                    'title'          => 'required|string|max:255',
                    'student_ids'    => 'required|array|size:2', // exactly 2 players
                    'student_ids.*'  => 'required|integer|exists:students,id',
                ]);

                // Always create a new entry for doubles
                $entry = $this->service->createEntry($validated);

                foreach ($validated['student_ids'] as $studentId) {
                    EntryPlayer::create([
                        'entry_id'   => $entry->id,
                        'student_id' => $studentId,
                    ]);
                }

                return $this->sendResponse('Success', 'Doubles entry submitted successfully.');
            }

            if ($request->type === 'individual') {
                // ✅ INDIVIDUAL ENTRY VALIDATION
                $validated = $request->validate([
                    'competition_id' => 'required|exists:competitions,id',
                    'school_id'      => 'required|exists:schools,id',
                    'type'           => 'required|in:individual,doubles,mixed,team',
                    'title'          => 'nullable|string|max:255',
                    'lead_player_id' => 'required|exists:students,id',
                ]);

                // Check if entry already exists for this player
                $entry = Entry::where('competition_id', $validated['competition_id'])
                    ->where('school_id', $validated['school_id'])
                    ->where('type', 'individual')
                    ->first();

                if (!$entry) {
                    $entry = $this->service->createEntry($validated);
                }

                $exists = EntryPlayer::where('entry_id', $entry->id)
                    ->where('student_id', $validated['lead_player_id'])
                    ->exists();

                if ($exists) {
                    return $this->sendError(
                        'Error',
                        "Entry already exists for student ID {$validated['lead_player_id']} in this competition."
                    );
                }

                EntryPlayer::create([
                    'entry_id'   => $entry->id,
                    'student_id' => $validated['lead_player_id'],
                ]);

                return $this->sendResponse('Success', 'Individual entry submitted successfully.');
            }

            return $this->sendError('Error', ['error' => 'Invalid type provided']);



            // // Check if entry already exists
            // $existingEntry = Entry::where('competition_id', $validated['competition_id'])
            //     ->where('school_id', $validated['school_id'])
            //     ->where('type', $validated['type'])
            //     ->first();

            // if ($existingEntry) {
            //     if ($validated['type'] === 'team') {
            //         // Add new players to existing team entry
            //         foreach ($validated['student_ids'] as $studentId) {
            //             EntryPlayer::firstOrCreate([
            //                 'entry_id'   => $existingEntry->id,
            //                 'student_id' => $studentId,
            //             ]);
            //         }

            //         return $this->sendResponse('Success', 'Players added to existing team entry.');
            //     }

            //     return $this->sendError(
            //         'Error',
            //         'Entry already exists for this competition and school.'
            //     );
            // }


            // $entry = $this->service->createEntry($validated);

            // if ($entry) {
            //     return $this->sendResponse('Success', 'Entry submitted successfully.');
            // } else {
            //     return $this->sendError('Error.', ['error' => 'error occured']);
            // }
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors'  => $e->errors(),
            ], 422);
        }
    }
    public function teamstore(Request $request)
    {
        //  return response()->json([
        //     $request->all()
        // ]);
        $validated = $request->validate([
            'competition_id' => 'required|exists:competitions,id',
            'school_id'      => 'required|exists:schools,id',
            'type'           => 'required|string|in:team',
            'title'          => 'required|string|max:255',
            'entry_id'       => 'required|exists:entries,id',
            'student_ids'    => 'required|array|min:1',
            'student_ids.*'  => 'exists:students,id',
        ]);

        $entry = Entry::findOrFail($validated['entry_id']);

        $players    = [];
        $duplicates = [];

        foreach ($validated['student_ids'] as $studentId) {
            $alreadyExists = EntryPlayer::whereHas('entry', function ($q) use ($entry) {
                $q->where('competition_id', $entry->competition_id);
            })
                ->where('student_id', $studentId)
                ->exists();

            if ($alreadyExists) {
                $duplicates[] = $studentId;
                continue;
            }

            $players[] = EntryPlayer::create([
                'entry_id'   => $entry->id,
                'student_id' => $studentId,
            ]);
        }

        // Response handling
        if (!empty($players)) {
            // Some new players were added
            $msg = 'Entry Players added successfully.';
            if (!empty($duplicates)) {
                $msg .= ' However, these players were already registered: ' . implode(',', $duplicates);
            }
            return $this->sendResponse('Success', $msg);
        } elseif (!empty($duplicates)) {
            // Only duplicates found, no new players added
            return $this->sendResponse('Info', 'No new players added. All submitted players were already registered.');
        } else {
            // Shouldn’t normally happen, but safe fallback
            return $this->sendError('Error', 'Error occurred while saving players.');
        }
    }

    public function getTeams($sid, $cid)
    {
        return EntryResource::collection(Entry::where('school_id', '=', $sid)->where('competition_id', '=', $cid)->where('type', '=', 'team')->get());
    }

    public function getRegisteredTeams($id)
    {
        // Fetch only team-type entries for this competition
        $teams = Entry::where('competition_id', $id)
            ->where('type', '=', 'team')->get();
        // ->pluck('title', 'id'); // returns [id => title]

        // if ($teams->isEmpty()) {
        //     return $this->sendError('No teams found for this competition.');
        // }
        return $teams;

        // return $this->sendResponse($teams, 'Registered teams retrieved successfully.');
    }

    // Fetch players for individual and doubles entries
    public function fetchIDPlayers($cid, $type)
    {
        // $validated = $request->validate([
        //     'competition_id' => 'required|exists:competitions,id',
        //     'type'           => 'required|string|in:individual,doubles',
        // ]);

        $entries = Entry::with(['players.student', 'competition'])
            ->where('competition_id', $cid)
            ->where('type', $type)
            ->get();

        $players = $entries->flatMap(function ($entry) {
            return $entry->players->map(function ($player) use ($entry) {
                return [
                    'entry_id'      => $entry->id,
                    'entry_title'   => $entry->title,
                    'competition'   => $entry->competition->event_name ?? null,

                    'student_id'    => $player->student_id,
                    'student_name'  => $player->student->full_name ?? null,
                ];
            });
        });

        return response()->json([
            'data'    => $players,
            'message' => 'Players fetched successfully for type: ' . $type,
        ], 200);
    }

    // Fetch Team Players
    public function fetchTeamPlayers($eid)
    {
        // $validated = $request->validate([
        //     'entry_id' => 'required|exists:entries,id',
        // ]);

        $entry = Entry::with(['players.student', 'competition'])
            ->findOrFail($eid);

        $players = $entry->players->map(function ($player) use ($entry) {
            return [
                'entry_id'      => $entry->id,
                'entry_title'   => $entry->title,
                'competition'   => $entry->competition->event_name ?? null,
                'student_id'    => $player->student_id,
                'student_name'  => $player->student->full_name ?? null,
            ];
        });

        return response()->json([
            'data'    => $players,
            'message' => 'Team players fetched successfully for entry: ' . $entry->title,
        ], 200);
    }


    /**
     * Display the specified resource.
     */
    public function show(Entry $entry)
    {
        //
    }


    public function removePlayer(Request $request)
    {
        $validated = $request->validate([
            'entry_id'   => 'required|exists:entries,id',
            'student_id' => 'required|exists:students,id',
        ]);
        $entry = Entry::find($validated['entry_id']);
        // Handle based on entry type
        switch ($entry->type) {
            case 'doubles':
                // In doubles, remove the entire entry (since it's tied to a pair/team name)
                $entry->players()->delete(); // remove all players
                $entry->delete();            // remove the entry itself

                return $this->sendResponse('Success', 'Doubles entry removed completely.');

            case 'team':
            case 'individual':
                // Remove only the specific player
                $player = EntryPlayer::where('entry_id', $entry->id)
                    ->where('student_id', $validated['student_id'])
                    ->first();

                if (!$player) {
                    return $this->sendError('Error', 'Player not found in this entry.');
                }

                $player->delete();

                return $this->sendResponse('Success', 'Player removed from entry successfully.');

            default:
                return $this->sendError('Error', 'Unsupported entry type.');
        }


        // // Find the player record for this entry
        // $player = EntryPlayer::where('entry_id', $validated['entry_id'])
        //     ->where('student_id', $validated['student_id'])
        //     ->first();

        // if (!$player) {
        //     return $this->sendError('Error', 'Player not found in this entry.');
        // }

        // $player->delete();

        // return $this->sendResponse('Success', 'Player removed from entry successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entry $entry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Entry $entry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entry $entry)
    {
        //
    }
}

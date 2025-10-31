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
            $validated = $request->validate([
                'competition_id' => 'required|exists:competitions,id',
                'school_id'      => 'required|exists:schools,id',
                'type'           => 'required|in:individual,doubles,mixed,team',
                'title'          => 'nullable|string|max:255',
                'lead_player_id' => 'nullable|exists:students,id',
                'student_ids'    => 'required|array|min:1',
                'student_ids.*'  => 'required|integer|exists:students,id',
            ]);
            // Check if entry already exists
            $existingEntry = Entry::where('competition_id', $validated['competition_id'])
                ->where('school_id', $validated['school_id'])
                ->where('type', $validated['type'])
                ->first();

            if ($existingEntry) {
                if ($validated['type'] === 'team') {
                    // Add new players to existing team entry
                    foreach ($validated['student_ids'] as $studentId) {
                        EntryPlayer::firstOrCreate([
                            'entry_id'   => $existingEntry->id,
                            'student_id' => $studentId,
                        ]);
                    }

                    return $this->sendResponse('Success', 'Players added to existing team entry.');
                }

                return $this->sendError('Error', [
                    'error' => 'Entry already exists for this competition and school.'
                ]);
            }


            $entry = $this->service->createEntry($validated);

            if ($entry) {
                return $this->sendResponse('Success', 'Entry submitted successfully.');
            } else {
                return $this->sendError('Error.', ['error' => 'error occured']);
            }
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors'  => $e->errors(),
            ], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Entry $entry)
    {
        //
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

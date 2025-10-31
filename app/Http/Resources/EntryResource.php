<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EntryResource extends JsonResource
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
            'id'      => $this->id,
            'competition_id'=> $this->competition_id,
            'school_id' => $this->school_id,
            'type' => $this->type,        // individual, doubles, mixed, team
            'title'  => $this->title,
            // add players relationship
            'players' => PlayerResource::collection($this->whenLoaded('players')),
        ];
    }
}

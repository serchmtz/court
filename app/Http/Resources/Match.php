<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Match extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'tournament_id' => $this->tournament_id,
            'player1' => $this->player1,
            'player2' => $this->player2,
            'winner_id' => $this->winner_id,
            'round' => $this->round,
            'started_at' => $this->started_at,
            'finished_at' => $this->finished_at,
            'abandoned' => $this->abandoned,
            'excuse' => $this->excuse,
            'created_at' => $this->created_at->format('d/m/Y H:i:s'),
            'updated_at' => $this->updated_at->format('d/m/Y H:i:s'),
        ];
    }
}

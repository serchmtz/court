<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Stat extends JsonResource
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
            'acesP1' => $this->acesP1,
            'acesP2' => $this->acesP2,
            'doubleFaultP1' => $this->doubleFaultP1,
            'doubleFaultP2' => $this->doubleFaultP2,
            'firstServicePercentageP1' => $this->firstServicePercentageP1,
            'firstServicePercentageP2' => $this->firstServicePercentageP2,
            'servicePointsWonP1' => $this->servicePointsWonP1,
            'servicePointsWonP2' => $this->servicePointsWonP2,
            'tiebreaksWonP1' => $this->tiebreaksWonP1,
            'tiebreaksWonP2' => $this->tiebreaksWonP2,
            'serverGamesWonP1' => $this->serverGamesWonP1,
            'serverGamesWonP2' => $this->serverGamesWonP2,
        ];
    }
}

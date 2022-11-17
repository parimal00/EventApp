<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Route;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => (Route::currentRouteName() == "events.index" && strlen($this->description) > 27) ?  substr($this->description, 0, 27) . "..." : $this->description,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'readable_start_date' => Carbon::parse($this->start_date)->diffForHumans(today()),
            'readable_end_date' => Carbon::parse($this->end_date)->diffForHumans(today())
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'client' => $this->client,
            'message' => $this->message,
            'level' => $this->level,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
        ];
    }
}

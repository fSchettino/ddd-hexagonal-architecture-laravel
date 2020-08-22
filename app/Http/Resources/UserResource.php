<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // Map Domain User model values
        return [
            'data' => [
                'name' => $this->name()->value(),
                'email' => $this->email()->value(),
                'emailVerifiedDate' => $this->emailVerifiedDate()->value(),
            ]
        ];
    }
}

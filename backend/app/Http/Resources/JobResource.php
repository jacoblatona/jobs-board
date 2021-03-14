<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JobResource extends JsonResource
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
            'job_title' => $this->job_title,
            'job_location' => $this->job_location,
            'url' => $this->url,
            'company_name' => $this->company_name,
            'company_logo' => $this->company_logo,
            'tags' => json_decode($this->tags),
            'summary' => $this->summary,
            'posted_at' => $this->created_at->diffForHumans()
        ];
    }
}

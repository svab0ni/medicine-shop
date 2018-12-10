<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MedicineResource extends JsonResource
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
            'medicine_id' => $this->id,
            'medicine_name' => $this->name,
            'medicine_slug' => $this->slug,
            'medicine_price' => $this->price,
            'medicine_section_name' => $this->section->name,
            'medicine_section_slug' => $this->section->slug,
            'medicine_company_name' => $this->company->name
        ];
    }
}

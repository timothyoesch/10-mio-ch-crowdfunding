<?php
namespace App\Filament\Resources\Donations\DonationResource\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Donation;

/**
 * @property Donation $resource
 */
class DonationTransformer extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->resource->toArray();
    }
}

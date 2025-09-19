<?php
namespace App\Filament\Resources\Supporters\SupporterResource\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Supporter;

/**
 * @property Supporter $resource
 */
class SupporterTransformer extends JsonResource
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

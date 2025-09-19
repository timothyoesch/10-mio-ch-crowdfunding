<?php
namespace App\Filament\Resources\Votes\VoteResource\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Vote;

/**
 * @property Vote $resource
 */
class VoteTransformer extends JsonResource
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

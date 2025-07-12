<?php

namespace App\Http\Resources\v1\CourseMaterial;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CourseMaterialCollection extends ResourceCollection
{
    /**
     * Summary of toArray
     * @param \Illuminate\Http\Request $request
     * @return array{items: \Illuminate\Support\Collection, pagination: array{current_page: mixed, last_page: mixed, per_page: mixed, total: mixed}}
     */
    public function toArray(Request $request): array
    {
        return [
            'items' => $this->collection,
            'pagination' => [
                'current_page' => $this->currentPage(),
                'per_page' => $this->perPage(),
                'last_page' => $this->lastPage(),
                'total' => $this->total(),
            ],
        ];
    }
}
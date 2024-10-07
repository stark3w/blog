<?php

namespace App\Services\Filter;

use App\Models\Product;

class Service
{
    public function filterFoundProducts($flavors, $grades, $brands)
    {
        return Product::query()
            ->when(is_array($flavors) && count($flavors), function ($query) use ($flavors) {
                return $query->whereIn('flavor_id', $flavors);
            })
            ->when(is_array($grades) && count($grades), function ($query) use ($grades) {
                return $query->whereIn('grade_id', $grades);
            })
            ->when(is_array($brands) && count($brands), function ($query) use ($brands) {
                return $query->whereIn('brand_id', $brands);
            })
            ->get();
    }

    public function filterCatalogProducts($flavors, $grades, $brands, $catalogId)
    {
        return Product::query()
            ->where('catalog_id', $catalogId)
            ->when(is_array($flavors) && count($flavors), function ($query) use ($flavors)
            {
                return $query->whereIn('flavor_id', $flavors);
            })
            ->when(is_array($grades) && count($grades), function ($query) use ($grades)
            {
                return $query->whereIn('grade_id', $grades);
            })
            ->when(is_array($brands) && count($brands), function ($query) use ($brands)
            {
                return $query->whereIn('brand_id', $brands);
            })
            ->get();
    }
}

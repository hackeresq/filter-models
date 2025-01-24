<?php

namespace HackerEsq\FilterModels\Traits; 

trait Filterable
{

    public function scopeFiltered($query, $filter)
    {
        $filter->query = $query;

        return $filter->apply();
    }
}
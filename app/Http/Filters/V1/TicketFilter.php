<?php

namespace App\Http\Filters\V1;

class TicketFilter extends ScopeFilter
{

    public function createdAt($value) {
        $dates = explode(',', $value);

        if (count($dates) > 1){
            return $this->builder->whereBetween('created_at', $dates);
        }

        return $this->builder->where('created_at', $value);
    }

    public function include($value)
    {
        return $this->builder->with($value);
    }

    public function status($value)
    {
        return $this->builder->whereIn('status', explode(',', $value));
    }

    public function title($value)
    {
        $like_str = str_replace("*", "%", $value);
        return $this->builder->where('title', 'like', $like_str);
    }

    public function updatedAt($value)
    {
        $dates = explode(',', $value);

        if (count($dates) > 1) {
            return $this->builder->whereBetween('updated_at', $dates);
        }

        return $this->builder->where('updated_at', $value);
    }



}

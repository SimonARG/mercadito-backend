<?php

namespace App\Pipes\Posts;

class ByCategory
{
    public function handle($query, $next)
    {
        $category = request('category');

        if($category) {
            $query->where('category_id', 'like', '%' . $category . '%');
        }

        return $next($query);
    }
}
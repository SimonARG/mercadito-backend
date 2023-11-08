<?php

namespace App\Pipes\Posts;

class ByTitle
{
    public function handle($query, $next)
    {
        $title = request('title');

        if($title) {
            $query->where('title', 'like', '%' . $title . '%');
        }

        return $next($query);
    }
}
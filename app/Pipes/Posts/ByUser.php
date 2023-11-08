<?php

namespace App\Pipes\Posts;

class ByUser
{
    public function handle($query, $next)
    {
        $user = request('user');

        if($user) {
            $query->where('user_id', 'like', '%' . $user . '%');
        }

        return $next($query);
    }
}
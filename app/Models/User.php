<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Like;
use App\Models\Post;
use App\Models\Comment;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasRoles;

    protected $guarded = [];

    public function uploads(): HasMany 
    {
        return $this->hasMany(Post::class);
    }

    public function comments(): HasMany 
    {
        return $this->hasMany(Comment::class);
    }

    public function likes(): HasMany 
    {
        return $this->hasMany(Like::class);
    }
}

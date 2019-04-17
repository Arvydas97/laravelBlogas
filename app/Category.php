<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Category extends Model
{
    protected $fillable = ['name'];

    public function category()
    {
        return $this->hasMany(Post::class);
    }
}

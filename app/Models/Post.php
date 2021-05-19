<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded;

    //user relation
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // tag relation
    public function tag()
    {
        return $this->belongsTo(Tag::class, 'tag', 'id');
    }

    //location relation
    public function location()
    {
        return $this->belongsTo(City::class, 'location', 'id');
    }
}

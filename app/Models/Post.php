<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
  use HasFactory, SoftDeletes;

  protected $guarded;

  //user relation
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  // tag relation
  public function tag()
  {
    return $this->belongsTo(Tag::class);
  }

  //location relation
  public function city()
  {
    return $this->belongsTo(City::class);
  }
}

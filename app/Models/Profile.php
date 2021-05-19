<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'user_id',  'city_id', 'phone_number', 'gender_id', 'age', 'skills',
        'language_id', 'cv', 'certificate', 'profile_picture', 'about_me'
    ];

    // protected $guarded = [];
    protected $casts = [
        'skills' => 'array',

    ];

    public function skillArray($skills)
    {
        // return $skills;
        return explode(',', $skills);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function city()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }
    public function language()
    {
        return $this->hasOne(Language::class, 'id', 'language_id');
    }

    public function gender()
    {
        return $this->hasOne(Gender::class, 'id', 'gender_id');
    }
}

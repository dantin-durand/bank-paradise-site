<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'should_be_shown',
        'title',
        'banner',
        'banner_id',
        'body',
        'user_id',
        'release_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
};

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Poll extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function options()
    {
        return $this->hasMany(PollOption::class);
    }

    public function getTotalVotesAttribute()
    {
        return $this->options->sum('votes_count');
    }
}

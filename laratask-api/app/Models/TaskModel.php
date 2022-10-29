<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class TaskModel extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'completed',
    ];

    protected $table = 'tasks';

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}

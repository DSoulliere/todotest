<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'is_complete',
    ];

    /**
     * Get The task list the task belongs to
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function taskList()
    {
        return $this->belongsTo(TaskList::class);
    }

    /**
     * Get the task's user through its list
     */
    public function carOwner()
    {
        return $this->hasOneThrough(User::class, TaskList::class);
    }
}

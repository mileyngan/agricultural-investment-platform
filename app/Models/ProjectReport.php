<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id', 
        'file',
        'name',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
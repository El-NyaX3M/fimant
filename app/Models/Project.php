<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'id_user',
        'shapes',
    ];

    public function user(){
        return $this->BelongsTo('App\Models\User');
    }
}

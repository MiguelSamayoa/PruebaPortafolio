<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalData extends Model
{
    use HasFactory;

    protected $table = 'personal_data';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'presentation',
        'description',
        'photo_url',
    ];

    // Asumiendo que un usuario puede tener varios proyectos
    public function projects()
    {
        return $this->hasMany(Project::class, 'personal_data_id');
    }
}

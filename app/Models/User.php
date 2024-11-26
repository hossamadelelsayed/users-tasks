<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class User extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];


    /**
     * Get all of the assessments for the User
     *
     * @return MorphToMany
     */
    public function assessments(): MorphToMany
    {
        return $this->morphedByMany(Assessment::class, 'task' , 'users_tasks');
    }
 
    /**
     * Get all of the surveys for the User
     * @return MorphToMany
     */
    public function surveys(): MorphToMany
    {
        return $this->morphedByMany(Survey::class, 'task' , 'users_tasks');
    }
}

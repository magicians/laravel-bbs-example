<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\User
 *
 * @property integer $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Thread[] $threads
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereUpdatedAt($value)
 */
class User extends Model
{
    const RANDOM_NAME_LENGTH = 8;

    protected $fillable = ['name'];

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function threads()
    {
        return $this->hasMany('App\Models\Thread');
    }


    public static function createRandomName()
    {
        return substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, self::RANDOM_NAME_LENGTH);
    }
}

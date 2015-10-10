<?php
/**
 * Created by PhpStorm.
 * User: bko
 * Date: 2015/10/10
 * Time: 17:01
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Thread
 *
 * @property integer $id
 * @property string $body
 * @property integer $user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Thread whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Thread whereBody($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Thread whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Thread whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Thread whereUpdatedAt($value)
 */
class Thread extends Model
{
    protected $fillable = [
        'body', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

}
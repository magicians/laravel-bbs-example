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
 * App\Models\Comment
 *
 * @property integer $id
 * @property string $body
 * @property integer $user_id
 * @property integer $thread_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\Thread $thread
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Comment whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Comment whereBody($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Comment whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Comment whereThreadId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Comment threadId($threadId)
 */
class Comment extends Model
{
    protected $fillable = [
        'body', 'user_id', 'thread_id',
    ];

    public function thread()
    {
        return $this->belongsTo('App\Models\Thread');
    }

    public function scopeThreadId($query, $threadId)
    {
        return $query->whereThreadId($threadId);
    }

}
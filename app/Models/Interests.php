<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interests extends Model
{
    use HasFactory;

    protected $fillable = [
        'user1_id',
        'user2_id',
    ];

    public $timestamps = false;

    public static function likeUser($id, $u_id)
    {
        Interests::create([
            'user1_id' => $id,
            'user2_id' => $u_id
        ])->save();
    }

    public static function pairExists($id, $u_id)
    {
        $chatExists = false;
        $count = Interests::where(function (Builder $query) use ($id) {
                return $query->where('user1_id', $id)
                    ->orWhere('user2_id', $id);
            })
            ->where(function (Builder $query) use ($u_id) {
                return $query->where('user1_id', $u_id)
                    ->orWhere('user2_id', $u_id);
            })
            ->count();
        if ($count > 1) {
            $chatExists = true;
        }
        return $chatExists;
    }
}

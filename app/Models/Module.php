<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="Module",
 *     title="Module",
 *     description="Model Module",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="title", type="string", example="Managing Stress"),
 *     @OA\Property(property="description", type="string", example="Learn how to manage stress effectively"),
 *     @OA\Property(property="created_at", type="string", format="date-time"),
 *     @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 */
class Module extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description'];

    public function sessions()
    {
        return $this->hasMany(Session::class);
    }
}

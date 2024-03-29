<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes; 
 use Illuminate\Database\Eloquent\Factories\HasFactory;
class Post extends Model
{
     use SoftDeletes;    
     use HasFactory;    
     public $table = 'posts';

    public $fillable = [
        'id',
        'title',
        'description',
        'contact_phone_number',
        'user_id',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'title' => 'string',
        'description' => 'string',
        'contact_phone_number' => 'string',
        'user_id' => 'integer'
    ];

    public static array $rules = [
        'title' => 'required',
        'description' => 'required|string|max:2048', // Limit description to 2 KB (2048 bytes)
        'user_id' => 'required'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
}

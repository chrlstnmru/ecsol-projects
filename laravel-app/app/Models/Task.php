<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model {
  protected $fillable = ['title', 'completed', 'user_id'];

  protected $casts = ['completed' => 'boolean'];

  /** @use HasFactory<\Database\Factories\TaskFactory> */
  use HasFactory;
}

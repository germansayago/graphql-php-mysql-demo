<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model {
  protected $table = 'addresses';
  public $timestamps = false;

  protected $fillable = ['user_id', 'name', 'description'];

  public function addresses() {
    return $this->belongsTo(User::class);
  }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Task extends Model
{
    //
    protected $fillable = ['user_id','admin_id','body', 'complete'];
    public function user() {
        return $this->belongsTo(User::class);
    }
}

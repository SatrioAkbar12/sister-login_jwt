<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersObjekPbb extends Model {

    protected $table = 'users_objek_pbb';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'objek_pbb_id'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function objekPbb() {
        return $this->belongsTo(ObjekPbb::class, 'objek_pbb_id', 'id');
    }
}

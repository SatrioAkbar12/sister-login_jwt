<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObjekPbb extends Model {

    protected $table = 'objek_pbb';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nop_pbb',
        'nama',
        'alamat',
        'kabupaten',
        'kecamatan',
        'desa',
        'rw',
        'rt',
    ];

    public function dataPbb () {
        return $this->hasMany(DataPbb::class, 'objek_pbb_id', 'id');
    }

    public function usersObjekPbb() {
        return $this->hasMany(UsersObjekPbb::class, 'objek_pbb_id', 'id');
    }
}

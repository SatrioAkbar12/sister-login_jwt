<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataPbb extends Model {

    protected $table = 'data_pbb';

    protected $primaryKey = 'id';

    protected $fillable = [
        'tahun',
        'pajak',
        'denda',
        'objek_pbb_id'
    ];

    public function objekPbb () {
        return $this->belongsTo(ObjekPbb::class, 'objek_pbb_id', 'id');
    }
}

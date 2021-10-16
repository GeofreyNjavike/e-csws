<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{

    public function setOptionsAttribute($user_id, $role_id)
    {
        $this->attributes['user_id'] = json_encode($user_id);
        $this->attributes['role-id'] = json_encode($role_id);
    }

    use HasFactory;
    protected $table = 'files';
    protected $fillable = [
        'filename',
        'fileobjective',
        'user_id',
        'role_id',
        'toPmu',
        'paymentstatus',
        'toAccountants'
    ];
}

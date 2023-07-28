<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Provider extends Model
{
    use HasFactory;
    protected $fillable = [
        'provider_name', 'url'
    ];

    public function getURL($id){
        return Provider::select('provider_name','url')->where('id',$id)->first();
    }
}

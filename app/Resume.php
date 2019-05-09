<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $guarded = ['id'];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function cv(){

        return config('filesystems.disks.s3.url').'/'.$this->document;

    }
}

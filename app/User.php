<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'account_type', 'picture'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function avatar(){
        if(is_null($this->picture)){
            return "https://www.gravatar.com/avatar/". md5($this->email)."?d=mm";
        }
        return $this->picture;

    }

    public function resume()
    {
        return $this->hasOne(Resume::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function jobs(){
        return $this->hasMany(Job::class);
    }
}

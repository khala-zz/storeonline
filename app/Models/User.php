<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this -> belongsToMany(Role::class,'role_user','user_id','role_id');
        
    }

    public function checkPermissionAccess($permissionCheck)
    {
        // lay tat ca quyen cua user dang login
        $roles = Auth() -> user() -> roles;
        //dd($roles);
        foreach($roles as $role)
        {
            $permissions = $role -> permissions;
            //kiem tra gia tri route truyen vao co nam trong permission cho phep ko
            if($permissions -> contains('key_code',$permissionCheck))
            {
                return true;
            }
        }

        return false;
    }

    //relation with order
    public function orders()
    {
        return $this -> hasMany(Order::class,'user_id');
    }
}

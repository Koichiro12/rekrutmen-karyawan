<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $_primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_image',
        'user_phone',
        'username',
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public static function insertData($request, $exception = []){
        $exception = array_merge($exception, ['_token', '_method']);
        $data = $request->except($exception);
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['password'] = Hash::make($data['password']);
        if(!isset($data['role'])) $data['role'] = 'User'; 
        if(!isset($data['user_image'])) $data['user_image'] = '-'; 
        if(!isset($data['user_phone'])) $data['user_phone'] = '-'; 
        return self::insert($data);
    }
    public static function updateData($id,$request,$exception = []){
        $exception = array_merge($exception, ['_token', '_method']);
        $data = $request->except($exception);
        $data['password'] = Hash::make($data['password']);
        $data['updated_at'] = date('Y-m-d H:i:s');
        return self::where('id',$id)->update($data);
    }
    public static function deleteData($id){
        return self::where('id',$id)->delete();
    }

}

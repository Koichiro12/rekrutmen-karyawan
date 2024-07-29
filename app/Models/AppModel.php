<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Schema;
class AppModel extends Model
{
    protected $fillable = [];
    protected static $_uniqueKey = [];
    protected static $_primaryKey = 'id';
    protected $table = '';



    public static function getCount(){
        return self::count();
    }

    public static function getData($id){
        return self::where(static::$_primaryKey,$id)->first();
    }
    public static function insertData($request, $exception = [],$kode = null,$withUserId = false){
        
        $exception = array_merge($exception, ['_token', '_method']);
        $data = $request->except($exception);
        $data['created_at'] = date('Y-m-d H:i:s');
       
        if(Auth::check() && $withUserId){
            $data['user_id'] = auth()->user()->id;
        }
        if($kode != null){
            $data[$kode] = self::getKode();
        }
        return self::insert($data);
    }

    public static function updateData($id,$request,$exception = []){
        $exception = array_merge($exception, ['_token', '_method']);
        $data = $request->except($exception);
        $data['updated_at'] = date('Y-m-d H:i:s');
        return self::where(static::$_primaryKey,$id)->update($data);
    }

    public static function deleteData($id){
        return self::where(static::$_primaryKey,$id)->delete();
    }
    public static function getKode(){
        $tanggal = date('dmyHis');
        $dataCount = self::count();
        $kode = '#'.$tanggal.$dataCount;
        return $kode;
    }
}

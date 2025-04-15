<?php

 namespace App\Models;

 use Illuminate\Database\Eloquent\Factories\HasFactory;
 use Illuminate\Database\Eloquent\Model;
 use Illuminate\Support\Facades\Hash;

 class Acesso extends Model
 {
     use HasFactory;

     protected $table = "acesso";

     protected $fillable = [
         'id',
         'login',
         'password'
     ];

     public function setPasswordAttribute($string) : void
     {
         $this->attributes['password'] = Hash::make($string);
     }

     public function attempt($string) : bool
     {
         return Hash::check($string, $this->password);
     }
 }

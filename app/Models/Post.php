<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class Post 
{
    static function find($varParm){ 
        if (!file_exists($path=resource_path("posts/{$varParm}.html")))
        {
            return "Haithem";
        }
        
             return cache()->remember("post.{$varParm}",5,function() use ($path){
                var_dump("file_get content");
               return file_get_contents($path); 
            });

    }
    public static function all(){
        $files =  File::files(resource_path("posts/"));
        // $myFiles="";
        // for ($i=0; $i<count($files);$i++){
        //     $myFiles .=$files[$i]->getContents();
        // }
        // return $myFiles;
        return array_map(fn($file)=> file_get_contents($file),$files);
    }
}
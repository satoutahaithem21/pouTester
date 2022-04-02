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
    public $title;
    public $excerpt;  
    public $date;  
    public $body; 
   public function __construct($title,$excerpt,$date,$body){
       $this->title=$title;
       $this->excerpt=$excerpt;
       $this->date=$date; 
       $this->body=$body;
   }

    static function find($varParm){ 
        if (!file_exists($path=resource_path("posts/{$varParm}.html")))
        {
            return "Haithem";
        }
        
             return cache()->remember("post.{$varParm}",5,function() use ($path){
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
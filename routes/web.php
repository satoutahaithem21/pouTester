<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Spatie\YamlFrontMatter\YamlFrontMatter;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/{funcParam}', function ($parm) {
//     $path=__DIR__ . "/../resources/posts/{$parm}.html";
//     ddd($path);
//     if (!file_exists($path)){
//         return redirect('/');
//     }

//     $varWelcome=file_get_contents($path);
//     cache()::remember("funcPram.{$parm}",5,function(){
//         return file_get_contents($path);
//     });
//    return view("p",
//    ['varP'=>$varWelcome]
// );
// })->where('funcParam',);

Route::get('/', function () { 
   $files =  File::files(resource_path("posts/"));
   $posts=[];
   foreach ($files as $file){ 
      $document=YamlFrontMatter::parseFile($file);
      $posts[] = new Post(
         $document->title,
         $document->excerpt,
         $document->date,
         $document->body(),
      );
   }
   return view('welcome',['posts'=>$posts]);
});
Route::get("/post/{varParm}", function ($varParm) {
    return view('post',
    ['varRoute'=>Post::find($varParm) 
 ]// varRoute  to pass ver post.blade.php
 );
   
});


?>
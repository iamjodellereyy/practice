<?php
use Illuminate\Support\Facades\Route;


Route::put('/{user}/update','UserController@update')->name('user.profile.update');
Route::delete('/{user}/destroy','UserController@destroy')->name('user.destroy');


Route::middleware(['can:view,user'])->group(function(){
    Route::get('/{user}/profile','UserController@show')->name('user.profile.show');
});


?>
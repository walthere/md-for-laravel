<?php
use Illuminate\Support\Facades\Route;

Route::post('md/image/upload', 'Walthere\MD\Controller@upload')->name('md.image.upload');

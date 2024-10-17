<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProjectController;
use \App\Http\Controllers\TaskController;

Route::get('/', [ProjectController::class, 'index'])->name('index');

Route::prefix('project')->group(function (){
    Route::get('/create', [ProjectController::class, 'create'])->name('project.create');
    Route::post('/store', [ProjectController::class, 'store'])->name('project.store');
    Route::prefix('/{project_id}/task')->group(function (){
        Route::get('', [TaskController::class,'index'])->name('task.index');
        Route::get('/create', [TaskController::class, 'create'])->name('task.create');
        Route::post('/store', [TaskController::class, 'store'])->name('task.store');
        Route::patch('{id}/update/status',[TaskController::class,'patch_status'])->name('task.patch.status');
    });
});



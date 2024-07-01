<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonalDataController;
use App\Http\Controllers\ProjectController;


//Projects vistas
Route::get('projects/{User_Id}', [ ProjectController::class, 'index' ] )->name('projects.index');
Route::get('projects/create/{User_Id}', [ ProjectController::class, 'create' ] )->name('projects.create');
Route::get('projects/edit/{Id}', [ ProjectController::class, 'edit' ])->name('projects.edit');

//Projects Acciones
Route::delete('projects/{User_Id}/{Id}', [ ProjectController::class, 'destroy' ])->name('projects.destroy');
Route::post('projects/{User_Id}', [ ProjectController::class, 'store' ])->name('projects.store');
Route::put('projects/{project}', [ ProjectController::class, 'update' ])->name('projects.update');


//Personal-Data vistas
Route::get('create', [PersonalDataController::class, 'create'])->name('personal_data.create');
Route::get('{id?}', [PersonalDataController::class, 'index'])->name('personal_data.index');
Route::get('edit/{id}', [PersonalDataController::class, 'edit'])->name('personal_data.edit');

//Personal-Data Acciones
Route::put('personal_data/{personalData}', [PersonalDataController::class, 'update'])->name('personal_data.update');
Route::post('personal_data', [PersonalDataController::class, 'store'])->name('personal_data.store');



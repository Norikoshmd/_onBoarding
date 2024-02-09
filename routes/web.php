<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    #User
    // Route::get('/welcome', [HomeController::class, 'index'])->name('index');
    // Route::post('/mark-welcome-as-seen',[HomeController::class, 'markWelcomeAsSeen'])->name('mark-welcome-as-seen');
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/show', [HomeController::class, 'show'])->name('show');


    #Recruiter
    Route::group(['prefix' => 'recruiter', 'as' => 'recruiter.'], function(){
        Route::get('/index',[EmployeeController::class,'index'])->name('index'); //recruiter.index
        Route::get('/create',[EmployeeController::class,'create'])->name('create'); //recruiter.create
        Route::post('/store',[EmployeeController::class,'store'])->name('store'); //recruiter.store
        Route::get('/{id}/show',[EmployeeController::class,'show'])->name('show');//recruiter.show
        Route::get('/{id}/edit',[EmployeeController::class,'edit'])->name('edit');//recruiter.edit
        Route::patch('/{id}/update',[EmployeeController::class,'update'])->name('update');//recruiter.update
        Route::delete('/{id}/destroy',[EmployeeController::class,'destroy'])->name('destroy');//recruiter.destroy
        Route::delete('/{id}/deactivate',[EmployeeController::class,'deactivate'])->name('deactivate');//recruiter.deactivate
        Route::patch('/{id}/activate',[EmployeeController::class,'activate'])->name('activate');//recruiter.activate

    });

    #HR
    Route::group(['prefix' => 'hr', 'as' => 'hr.'], function(){
        Route::get('/index',[TaskController::class, 'index'])->name('index'); //hr.index
        Route::get('/{id}/create',[TaskController::class, 'create'])->name('create'); //hr.create
        Route::post('/store',[TaskController::class, 'store'])->name('store'); //hr.store
        Route::get('/register',[TaskController::class, 'register'])->name('register'); //hr.register
        // Route::get('/registerUser',[TaskController::class, 'registerUser'])->name('registerUser'); //hr.registerUser
        Route::get('/show',[TaskController::class, 'show'])->name('show'); //hr.show
        Route::get('/{id}/showEndorsed',[TaskController::class, 'showEndorsed'])->name('showEndorsed'); //hr.showEndorsed



    });




    
});


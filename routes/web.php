<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\EmployeeTaskController;



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


    #Recruiter(EmployeeController)
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
        Route::get('/index',[TaskController::class, 'index'])->name('index'); //1.hr.index

        Route::get('/employee',[TaskController::class, 'employee'])->name('employee'); //2-i.hr.employee
        Route::get('/{id}/showEndorsed',[TaskController::class, 'showEndorsed'])->name('showEndorsed'); //2-ii.hr.showEndorsed
        Route::get('/register',[TaskController::class, 'register'])->name('register'); //2-iii. hr.register
        // Route::get('/registerUser',[TaskController::class, 'registerUser'])->name('registerUser'); //2-iii. hr.registerUser
        Route::get('/{id}/assignTask',[TaskController::class, 'assignTask'])->name('assignTask'); //2-iv.hr.assignTask
        //2-v.

      
        Route::get('/showAssigned',[TaskController::class, 'showAssigned'])->name('showAssigned'); //3. hr.showAssigned
        Route::get('/showSubmitted',[TaskController::class, 'showSubmitted'])->name('showSubmitted'); //4. hr.showSubmitted
        Route::get('/showConfirmed',[TaskController::class, 'showConfirmed'])->name('showConfirmed'); //5. hr.showConfirmed
        Route::post('/store',[TaskController::class, 'store'])->name('store'); //6. hr.store

       #HR EmployeeTaskController
        Route::get('/employeeTask',[EmployeeTaskController::class, 'EmployeeTask'])->name('employeeTask'); //hr.employeeTask
        Route::post('/taskStore',[EmployeeTaskController::class, 'taskStore'])->name('taskStore'); //hr.taskStore
        Route::delete('/{id}/destroy',[EmployeeTaskController::class, 'destroy'])->name('task.destroy'); //hr.task.destroy
        
    });




    
});


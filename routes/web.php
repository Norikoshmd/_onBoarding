<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\EmployeeTaskController;
use App\Http\Controllers\DocController;



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
    Route::get('/showRequested', [HomeController::class, 'showRequested'])->name('showRequested');
    Route::get('/showSubmitted', [HomeController::class, 'showSubmitted'])->name('showSubmitted');
  

    Route::group(['prefix' => 'doc', 'as' => 'doc.'], function(){
        Route::get('/showForm1', [DocController::class, 'showForm1'])->name('showForm1');//doc.showForm1
        Route::post('/storeForm1', [DocController::class, 'storeForm1'])->name('storeForm1');//doc.storeForm1

        Route::get('/showForm2', [DocController::class, 'showForm2'])->name('showForm2');//doc.showForm2
        Route::post('/storeForm2', [DocController::class, 'storeForm2'])->name('storeForm2');//doc.storeForm2

        Route::get('/showForm3', [DocController::class, 'showForm3'])->name('showForm3');//doc.showForm3
      
   
        //Copy
        Route::get('/showCopy1', [DocController::class, 'showCopy1'])->name('showCopy1');//doc.showCopy1
        // Route::post('/storeCopy1', [DocController::class, 'storeCopy1'])->name('storeCopy1');//doc.storeCopy1

        Route::get('/showCopy2', [DocController::class, 'showCopy2'])->name('showCopy2');//doc.showCopy2
        
        Route::get('/showCopy3', [DocController::class, 'showCopy3'])->name('showCopy3');//doc.showCopy3

        //Dependent
        Route::get('/showDependent1', [DocController::class, 'showDependent1'])->name('showDependent1');//doc.showDependent1
        Route::get('/showDependent2', [DocController::class, 'showDependent2'])->name('showDependent2');//doc.showDependent2
     

    });

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
        Route::get('/{id}/showEndorsed2',[TaskController::class, 'showEndorsed2'])->name('showEndorsed2'); //2-ii.hr.showEndorsed2
        Route::get('/{id}/showEndorsed3',[TaskController::class, 'showEndorsed3'])->name('showEndorsed3'); //2-ii.hr.showEndorsed3
        Route::get('/register',[TaskController::class, 'register'])->name('register'); //2-iii. hr.register
        // Route::get('/registerUser',[TaskController::class, 'registerUser'])->name('registerUser'); //2-iii. hr.registerUser
        Route::get('/{id}/assignTask',[TaskController::class, 'assignTask'])->name('assignTask'); //2-iv.hr.assignTask
        //2-v.

      
        Route::get('/showAssigned',[TaskController::class, 'showAssigned'])->name('showAssigned'); //3. hr.showAssigned
        Route::get('/showSubmitted',[TaskController::class, 'showSubmitted'])->name('showSubmitted'); //4. hr.showSubmitted
        Route::get('/showConfirmed',[TaskController::class, 'showConfirmed'])->name('showConfirmed'); //5. hr.showConfirmed
        Route::post('/store',[TaskController::class, 'store'])->name('store'); //6. hr.store
        Route::patch('/{id}/update', [TaskController::class, 'update'])->name('update');//6-1 hr.update
        Route::delete('/{id}/destroy', [TaskController::class, 'destroy'])->name('destroy');//6-2 hr.destroy

       #HR EmployeeTaskController
        Route::get('/employeeTask',[EmployeeTaskController::class, 'EmployeeTask'])->name('employeeTask'); //hr.employeeTask
        Route::post('/taskStore',[EmployeeTaskController::class, 'taskStore'])->name('taskStore'); //hr.taskStore
        Route::delete('/{id}/destroy',[EmployeeTaskController::class, 'destroy'])->name('task.destroy'); //hr.task.destroy
        
    });




    
});


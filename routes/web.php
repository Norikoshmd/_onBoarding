<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserTaskController;
use App\Http\Controllers\DocController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;



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

// Auth::routes();
// Route::get('register',[RegisterController::class,'showRegisterationForm'])->name('register');
Route::post('register',[RegisterController::class,'register']);
// Route::post('register2',[RegisterController::class,'register2']);
Route::get('login', [LoginController::class,'showLoginForm'])->name('login'); // view は auth.login
Route::post('login', [LoginController::class,'login']);
Route::post('logout', [LoginController::class,'logout'])->name('logout');


Route::group(['middleware' => ['auth', 'can:hr']], function () {
    Route::get('/register',[TaskController::class, 'register'])->name('register'); //2-iii. hr.register
  });

Route::group(['middleware' => 'auth'], function(){
    #User
    // Route::get('/welcome', [HomeController::class, 'index'])->name('index');
    // Route::post('/mark-welcome-as-seen',[HomeController::class, 'markWelcomeAsSeen'])->name('mark-welcome-as-seen');
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/showRequested', [HomeController::class, 'showRequested'])->name('showRequested');
    Route::get('/showSubmitted', [HomeController::class, 'showSubmitted'])->name('showSubmitted');
    
   
    Route::group(['prefix' => 'doc', 'as' => 'doc.'], function(){
        Route::get('/showDoc1', [DocController::class, 'showDoc1'])->name('showDoc1');//doc.Doc1
        Route::post('/storeDoc1', [DocController::class, 'storeDoc1'])->name('storeDoc1');//doc.storeDoc1
        Route::get('/{id}/showFilledDoc1', [DocController::class, 'showFilledDoc1'])->name('showFilledDoc1');//doc.showFilledDoc1

        Route::get('/showDoc2', [DocController::class, 'showDoc2'])->name('showDoc2');//doc.showDoc2
        Route::post('/storeDoc2', [DocController::class, 'storeDoc2'])->name('storeDoc2');//doc.storeDoc2

        Route::get('/showDoc3', [DocController::class, 'showDoc3'])->name('showDoc3');//doc.showDoc3
        Route::post('/storeDoc3', [DocController::class, 'storeDoc3'])->name('storeDoc3');//doc.storeDoc3
      
   
        //Copy
        Route::get('/showDoc4', [DocController::class, 'showDoc4'])->name('showDoc4');//doc.showDoc4
        Route::post('/storeDoc4', [DocController::class, 'storeDoc4'])->name('storeDoc4');//doc.storeDoc4

        //Not functioning
        Route::get('/showDoc5', [DocController::class, 'showDoc5'])->name('showDoc5');//doc.showDoc5
        Route::post('/storeDoc5', [DocController::class, 'storeDoc5'])->name('storeDoc5');//doc.storeDoc5
        
        Route::get('/showDoc6', [DocController::class, 'showDoc6'])->name('showDoc6');//doc.showDoc6
        Route::post('/storeDoc6', [DocController::class, 'storeDoc6'])->name('storeDoc6');//doc.storeDoc6

        //Dependent
        Route::get('/showDoc7', [DocController::class, 'showDoc7'])->name('showDoc7');//doc.showDoc7
        Route::post('/storeDoc7', [DocController::class, 'storeDoc7'])->name('storeDoc7');//doc.storeDoc7

        Route::get('/showDoc8', [DocController::class, 'showDoc8'])->name('showDoc8');//doc.showDoc8
        Route::post('/storeDoc8', [DocController::class, 'storeDoc8'])->name('storeDoc8');//doc.storeDoc8
     

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
        Route::post('/storeUserID',[TaskController::class, 'storeUserID'])->name('storeUserID'); //2-i.hr.storeUserID
        Route::get('/{id}/showEndorsed',[TaskController::class, 'showEndorsed'])->name('showEndorsed'); //2-ii.hr.showEndorsed
        Route::get('/{id}/showEndorsed2',[TaskController::class, 'showEndorsed2'])->name('showEndorsed2'); //2-ii.hr.showEndorsed2
        Route::get('/{id}/showEndorsed3',[TaskController::class, 'showEndorsed3'])->name('showEndorsed3'); //2-ii.hr.showEndorsed3
        
        // Route::get('/showRegisteredAccount',[TaskController::class,'showRegisteredAccount'])->name('showRegisteredAccount'); //2-iv.hr.showRegisteredAccount
        // Route::get('/registerUser',[TaskController::class, 'registerUser'])->name('registerUser'); //2-iii. hr.registerUser
        Route::get('/{id}/assignTask',[TaskController::class, 'assignTask'])->name('assignTask'); //2-iv.hr.assignTask
        //2-v.

      
        Route::get('/showAssigned',[TaskController::class, 'showAssigned'])->name('showAssigned'); //3. hr.showAssigned
        Route::get('/{id}/showIndividuallyAssigned',[TaskController::class, 'showIndividuallyAssigned'])->name('showIndividuallyAssigned'); //3. hr.showIndividuallyAssigned
        Route::get('/showSubmitted',[TaskController::class, 'showSubmitted'])->name('showSubmitted'); //4. hr.showSubmitted
        Route::get('/showConfirmed',[TaskController::class, 'showConfirmed'])->name('showConfirmed'); //5. hr.showConfirmed
        Route::post('/store',[TaskController::class, 'store'])->name('store'); //6. hr.store
        Route::patch('/{id}/update', [TaskController::class, 'update'])->name('update');//6-1 hr.update
        Route::delete('/{id}/destroy', [TaskController::class, 'destroy'])->name('destroy');//6-2 hr.destroy

       #HR UserTaskController
       Route::get('/userTask',[UserTaskController::class, 'userTask'])->name('userTask'); //hr.userTask
       Route::post('/taskStore',[UserTaskController::class, 'taskStore'])->name('taskStore'); //hr.taskStore
       Route::get('/{id}/addTask',[UserTaskController::class, 'addTask'])->name('addTask'); //2-iv.hr.addTask
       //2-v.
       Route::delete('/{id}/destroyAssigned',[UserController::class, 'destroyAssigned'])->name('task.destroyAssigned'); //hr.task.destroyAssigned

        // Route::get('/employeeTask',[EmployeeTaskController::class, 'employeeTask'])->name('employeeTask'); //hr.EmployeeTask
        // Route::post('/taskStore',[EmployeeTaskController::class, 'taskStore'])->name('taskStore'); //hr.taskStore
        Route::delete('/{id}/destroyAssigned',[UserTaskController::class, 'destroyAssigned'])->name('task.destroyAssigned'); //hr.task.destroyAssigned
        
    });




    
});


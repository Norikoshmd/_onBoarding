<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    private $employee;
    private $user;

    public function __construct(Employee $employee, User $user)
    {
        $this->employee = $employee;
        $this->user = $user;
    }

    public function index()
    {
        $employees = $this->employee->withTrashed()->latest()->paginate(2);
        $users = $this->user->all();

        return view('recruiter.index')
        ->with('employees',$employees)
        ->with('users',$users);
    }

    public function create()
    {
        return view('recruiter.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          =>'required|min:1|max:50', 
            'gender'        =>'required', 
            'email'         =>'required|email|max:50', 
            'visa_status'   =>'required|min:1|max:100', 
            'startday'      =>'required|date|after:today',
            'workat'        =>'required|min:1|max:30', 
            'visa_f'        =>'required|mimes:jpeg,jpg,png,gif|max:1048' ,
            'visa_b'        =>'required|mimes:jpeg,jpg,png,gif|max:1048' ,
            'passport'      =>'required|mimes:jpeg,jpg,png,gif|max:1048' ,
            'remarks'       =>'max:100', 
        ]);

        $this->employee->name        = $request->name;
        $this->employee->gender      = $request->gender;
        $this->employee->email       = $request->email;
        $this->employee->visa_status = $request->visa_status;
        $this->employee->startday    = $request->startday;
        $this->employee->workat      = $request->workat;
        $this->employee->visa_f      = 'data:visa_f/' . $request->visa_f->extension() . ';base64,' . base64_encode(file_get_contents($request->visa_f));
        $this->employee->visa_b      = 'data:visa_b/' . $request->visa_b->extension() . ';base64,' . base64_encode(file_get_contents($request->visa_b));
        $this->employee->passport    = 'data:passport/' . $request->passport->extension() . ';base64,' . base64_encode(file_get_contents($request->passport));
        $this->employee->remarks     = $request->remarks;
        $this->employee->user_id     = Auth::user()->id;

        $this->employee->save();

        return redirect()->route('recruiter.index');
    }

    public function show($id)
    {
        $employee =  $this->employee->findOrFail($id);
        
        return view('recruiter.show')->with('employee', $employee);
    }

    public function edit($id)
    {
        $employee = $this->employee->findOrFail($id);

        return view('recruiter.edit')->with('employee',$employee);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'          =>'min:1|max:50', 
            'gender'        =>'min:1|max:50', 
            'email'         =>'email|max:50', 
            'visa_status'   =>'min:1|max:100', 
            'startday'      =>'date|after:today',
            'workat'        =>'min:1|max:30', 
            'visa_f'        =>'mimes:jpeg,jpg,png,gif|max:1048' ,
            'visa_b'        =>'mimes:jpeg,jpg,png,gif|max:1048' ,
            'passport'      =>'mimes:jpeg,jpg,png,gif|max:1048' ,
        ]);

        
        $this->employee->name        = $request->name;
        $this->employee->gender      = $request->gender;
        $this->employee->email       = $request->email;
        $this->employee->visa_status = $request->visa_status;
        $this->employee->startday    = $request->startday;
        $this->employee->workat      = $request->workat;
        $this->employee->remarks     = $request->remarks;

        if($request->visa_f){
            $this->employee->visa_f = 'data:image/' . $request->visa_f->extension() . ';base64,' . base64_encode(file_get_contents($request->visa_f));
        }
        if($request->visa_b){
            $this->employee->visa_b = 'data:image/' . $request->visa_b->extension() . ';base64,' . base64_encode(file_get_contents($request->visa_b));
        }
        if($request->passport){
            $this->employee->passport = 'data:image/' . $request->passport->extension() . ';base64,' . base64_encode(file_get_contents($request->passport));
        }

        $this->employee->save();

        return redirect()->route('recruiter.index');
    }

    // public function destroy($id)
    // {
    //     $this->employee->destroy($id);
    //     return redirect()->back();

    // }

    public function deactivate($id)
    {
        $this->employee->destroy($id);
        return redirect()->back();
    }

    // public function deactivate($id)
    // {
    //     $employee=$this->employee->findOrFail($id);
    //     $employee->delete();
    //     return redirect()->route('recruiter.index');
    // }

    // public function activate($id)
    // {
    //    $this->user->onlyTrashed()->findOrFail($id)->restore();
    //     return redirect()->back();
    // }



  
}

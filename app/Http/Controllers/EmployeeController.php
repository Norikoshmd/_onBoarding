<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    private $employee;

    public function __construct(Employee $employee)
    {
        $this->employee = $employee;
    }

    public function index()
    {
        $employees = $this->employee->all();

        return view('recruiter.index')->with('employees',$employees);
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

        $this->employee->save();

        return redirect()->route('recruiter.index');
    }
}

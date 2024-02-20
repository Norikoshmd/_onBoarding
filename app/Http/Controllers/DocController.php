<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doc;
use App\Models\Form2;
use App\Models\Employee;

class DocController extends Controller
{
    private $doc;

    public function __construct(Doc $doc, Employee $employee)
    {
       $this->doc = $doc;
       $this->employee =$employee;

    }

    public function showForm1()
    {
        return view('users.form.form1');
    }

    public function storeForm1(Request $request)
    {
        $request->validate([
            'firstname'         => 'required|min:1|max:50',
            'middlename'        => 'nullable|min:1|max:50',
            'lastname'          => 'required|min:1|max:50',
            'namae'             => 'nullable|min:1|max:50',
            'middlename_kana'   => 'nullable',
            'myouji'            => 'nullable|min:1|max:50',
            'dob'               => 'required|date',
            'maritalStatus'     => 'required|max:10',
            'phone'             => 'required|min:1|max:50',
            'email'             => 'required|min:1|max:50',
            'c_postal'          => 'required|min:1|max:50',
            'c_address'         => 'required|min:1|max:50',
            'homecountry'       => 'required|min:1|max:50',
            'h_address'         => 'required|min:1|max:50',
            'h_postal'          => 'required|min:1|max:50',
        ]);

        $this->doc->firstname = $request->firstname;
        $this->doc->middlename = $request->middlename;
        $this->doc->lastname = $request->lastname;
        $this->doc->namae = $request->namae;
        $this->doc->middlename_kana = $request->middlename_kana;
        $this->doc->myouji = $request->myouji;
        $this->doc->dob = $request->dob;
        $this->doc->marital_status = $request->maritalStatus;
        $this->doc->phone = $request->phone;
        $this->doc->email = $request->email;
        $this->doc->c_postal = $request->c_postal;
        $this->doc->c_address = $request->c_address;
        $this->doc->c_address = $request->c_address;
        $this->doc->homecountry = $request->homecountry;
        $this->doc->h_address = $request->h_address;
        $this->doc->h_postal = $request->h_postal;
    
        $this->doc->save();

        return redirect()->route('showRequested');
    }

    public function showSubmitForm1($id)
    {  
        $doc = $this->doc->findOrFail($id);
      
        return view('users.form.submitForm1')
        ->with('doc',$doc);
      
    }

    public function showForm2()
    {
        return view('users.form.form2');
    }

    //NOT WORKING
    public function storeForm2(Request $request)
    {
        $request->validate([
            'firstname1'         => 'required|min:1|max:30',
            'lastname1'          => 'required|min:1|max:30',
            'relationship1'      => 'required|min:1|max:100',
            'postal1'            => 'nullable|min:1|max:30',
            'address1'           => 'nullable|min:1|max:100',
            'email1'             => 'required|min:1|max:255|email',
            'phone1'             => 'required|min:1|max:30',
            'firstname2'         => 'nullable|min:1|max:30',
            'lastname2'          => 'nullable|min:1|max:30',
            'relationship2'      => 'nullable|min:1|max:100',
            'postal2'            => 'nullable|min:1|max:30',
            'address2'           => 'nullable|min:1|max:100',
            'email2'             => 'nullable|min:1|max:255|email',
            'phone2'             => 'nullable|min:1|max:30',
        ]);

        $form2 =new Form2();
      
        $form2->firstname1 = $request->firstname1;
        $form2->lastname1 = $request->lastname1;
        $form2->relationship1 = $request->relationship1;
        $form2->postal1 = $request->postal1;
        $form2->address1 = $request->address1;
        $form2->email1 = $request->email1;
        $form2->phone1 = $request->phone1;
        $form2->firstname2 = $request->firstname2;
        $form2->lastname2 = $request->lastname2;
        $form2->relationship2 = $request->relationship2;
        $form2->postal2 = $request->postal2;
        $form2->address2 = $request->address2;
        $form2->email2 = $request->email2;
        $form2->phone2 = $request->phone2;

     
        $form2->save();

        return redirect()->route('showRequested');
    }

    public function showForm3()
    {
        return view('users.form.form3');
    }


    // copy


    public function showCopy1()
    {
        return view('users.copies.copy1');
    }

    // public function storeCopy1()
    // {

    // }

    public function showCopy2()
    {
        return view('users.copies.copy2');
    }


    public function showCopy3()
    {
        return view('users.copies.copy3');
    }


    //Dependent
    public function showDependent1()
    {
        return view('users.dependent.dependent1');
    }

    public function showDependent2()
    {
        return view('users.dependent.dependent2');
    }

}

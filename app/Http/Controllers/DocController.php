<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doc;
// use App\Models\Form2;
use App\Models\Employee;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class DocController extends Controller
{
    private $doc;

    public function __construct(Doc $doc, Employee $employee,Task $task)
    {
       $this->doc = $doc;
       $this->employee =$employee;
       $this->task =$task;

    }

    public function showDoc1()
    {
        return view('users.form.form1');
    }

    public function storeDoc1(Request $request)
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

        $this->doc1->user_id = Auth::user()->id;
        $this->doc1->firstname = $request->firstname;
        $this->doc1->middlename = $request->middlename;
        $this->doc1->middlename = $request->middlename;
        $this->doc1->lastname = $request->lastname;
        $this->doc1->namae = $request->namae;
        $this->doc1->middlename_kana = $request->middlename_kana;
        $this->doc1->myouji = $request->myouji;
        $this->doc1->dob = $request->dob;
        $this->doc1->marital_status = $request->maritalStatus;
        $this->doc1->phone = $request->phone;
        $this->doc1->email = $request->email;
        $this->doc1->c_postal = $request->c_postal;
        $this->doc1->c_address = $request->c_address;
        $this->doc1->c_address = $request->c_address;
        $this->doc1->homecountry = $request->homecountry;
        $this->doc1->h_address = $request->h_address;
        $this->doc1->h_postal = $request->h_postal;
    
        $this->doc1->save();

        return redirect()->route('showRequested');
    }

    public function showFilledDoc1($id)
    {  
        $doc1 = $this->doc1->findOrFail($id);
      
        return view('users.form.filledDoc1')
        ->with('doc1',$doc1);
      
    }

    public function showDoc2()
    {
        return view('users.form.form2');
    }

    //NOT WORKING
    public function storeDoc2(Request $request)
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

        $doc2 =new Doc2();
      
        $doc2->firstname1 = $request->firstname1;
        $doc2->lastname1 = $request->lastname1;
        $doc2->relationship1 = $request->relationship1;
        $doc2->postal1 = $request->postal1;
        $doc2->address1 = $request->address1;
        $doc2->email1 = $request->email1;
        $doc2->phone1 = $request->phone1;
        $doc2->firstname2 = $request->firstname2;
        $doc2->lastname2 = $request->lastname2;
        $doc2->relationship2 = $request->relationship2;
        $doc2->postal2 = $request->postal2;
        $doc2->address2 = $request->address2;
        $doc2->email2 = $request->email2;
        $doc2->phone2 = $request->phone2;

     
        $doc2->save();

        return redirect()->route('showRequested');
    }

    public function showDoc3()
    {
        return view('users.form.form3');
    }

    public function storeDoc3(Request $request)
    {
        $request->validate([
            'how'                => 'required|max:50',
            'date'               => 'required',
            'time'               => 'nullable',
        ]);

        $this->doc3->user_id = Auth::user()->id;
        $this->doc3->how = $request->how;
        $this->doc3->date = $request->date;
        $this->doc3->time = $request->time;

        $this->doc3->save();

        return redirect()->route('showRequested');
    }

    // copy
    public function showDoc4()
    {
        return view('users.copies.copy1');
    }

    public function storeDoc4(Request $request)
    {
        $request->validate([
            'pension'         => 'mimes:jpg,png,jpeg,gif|max:1048',
            'pensionnumber'   => 'required|min:1|max:10',
        ]);

        $this->doc4->user_id = Auth::user()->id;
        $this->doc4->pension = $request->pension;
        $this->doc4->pensionnumber = $request->pensionnumber;

        $this->doc4->save();

        return redirect()->route('showRequested');
    }

    public function showDoc5()
    {
        return view('users.copies.copy2');
    }

    public function storeDoc5(Request $request)
    {
        $request->validate([
            'e_insurance'         => 'mimes:jpg,png,jpeg,gif|max:1048',
        ]);

        $this->doc5->user_id = Auth::user()->id;
        $this->doc5->e_insurance = $request->e_insurance;

        $this->doc5->save();

        return redirect()->route('showRequested');
    }


    public function showDoc6()
    {
        return view('users.copies.copy3');
    }

    public function storeDoc6(Request $request)
    {
        $request->validate([
            'gensen'         => 'mimes:jpg,png,jpeg,gif|max:1048',
        ]);

        $this->doc6->user_id = Auth::user()->id;
        $this->doc6->gensen = $request->gensen;

        $this->doc6->save();

        return redirect()->route('showRequested');
    }

    //Dependent
    public function showDoc7()
    {
        return view('users.dependent.dependent1');
    }

    public function storeDoc7(Request $request)
    {
        $request->validate([
            'pension_s'         => 'mimes:jpg,png,jpeg,gif|max:1048',
        ]);

        $this->doc7->user_id = Auth::user()->id;
        $this->doc7->pension_s = $request->pension_s;

        $this->doc7->save();

        return redirect()->route('showRequested');
    }

    public function showDoc8()
    {
        return view('users.dependent.dependent2');
    }

    public function storeDoc8(Request $request)
    {
        $request->validate([
            'how'                => 'required|max:50',
            'date'               => 'required',
            'time'               => 'nullable',
        ]);

        $this->doc8->user_id = Auth::user()->id;
        $this->doc8->how = $request->how;
        $this->doc8->date = $request->date;
        $this->doc8->time = $request->time;

        $this->doc8->save();

        return redirect()->route('showRequested');
    }

}

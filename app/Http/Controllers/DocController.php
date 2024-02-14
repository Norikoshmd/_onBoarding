<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doc;

class DocController extends Controller
{
    private $doc;

    public function __construct(Doc $doc)
    {
       $this->doc = $doc;

    }

    public function showForm1()
    {
        return view('users.form.form1');
    }

    // public function storeForm1(Request $request)
    // {
    //     $this->request->validate([
    //         'firstname' => '',
    //         'middlename' => '',
    //         'lastname' => '',
    //         'namae' => '',
    //         'middlename_kana' => '',
    //         'myouji' => '',
    //         'dob' => '',
    //         'maritalStatus' => '',
    //         'phone' => '',
    //         'c_postal' => '',
    //         'c_address' => '',
    //         'homecountry' => '',
    //         'h_address' => '',
    //         'h_postal' => '',
    //     ]);

    //     $this->doc->save();
    // }


    public function showCopy1()
    {
        return view('users.copies.copy1');
    }

    // public function storeCopy1()
    // {

    // }
}

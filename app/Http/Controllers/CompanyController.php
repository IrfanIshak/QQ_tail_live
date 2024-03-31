<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    //
    public function edit($id){
        
        $companies = Company::where('id',$id)->first();
        return view('company.edit',['companies'=> $companies]);
    }
}

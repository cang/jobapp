<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
/**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $companies = Company::orderBy('id','desc')->paginate(20);
        return view('company.index', compact('companies'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('company.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'web' => 'required|url',
            'email' => 'required|email|unique:users',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            // 'phone' => 'required|numeric|min:10',
            'address' => 'required',
        ]);
        
        
        $request->validate([
            'logo' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);
        
        $company = $request->post();
        
        if ($request->hasFile('logo')) 
        {
            $logo_image = $request->logo;
            //$imageName = $logo_image->getClientOriginalName() . time().'.'.$logo_image->extension();
            $imageName =  'logo'. time() .$logo_image->getClientOriginalName();
            $logo_image->move(public_path('images'), $imageName);
            $company['logo']= $imageName;
        }
        
        Company::create($company);

        return redirect()->route('company.index')->with('success','Company has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function show(Company $company)
    {
        return view('company.show',compact('company'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    public function edit(Company $company)
    {
        return view('company.edit',compact('company'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required',
            'web' => 'required|url',
            'email' => 'required|email|unique:users',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            // 'phone' => 'required|numeric|min:10',
            'address' => 'required',
        ]);        
        
         $update_company = $request->post();
        
        if ($request->hasFile('logo')) 
        {
            $logo_image = $request->logo;
            $imageName =  'logo'. time() .$logo_image->getClientOriginalName();
            $logo_image->move(public_path('images'), $imageName);
            $update_company['logo']= $imageName;
        }
        
       $company->fill($update_company)->save();

        return redirect()->route('company.index')->with('success','Company Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('company.index')->with('success','Company has been deleted successfully');
    }
}

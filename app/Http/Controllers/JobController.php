<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Job;
use App\Models\Company;

class JobController extends Controller
{
    //temporary, I use categories as static here , it will be replaced by config or api on db
    private $positions = ['Engineer','Team Leader', 'Project Manager'];
    private $categories = ['Development & IT','Design & Creative', 'Sales & Marketing','Finance & Accounting'];
    private $jobtypes = ['Any','Full-time', 'Part-time','Internship','Remote','Freelance'];


    private function getCompanyFromParams(Request $request)
    {
        if(isset($request->c_id))
            return Company::find($request->c_id);
        return null;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $company = $this->getCompanyFromParams($request);
        if($company)
        {
            $jobs =Job::where('company_id',$company->id)->orderBy('id','desc')->paginate(20);
            return view('job.index', array_merge(compact('jobs'),['company'=> $company]));
        }
        else
        {
            $jobs = Job::orderBy('id','desc')->paginate(20);
            return view('job.index', array_merge(compact('jobs'),['company'=> null]));
        }
    }

    /**  
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {
        //$this->authorize('admin', User::class);
        return view('job.create', ['companies' => Company::latest()->get(['id','name'])
            ,"positions" => $this->positions
            ,"categories"=> $this->categories
            ,"jobtypes"=> $this->jobtypes
            ,"company"=> $this->getCompanyFromParams($request)
            ]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //$this->authorize('admin', User::class);
        $this->validate($request, [
            'title' => 'required',
            'position' => 'required',
            'description' => 'required',
            'type' => 'required',
            'experience' => 'required|numeric|min:0' ,
            'vacancy' => 'required|numeric|min:0|not_in:0' ,
            'salary' => 'required|numeric|min:0|not_in:0' ,
        ]); 
        
        $job = $request->post();
        Job::create($job);
        
        if(isset($request->c_id))
            return redirect()->route('job.index',["c_id" => $request->c_id])->with('success','Job has been created successfully.');
        else
            return redirect()->route('job.index')->with('success','Job has been created successfully.'); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,Job $job)
    {
         return view('job.edit',array_merge(compact('job'),
            ['companies' => Company::latest()->get(['id','name'])
            ,"positions" => $this->positions
            ,"categories"=> $this->categories
            ,"jobtypes"=> $this->jobtypes
            ,"company"=> $this->getCompanyFromParams($request)
            ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job) {
        $update_job = $request->post();
        $job->fill($update_job)->save();
        
        if(isset($request->c_id))
            return redirect()->route('job.index',["c_id" => $request->c_id])->with('success','Job Has Been updated successfully');
        else
            return redirect()->route('job.index')->with('success','Job Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Job $job)     
    {
        $job->delete();
        
        if(isset($request->c_id))
            return redirect()->route('job.index',["c_id" => $request->c_id])->with('success','Job has been deleted successfully');
        else
            return redirect()->route('job.index')->with('success','Job has been deleted successfully');
    }
    
    public function detail($id) 
    {
        return view('job.detail',['job' => Job::findOrFail($id)]);
    }
    
}

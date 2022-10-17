<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Job;
use Carbon\Carbon;

class Joblist extends Component
{
    public $jobs;
    
    public $positions = ['Engineer','Team Leader', 'Project Manager'];
    public $categories = ['All','Development & IT','Design & Creative', 'Sales & Marketing','Finance & Accounting'];
    public $jobtypes = ['Any','Full-time', 'Part-time','Internship','Remote','Freelance'];    
    
    public $category;
    public $selectedtype;
    public $atype = [];
    
    public $maxsalary;
    
    public $sortby="created_at";
    
    public $posttimes=[false,false,false,false,false,false];
    
    public $locations=[];
    public $location;
    
    public $q_title="";
    
    public function mount()
    {
        //nothing to init here
    }
    
    public function changeLocation()
    {
        error_log($this->location);
    }
    
    public function render()
    {
        $ret = null;
        
        //temporary, I get from Job , in the real time location from location database
        $this->locations=['Anywhere'];
        foreach(Job::select('location')->distinct()->get() as $loc)
           array_push($this->locations,$loc->location);

        //THIS IS only demo, in the real-time with the big data. We must think about other solution :)
        
        //time filter
        $timeafter = $this->getTimeBefore(); 
        if($timeafter>=0)
        {
            $after = Carbon::now();
            if($timeafter==0)
                $after = $after->startOfDay();
            else
                $after = $after->subDays($timeafter);
            $ret = Job::where('created_at','>=',$after);
        }
        
        //query
        if($this->q_title)
        {
            if($ret)
                $ret = $ret->where('title', 'like', '%' . $this->q_title . '%');
            else
                $ret = Job::where('title', 'like', '%' . $this->q_title . '%');
        }
        
        //location
        if($this->location and $this->location!='Anywhere')
        {
            if($ret)
                $ret = $ret->where('location', 'like', '%' . $this->location . '%');
            else
                $ret = Job::where('location', 'like', '%' . $this->location . '%');
        }
        
        //category
        if($this->category and $this->category!='All')
        {
            if($ret)
                $ret = $ret->where('category',$this->category);
            else
                $ret = Job::where('category',$this->category);
        }
        
        //job type
        if(count($this->atype)>0 and !in_array('Any',$this->atype) )
        {
            if($ret)
                $ret = $ret->whereIn('type',$this->atype);
            else
                $ret = Job::whereIn('type',$this->atype);
        }
        
        //salary
        if($this->maxsalary)
        {
            if($ret)
                $ret = $ret->where('salary','<=',$this->maxsalary);
            else
                $ret = Job::where('salary','<=',$this->maxsalary);
        }
        
        //get collection
        if($ret)
            $ret = $ret->get();
        else 
            $ret = Job::all();
        
        //sort by
        if($this->sortby and !empty($this->sortby) )
        {
            if('created_at'==$this->sortby)
                $this->jobs = $ret->sortByDesc($this->sortby);
            else
                $this->jobs = $ret->sortBy($this->sortby);
        }
        else
            $this->jobs = $ret;
        
        return view('livewire.job.list');
    }
    
    public function onSearch()
    {
        error_log($this->q_title);
    }
    
    public function typeChange($type)
    {
        if (in_array($type,$this->atype))
        {
            $pos = array_search($type,$this->atype);
            unset($this->atype[$pos]);
        }
        else
            array_push($this->atype,$type);
    }
    
    public function timeChange($idx)
    {
        for ($i = 0; $i < count($this->posttimes); $i++)
        {
            if($i!=$idx)
                $this->posttimes[$i]=false;
        }
    }
    
    private function getTimeBefore()
    {
        $posttimeindex=-1;
        
        //index 0 is not filter 
        for ($i = 1; $i < count($this->posttimes); $i++)
        {
            if($this->posttimes[$i])
            {
                $posttimeindex=$i;
                break;
            }
        }
        switch($posttimeindex)
        {
            case 1:
                $posttimeindex = 0;//time();
                break;
            case 2:
                $posttimeindex = 2;//time() - 60*60*24*2;
                break;                    
            case 3:
                $posttimeindex = 3;//time() - 60*60*24*3;
                break;                   
            case 4:
                $posttimeindex = 5;//time() - 60*60*24*5;
                break;                   
            case 5:
                $posttimeindex = 10;//time() - 60*60*24*10;
                break;                                       
        }
        
        return $posttimeindex;
    }

    
}

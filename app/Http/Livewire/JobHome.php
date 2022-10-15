<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Job;

class JobHome extends Component
{
    const   RECENTDAYS = 7;
    public $jobs;
    
    public function render()
    {
        $ret = null;
        
        $before = Carbon::now()->subDays(JobHome::RECENTDAYS);
        $ret = Job::where('created_at','>=',$before);
        
        //get collection
        if($ret)
            $ret = $ret->get();
        else 
            $ret = Job::all();
        
        //sort
        $this->jobs = $ret->sortByDesc('created_at');
        
        return view('livewire.home.job-home');
    }
    
    
}

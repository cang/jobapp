<?php

namespace App\View\Components;

use Illuminate\View\Component;

class JobItem extends Component
{
    public $job;
    public $isread;
 
    /**
     * Create the component instance.
     *
     * @param  string  $job
     * @return void
     */
    public function __construct($job,$isread=false)
    {
        $totalseconds = time()-strtotime($job->created_at);
        $this->job = $job;
        $this->isread = $isread;
        $this->job->hourago = round($totalseconds/3600);
    }
 
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.job-item');
    }
    
    
}

<!-- select-Categories start -->
<div class="select-Categories pt-80 pb-50">
    <div class="small-section-tittle2">
        <h4>Job Type</h4>
    </div>
    
    @foreach ($jobtypes as $jobtype)
    <label class="container">{{$jobtype}}
        <input type="checkbox" wire:change="typeChange('{{$jobtype}}')">
        <span class="checkmark"></span>
    </label>    
    @endforeach
   
</div>
<!-- select-Categories End -->

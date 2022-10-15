<div class="single-job-items">
    <div class="job-items">
        <div class="company-img">
            <a href="#"><img src="{{ asset('images') . '/' . $job->company->logo}}" alt="" width="100" height="50"></a>
        </div>
        <div class="job-tittle job-tittle2">
            <a href=@if($isread) "" @else "/jobs/detail/{{$job->id}}" @endif>
                <h4>{{$job->title}}</h4>
            </a>
            <ul>
                <li>{{$job->company->name}}</li>
                <li><i class="fas fa-map-marker-alt"></i>{{$job->location}}</li>
                <li>${{$job->salary}}</li>
            </ul>
        </div>
    </div>
    <div class="items-link items-link2 f-right">
        <a href= @if($isread) "" @else "/jobs/detail/{{$job->id}}" @endif >{{$job->type}}</a>
        <span>{{$job->hourago}} hours ago</span>
    </div>
</div>






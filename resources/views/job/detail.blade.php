@extends('layouts.app')

@section('content')
        <!-- job post company Start -->
        <div class="job-post-company pt-120 pb-120">
            <div class="container">
                <div class="row justify-content-between">
                    <!-- Left Content -->
                    <div class="col-xl-7 col-lg-8">
                        <!-- job single -->
                        <x-job-item :$job :isread=true/>
                        
                        {!!$job->description!!}

                    </div>
                    <!-- Right Content -->
                    <div class="col-xl-4 col-lg-4">
                        <div class="post-details3  mb-50">
                            <!-- Small Section Tittle -->
                           <div class="small-section-tittle">
                               <h4>Job Overview</h4>
                           </div>
                          <ul>
                              <li>Posted date : <span>{{$job->created_at}}</span></li>
                              <li>Location : <span>{{$job->location}}</span></li>
                              <li>Vacancy : <span>{{$job->vacancy}}</span></li>
                              <li>Job nature : <span>{{$job->type}}</span></li>
                              <li>Salary :  <span>${{$job->salary}}</span></li>
                              <li>Application date : <span>{{$job->app_date}}</span></li>
                          </ul>
                         <div class="apply-btn2">
                            <a href="#" class="btnp">Apply Now</a>
                         </div>
                       </div>
                        <div class="post-details4  mb-50">
                            <!-- Small Section Tittle -->
                           <div class="small-section-tittle">
                               <h4>Company Information</h4>
                           </div>
                              <span>{{$job->company->name}}</span>
                              <p>{!!$job->company->info!!}</p>
                            <ul>
                                <li>Name: <span>{{$job->company->name}} </span></li>
                                <li>Web : <span> {{$job->company->web}}</span></li>
                                <li>Email: <span>{{$job->company->email}}</span></li>
                            </ul>
                       </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- job post company End -->
@endsection

<div class="job-listing-area pt-20 pb-20">
@include('livewire.job.hero')
<br>
<div class="container">
    <div class="row">
    
        <!-- Left content -->
        <div class="col-xl-3 col-lg-3 col-md-4">
            <div class="row">
                <div class="col-12">
                        <div class="small-section-tittle2 mb-45">
                        <div class="ion"> <svg 
                            xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="20px" height="12px">
                        <path fill-rule="evenodd"  fill="rgb(27, 207, 107)"
                            d="M7.778,12.000 L12.222,12.000 L12.222,10.000 L7.778,10.000 L7.778,12.000 ZM-0.000,-0.000 L-0.000,2.000 L20.000,2.000 L20.000,-0.000 L-0.000,-0.000 ZM3.333,7.000 L16.667,7.000 L16.667,5.000 L3.333,5.000 L3.333,7.000 Z"/>
                        </svg>
                        </div>
                        <h4>Filter Jobs</h4>
                    </div>
                </div>
            </div>
            
            <!-- Job Category Listing start -->
            <div class="job-category-listing mb-50">
                
                <!-- single one -->
                <div class="single-listing">
                    @include('livewire.job.category')
                    @include('livewire.job.type')
                </div>
                

                <div class="single-listing">
                    @include('livewire.job.location')
                    <br>
<!--                    include('livewire.job.experience')-->
                </div>
                
                <div class="single-listing">
                    @include('livewire.job.postedtime')
                </div>
                
                <div class="single-listing">
                    @include('livewire.job.timefilter')
                </div>
                
                
            </div>
            <!-- Job Category Listing End -->
        </div>
        
        
        <!-- Right content -->
        <div class="col-xl-9 col-lg-9 col-md-8">
            <!-- Featured_job_start -->
            <section class="featured-job-area">
                <div class="container">
                    <!-- Count of Job list Start -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="count-job mb-35">
                                <span><strong>{{$jobs->count()}} Jobs found</strong></span>
                                @include('livewire.job.sortby')
                            </div>
                        </div>
                    </div>
                    <!-- Count of Job list End -->
                    
                    @foreach ($jobs as $job)
                        <x-job-item :$job/> <!--<x-job-item :job="$job"/>-->
                    @endforeach
                </div>
            </section>
            <!-- Featured_job_end -->
        </div>
    </div>
</div>
</div>
<!-- Featured_job_start -->
<section class="featured-job-area feature-padding">
    <div class="container">
        <!-- Section Tittle -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle text-center">
                    <h2>Recent Job</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-10">
            
                @foreach ($jobs as $job)
                    <x-job-item :$job/>
                @endforeach            
            
            </div>
        </div>
    </div>
</section>
<!-- Featured_job_end -->

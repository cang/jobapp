@extends('layouts.aapp')
@section('content')

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>


    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Job</h2>
                </div>
                <div class="pull-right">
                    @if($company!=null) 
                        <a class="btnp btn-primary" href="{{ route('job.index') . '?c_id=' . $company->id }}" enctype="multipart/form-data">Back</a>
                    @else
                        <a class="btnp btn-primary" href="{{ route('job.index') }}" enctype="multipart/form-data">Back</a>
                    @endif
                </div>
            </div>
        </div>
        
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        
        <form action="{{ route('job.update',$job->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                    <strong>Company:</strong><br>
                    <select class="selectpicker" data-live-search="true" name="company_id" id="company_id">
                        @foreach ($companies as $company1)
                            <option value="{{$company1->id}}" data-tokens="{{$company1->id}}" @if($job->company_id==$company1->id) selected @endif
                            >{{$company1->name}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Title:</strong>
                        <input type="text" name="title" class="form-control" placeholder="Job Title" value="{{$job->title}}">
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Location:</strong>
                        <input name="location" class="form-control" placeholder="Location of Job, city , country" value="{{$job->location}}">
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                    <strong>Category:</strong><br>
                    <select class="selectpicker" data-live-search="true" name="category" id="category">
                        @foreach ($categories as $category)
                            <option data-tokens="{{$category}}" @if($job->category==$category) selected @endif>{{$category}}
                            </option>
                        @endforeach
                    </select>
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                    <strong>Position:</strong><br>
                    <select class="selectpicker" data-live-search="true" name="position" id="position">
                        @foreach ($positions as $position)
                            <option data-tokens="{{$position}}" @if($job->position==$position) selected @endif>{{$position}}
                            </option>
                        @endforeach
                    </select>
                    </div>
                </div>                
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Job Nature :</strong><br>
                        @foreach ($jobtypes as $jobtype)
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="type" id="{{$jobtype}}" value="{{$jobtype}}"
                          @if($job->type==$jobtype) checked @endif
                          >
                          <label class="form-check-label" for="{{$jobtype}}">{{$jobtype}}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
              
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label class="form-label" for="experience"><strong>Number of years of experience</strong></label>
                        <input type="number" id="experience" class="form-control"  name="experience" min="0" value='{{$job->experience}}'>
                    @error('experience')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    
                    </div>
                </div>                
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label class="form-label" for="vacancy"><strong>Number of vacancies available :</strong></label>
                        <input type="number" id="vacancy" class="form-control" name="vacancy" min="0" value="{{$job->vacancy}}">
                    @error('vacancy')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror                        
                    </div>
                </div>                
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label class="form-label" for="salary"><strong>Salary:</strong></label>
                        <input type="number" id="salary" class="form-control" name="salary" min="0" value="{{$job->salary}}">
                        @error('salary')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
               
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Job Description:</strong>
                        
                         <textarea name="description" id="editor">
                         {{$job->description}}
                        </textarea>
                        
                    </div>
                </div>            
                
                <button type="submit" class="btnp btn-primary ml-3">Submit</button>
                <div class="col-xs-12 col-sm-12 col-md-12"></div>
                <div class="col-xs-12 col-sm-12 col-md-12"></div>  

                @if($company!=null) 
                    <input type="hidden" id="c_id" name="c_id" value="{{$company->id}}">
                @endif                
            </div>
        </form>

    </div>
    
<script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector('#editor') )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection
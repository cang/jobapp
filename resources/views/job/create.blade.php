@extends('layouts.aapp')
@section('content')
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Add Job</h2>
                </div>
                <div class="pull-right">
                    @if($company!=null) 
                        <a class="btnp btn-primary" href="{{ route('job.index') . '?c_id=' . $company->id }}"> Back</a>
                    @else
                        <a class="btnp btn-primary" href="{{ route('job.index') }}"> Back</a>
                    @endif
                </div>
            </div>
        </div>
        
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        
        <form action="{{ route('job.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                    <strong>Company:</strong><br>
                    <select class="selectpicker" data-live-search="true" name="company_id" id="company_id">
                        @foreach ($companies as $company1)
                            @if($company!=null) 
                                <option data-tokens="{{$company1->id}}" value="{{$company1->id}}" @if($company->id==$company1->id) selected @endif >{{$company1->name}}</option>
                            @else
                                <option data-tokens="{{$company1->id}}" value="{{$company1->id}}">{{$company1->name}}</option>
                            @endif
                        @endforeach
                    </select>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Title:</strong>
                        <input name="title" class="form-control" placeholder="Job Title">
                    @error('title')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Location:</strong>
                        <input name="location" class="form-control" placeholder="Location of Job, city , country">
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                    <strong>Category:</strong><br>
                    <select class="selectpicker" data-live-search="true" name="category" id="category">
                        @foreach ($categories as $category)
                            <option data-tokens="{{$category}}">{{$category}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                    <strong>Position:</strong><br>
                    <select class="selectpicker" data-live-search="true" name="position" id="position">
                        @foreach ($positions as $position)
                            <option data-tokens="{{$position}}">{{$position}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Job Nature :</strong><br>
                        @foreach ($jobtypes as $jobtype)
                        <div class="form-check form-check-inline">
                          <input class="btn-check" type="radio" name="type" id="{{$jobtype}}" value="{{$jobtype}}"  @if($jobtype==='Any') checked @endif>
                          <label class="form-check-label" for="{{$jobtype}}">{{$jobtype}}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
              
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label class="form-label" for="experience"><strong>Number of years of experience</strong></label>
                        <input type="number" id="experience" class="form-control"  name="experience" min="0" value='0'>
                    @error('experience')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label class="form-label" for="vacancy"><strong>Number of vacancies available :</strong></label>
                        <input type="number" id="vacancy" class="form-control" name="vacancy" min="0" value='0'>
                    @error('vacancy')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror                        
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label class="form-label" for="salary"><strong>Salary:</strong></label>
                        <input type="number" id="salary" class="form-control" name="salary" min="0" value='0'>
                        @error('salary')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Job Description:</strong>
                        
                         <textarea name="description" id="editor">
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


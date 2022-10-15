@extends('layouts.aapp')
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Add Company</h2>
                </div>
                <div class="pull-right">
                    <a class="btnp btn-primary" href="{{ route('company.index') }}"> Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Company Name">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <input type="email" name="email" class="form-control" placeholder="Company Email">
                        @error('email')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Phone:</strong>
                        <input type="tel" name="phone" class="form-control">
                        @error('phone')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
              
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Web site:</strong>
                        <input type="url" name="web" class="form-control" placeholder="Web site">
                        @error('web')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Address:</strong>
                        <input type="text" name="address" class="form-control" placeholder="Company Address">
                        @error('address')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Logo:</strong>
                        <input type="file" name="logo" class="form-control" accept="image/*" class="form-control-file" required="true">
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Company Information:</strong>
                        
                         <textarea name="info" id="editor">
                        </textarea>
                        
                    </div>
                </div>
                
                
                <button type="submit" class="btnp btn-primary ml-3">Submit</button>
                
                <div class="col-xs-12 col-sm-12 col-md-12"></div>
                <div class="col-xs-12 col-sm-12 col-md-12"></div>
                
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


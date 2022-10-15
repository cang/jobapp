@extends('layouts.aapp')
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                </div>
                <div class="pull-right mb-2">
                    <a class="btnp btn-outline-primary" href="{{ route('job.create') }}"> Create Job</a>
                </div>
            </div>
        </div>
        
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        
<!--        
        <div class="row">       
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Company:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Company Name">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>        
        </div>                
-->
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Position</th>
                    <th>type</th>
                    <th>vacancy</th>
<!--                    <th>salary</th> -->
<!--                    <th>Date</th> -->
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobs as $job)
                    <tr>
                        <td>{{ $job->title }}</td>
                        <td>{{ $job->category }}</td>
                        <td>{{ $job->position }}</td>
                        <td>{{ $job->type }}</td>
                        <td>{{ $job->vacancy }}</td>
                        <td>
                            <form action="{{ route('job.destroy',$job->id) }}" method="Post">
                                
                                <a class="btn btn-success btn-sm rounded-0" href="{{ route('job.edit',$job->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-edit"></i>Edit</a>
                                
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm rounded-0" type="submit" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {!! $jobs->links() !!}
    </div>
@endsection
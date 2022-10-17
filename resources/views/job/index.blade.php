@extends('layouts.aapp')
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                </div>
                <div class="pull-right mb-2">
                    @if($company!=null) 
                        <h4>Company : {{$company->name}}</h4>
                        <a class="btnp btn-outline-primary" href="{{ route('job.create') . '?c_id=' . $company->id }}"> Create Job</a>
                    @else
                        <a class="btnp btn-outline-primary" href="{{ route('job.create') }}"> Create Job</a>
                    @endif
                </div>
            </div>
        </div>
        
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Position</th>
                    <th>Company</th>
                    <th>type</th>
<!--                    <th>vacancy</th>    -->
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
                        <td>{{ $job->company->name }}</td>
                        <td>{{ $job->type }}</td>
                        <td>
                            <form action="{{ route('job.destroy',$job->id) }}" method="Post">
                                @csrf
                                
                                @if($company!=null) 
                                    <a class="btn btn-success btn-sm rounded-0" href="{{ route('job.edit',$job->id) . '?c_id=' . $company->id }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-edit"></i>Edit</a>
                                @else
                                    <a class="btn btn-success btn-sm rounded-0" href="{{ route('job.edit',$job->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-edit"></i>Edit</a>
                                @endif
                                
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm rounded-0" type="submit" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i> Delete</button>
                                
                                @if($company!=null) 
                                    <input type="hidden" id="c_id" name="c_id" value="{{$company->id}}">
                                @endif
                                
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {!! $jobs->links() !!}
    </div>
@endsection
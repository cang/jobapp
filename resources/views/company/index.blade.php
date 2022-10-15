@extends('layouts.aapp')
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                </div>
                <div class="pull-right mb-2">
<!--                    <a class="btn btn-success" href="{{ route('company.create') }}"> Create Company</a> -->
                    <a class="btnp btn-outline-primary" href="{{ route('company.create') }}"> Create Company</a>
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
                    <th>S.No</th>
                    <th>Company Name</th>
                    <th>Company Email</th>
                    <th>Company Address</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                    <tr>
                        <td>{{ $company->id }}</td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td>{{ $company->address }}</td>
                        
                        <td>
                            <form action="{{ route('company.destroy',$company->id) }}" method="Post">
                                
                                <a class="btn btn-success btn-sm rounded-0" href="{{ route('job.index',$company->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Jobs"><i class="fa fa-tasks"></i>Jobs</a>
                                
                                <a class="btn btn-success btn-sm rounded-0" href="{{ route('company.edit',$company->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-edit"></i>Edit</a>
                                
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm rounded-0" type="submit" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {!! $companies->links() !!}
    </div>
@endsection
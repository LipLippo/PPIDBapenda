@extends('layouts.app')


@section('content')

{{-- <p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p> --}}
<div class="container">
    <div class="row layout-top-spacing">
            <div class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">                                
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Create New Role</h4>
                        </div>
                    </div>
                </div>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                <div class="widget-content widget-content-area">
                   {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
                        <div class="form-group mb-4">
                            <label for="exampleFormControlInput2">Name</label>
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                            {{-- <input type="email" class="form-control" id="exampleFormControlInput2" placeholder="name@example.com"> --}}
                        </div>
                        <div class="form-group mb-4">
                            <label for="exampleFormControlInput2">Permission</label>
                            <br/>
                            <input type="checkbox" onchange="checkAll(this)" name="chk[]" ><br>
                           @foreach($permission as $value)
                                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                {{ $value->name }}</label>
                            <br/>
                            @endforeach
                        </div>
                        
                        <input type="submit" name="" class="mt-4 mb-4 btn btn-primary">
                        <a class="mt-4 mb-4 btn btn-secondary" href="{{ route('roles.index') }}"> Back</a>
                   {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
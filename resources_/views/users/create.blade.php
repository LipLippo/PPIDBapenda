@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row layout-top-spacing">
            <div class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">                                
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Buat Masteruser Baru</h4>
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
                   {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
                         {{-- {!! Form::select('roles[]', $roles,[], array('class' => 'form-control')) !!} --}}
                        <div class="form-group mb-4">
                            <label for="exampleFormControlInput2">Username</label>
                            {!! Form::text('name', null, array('placeholder' => 'Username','class' => 'form-control')) !!}
        
                            {{-- <input type="email" class="form-control" id="exampleFormControlInput2" placeholder="name@example.com"> --}}
                        </div>
                        <div class="form-group mb-4">
                            <label for="exampleFormControlInput2">Email address</label>
                            {!! Form::text('email', null, array('placeholder' => 'name@example.com','class' => 'form-control')) !!}
                            {{-- <input type="email" class="form-control" id="exampleFormControlInput2" placeholder="name@example.com"> --}}
                        </div>
                        <div class="form-group mb-4">
                            <label for="exampleFormControlInput2">Password</label>
                            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                            {{-- <input type="email" class="form-control" id="exampleFormControlInput2" placeholder="name@example.com"> --}}
                        </div>
                        <div class="form-group mb-4">
                            <strong>Confirm Password:</strong>
                            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                        </div>
                        <div class="form-group mb-4">
                            <label for="exampleFormControlSelect1">Role</label>
                            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control')) !!}
                            {{-- {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!} --}}
                        </div>
                        {{-- <div class="form-group mb-4">
                            <label for="exampleFormControlSelect2">Example multiple select</label>
                            <select multiple class="form-control" id="exampleFormControlSelect2">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                            </div> --}}
                            {{-- <div class="form-group mb-4">
                                <label for="exampleFormControlTextarea1">Example textarea</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="form-group mb-4 mt-3">
                                <label for="exampleFormControlFile1">Example file input</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div> --}}
                        <input type="submit" name="" class="mt-4 mb-4 btn btn-primary">
                        <a class="mt-4 mb-4 btn btn-secondary" href="{{ route('users.index') }}"> Back</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


                    
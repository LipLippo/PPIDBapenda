@extends('layouts.app')


@section('content')
<div class="layout-px-spacing">                
                    
    <div class="account-settings-container layout-top-spacing">

        <div class="account-content">
            <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                        <form id="general-info" class="section general-info">
                            <div class="info">
                                <h6 class="">Profile</h6>
                                <div class="row">
                                    <div class="col-lg-11 mx-auto">
                                        <div class="row">
                                            <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                <div class="form">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="fullName">Username</label>
                                                                <input type="text" name="name" class="form-control mb-4" id="fullName" placeholder="Full Name" value="{{ Auth::user()->name }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-8">
                                                             <div class="form-group">
                                                                <label for="profession">Email</label>
                                                                <input type="text" class="form-control mb-4" id="profession" placeholder=""  value="{{ Auth::user()->email }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="fullName">Password</label>
                                                                <input type="password" name="name" class="form-control mb-4" id="fullName" placeholder="Full Name" value="">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                             <div class="form-group">
                                                                <label for="profession">Confirm Pssword</label>
                                                                <input type="password" class="form-control mb-4" id="profession" placeholder=""  value="">
                                                            </div>
                                                        </div>
                                                    </div>
                            
                                                    <input type="submit" name="" class="mt-4 mb-4 btn btn-primary">
                                                    <a class="mt-4 mb-4 btn btn-secondary" href="{{ route('home') }}"> Back</a>
                                                                                                   
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-12 col-md-4">
                                                <div class="upload mt-4 pr-md-4"><br>
                                                    
                                                    <img src="{{ url('assets/img/200x200.jpg') }}" alt="" width="100px" height="100px">
                                                    {{-- <input type="file" id="input-file-max-fs"  /> --}}
                                                        <input type="file" class="custom-file-input" id="customFile" name="pdf" value="">
                                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                                    {{-- <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Picture</p> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
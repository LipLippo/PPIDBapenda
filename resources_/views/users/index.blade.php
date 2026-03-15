@extends('layouts.app')


@section('content')

<br><div class="layout-px-spacing">
  <div class="seperator-header">
      <h4 class="">Management User</h4>
  </div>
  <div class="row layout-spacing">
      <div class="col-lg-12">
          @if ($message = Session::get('success'))
            <div class="alert alert-light-success border-0 mb-4" role="alert"> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
                <strong>Success!</strong> {{ $message }}. 
            </div>
            @endif
          <div class="statbox widget box box-shadow">
            <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
              <div class="widget-content widget-content-area">
                  <table id="style-3" class="table style-3  table-hover">
                      <thead>
                          <tr>
                              <th class="checkbox-column text-center"> NO </th>
                              <th>Username</th>
                              <th>Email</th>
                              <th>Role</th>
                              <th>Act</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($data as $key => $user)
                          <tr>
                              <td class="checkbox-column text-center"> {{ ++$i }} </td>
                              {{-- <td>{{ ++$i }}</td> --}}
                              <td>{{ $user->name }}</td>
                              {{-- <td>{{ $user->username }}</td> --}}
                              <td>{{ $user->email }}</td>
                              <td >
                                @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                  
                                  <span class="shadow-none badge badge-primary">{{ $v }}</span>
                                @endforeach
                                @endif
                              </td>
                              <td >

                                 <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#reset{{ $user->id }}">Reset</button>
                                <a class="btn btn-primary btn-sm" href="{{ route('users.edit',$user->id) }}">Edit</a>
                                      
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#rotateleftModal{{ $user->id }}">Delete</button>
                                            
                                </a>
                              </td>
                          </tr>
                            <div id="rotateleftModal{{ $user->id }}" class="modal animated rotateInDownLeft custo-rotateInDownLeft" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                     <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus user</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                    <p class="modal-text">Anda yakin ingin menghapus user {{ $user->keterangan }}</p>
                                            </div>
                                            <div class="modal-footer md-button">
                                                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                                                @csrf
                                                @method('DELETE')
                                               
                                                <button type="submit" class="btn btn-danger">Ya, hapus</button>
                                                {{-- <button type="submit" class="btn btn-primary">Save</button> --}}
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="reset{{ $user->id }}" class="modal animated rotateInDownLeft custo-rotateInDownLeft" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    {{-- {!! Form::model($user, ['method' => 'PATCH','url' => ['reset_password', $user->id]]) !!} --}}
                                     <form action="{{ route('reset_password',$user->id) }}" method="POST" enctype="multipart/form-data">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Reset Password Default</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                </button>
                                            </div>
                                            <input type="hidden" name="id" value="{{ $user->id }}">
                                            <input type="hidden" name="password" value="jatengprov">
                                            <div class="modal-body">
                                                    <p class="modal-text">Anda yakin ingin merubah password user menjadi "jatengprov" ?</p>
                                            </div>
                                            <div class="modal-footer md-button">
                                                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                                                @csrf
                                                {{-- {{ method_field('PUT') }} --}}
                                                <button type="submit" class="btn btn-danger">Ya</button>
                                                {{-- <button type="submit" class="btn btn-primary">Save</button> --}}
                                            </div>
                                        </div>
                                    </form>
                                    {{-- {!! Form::close() !!} --}}
                                </div>
                            </div>
                          @endforeach
                          
                      </tbody>
                  </table>
                  {{-- {!! $data->render() !!} --}}
              </div>
          </div>
      </div>
  </div>

</div>
@endsection


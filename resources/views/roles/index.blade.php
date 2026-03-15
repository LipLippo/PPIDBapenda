@extends('layouts.app')


@section('content')

<br><div class="layout-px-spacing">
  <div class="seperator-header">
      <h4 class="">Management Role</h4>
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
            @can('mod-roles-create')
            <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
            @endcan
              <div class="widget-content widget-content-area">
                  <table id="style-3" class="table style-3  table-hover">
                      <thead>
                          <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th width="280px">Action</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($roles as $key => $role)
                          <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                {{-- <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a> --}}
                                @can('mod-roles-edit')
                                    <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                                @endcan
                                
                                @can('mod-roles-delete')
                                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                @endcan
                            </td>
                          </tr>
                          @endforeach
                          
                      </tbody>
                  </table>
                  {{-- {!! $roles->render() !!} --}}
              </div>
          </div>
      </div>
  </div>

</div>

@endsection
@extends('apps.layouts.main')
@section('header.title')
Agrinesia Mitra Dashboard | User Management
@endsection
@section('header.styles')
<link href="{{ asset('assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="page-content">
	<div class="row">
		<div class="col-md-12">
			<div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-database"></i>User Database 
                    </div>
                    <div class="tools"> </div>
                </div>
                <div class="portlet-body">
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
                    @can('Can Create User')
                    <div class="col-md-6">
                        <div class="form-group">
                            <tr>
                                <td>
                                    <a class="btn red btn-outline sbold" data-toggle="modal" href="#basic"> Add User </a>
                                </td>
                            </tr>
                        </div>
                    </div>
                    @endcan
                    <div class="col-md-6">
                        <div class="modal fade" id="basic" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    {!! Form::open(array('route' => 'user.store','method'=>'POST')) !!}
                                    @csrf
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                        <h4 class="modal-title">Tambah User Baru</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Name</label>
                                                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">                                        
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Password</label>
                                                    {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Confim Password</label>
                                                    {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                                                </div>
                                            </div>                                
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Email</label>
                                                    {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Roles</label>
                                                    {!! Form::select('roles[]', [null=>'Please Select'] + $roles,[], array('class' => 'form-control')) !!}
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="modal-footer">
                                        <button type="close" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                        <button id="register" type="submit" class="btn green">Save changes</button>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                	<table class="table table-striped table-bordered table-hover" id="sample_2">
                		<thead>
                			<tr>
                                <th>No</th>
                				<th>Name</th>
                				<th>Email</th>
                				<th>Roles</th>
                				<th>Status</th>
                				<th>Last Login</th>
                				<th>Created At</th>
                				<th></th>
                			</tr>
                		</thead>
                		<tbody>
                            @foreach($users as $key => $user)
                			<tr>
                				<td>{{ $key+1 }}</td>
                				<td>{{ $user->name }}</td>
                				<td>{{ $user->email }}</td>
                				<td>
                                    @if(!empty($user->getRoleNames()))
                                    @foreach($user->getRoleNames() as $v)
                                    <label class="label label-sm label-success">{{ $v }}</label>
                                    @endforeach
                                    @endif            
                                </td>
                				<td>
                                    @if($user->status_id == '2b643e21-a94c-4713-93f1-f1cbde6ad633')
                                    <label class="label label-sm label-info">{{ $user->Statuses->name }}</label>
                                    @else
                                    <label class="label label-sm label-danger">{{ $user->Statuses->name }}</label>
                                    @endif
                                </td>
                				<td>
                                    @if(!empty($user->last_login_at)) 
                                    {{date("d F Y H:i",strtotime($user->last_login_at)) }}
                                    @endif            
                                </td>
                				<td>{{date("d F Y H:i",strtotime($user->created_at)) }}</td>
                				<td>
                                    <a class="btn btn-xs btn-info modalMd" href="#" value="{{ action('Admin\UserController@userShow',['id'=>$user->id]) }}" title="Lihat User" data-toggle="modal" data-target="#modalMd"><i class="fa fa-search"></i></a>
                                    <a class="btn btn-xs btn-success modalMd" href="#" value="{{ action('Admin\UserController@userEdit',['id'=>$user->id]) }}" title="Edit User" data-toggle="modal" data-target="#modalMd"><i class="fa fa-edit"></i></a>
                                    {!! Form::open(['method' => 'POST','route' => ['user.suspend', $user->id],'style'=>'display:inline','onsubmit' => 'return ConfirmSuspend()']) !!}
                                    {!! Form::button('<i class="fa fa-close"></i>',['type'=>'submit','class' => 'btn btn-xs btn-danger','title'=>'Suspend User']) !!}
                                    {!! Form::close() !!}
                                    {!! Form::open(['method' => 'POST','route' => ['user.destroy', $user->id],'style'=>'display:inline','onsubmit' => 'return ConfirmDelete()']) !!}
                                    {!! Form::button('<i class="fa fa-trash"></i>',['type'=>'submit','class' => 'btn btn-xs btn-danger','title'=>'Suspend User']) !!}
                                    {!! Form::close() !!}
                                </td>
                			</tr>
                            @endforeach
                		</tbody>
                	</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer.plugins')
<script src="{{ asset('assets/global/scripts/datatable.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
@endsection
@section('footer.scripts')
<script src="{{ asset('assets/pages/scripts/table-datatables-buttons.min.js') }}" type="text/javascript"></script>
<script>
    function ConfirmDelete()
    {
    var x = confirm("User Delete?");
    if (x)
        return true;
    else
        return false;
    }
</script>
<script>
    function ConfirmSuspend()
    {
    var x = confirm("User Suspend?");
    if (x)
        return true;
    else
        return false;
    }
</script>
@endsection
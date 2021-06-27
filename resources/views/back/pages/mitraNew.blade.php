@extends('back.layouts.main')
@section('header.title')
Agrinesia Sales Dashboard | New Register Mitra
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
                        <i class="fa fa-database"></i>New Register Mitra 
                    </div>
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <tr>
                                <td>
                                    <a class="btn red btn-outline sbold" data-toggle="modal" href="#basic"> Add Data </a>
                                </td>
                            </tr>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="modal fade" id="basic" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    {!! Form::open(array('route' => 'newMitra.import','method'=>'POST','files' => 'true')) !!}
                                    @csrf
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                        <h4 class="modal-title">Add New Mitra Register Data</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Mitra Name</label>
                                                    {!! Form::file('mitra_baru', null, array('placeholder' => 'Raw Data','class' => 'form-control')) !!}
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Area</label>
                                                    {!! Form::file('mitra_baru', null, array('placeholder' => 'Raw Data','class' => 'form-control')) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="close" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                        <button id="register" type="submit" class="btn green">Submit</button>
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
                				<th>Nama Mitra</th>
                                <th>Area</th>
                                <th>Sales</th>
                                <th>Status</th>
                                <th>Register On</th>
                                <th>Completed On</th>
                                <th>Time Diff</th>
                				<th></th>
                			</tr>
                		</thead>
                		<tbody>
                            @foreach($data as $key => $mitra)
                            <tr>
                				<td>{{ $key+1 }}</td>
                                <td>{{ $mitra->registrant_name }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
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
    var x = confirm("Are you sure you want to deactivate?");
    if (x)
        return true;
    else
        return false;
    }
</script>
@endsection
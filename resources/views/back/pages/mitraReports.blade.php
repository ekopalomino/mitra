@extends('back.layouts.main')
@section('header.title')
Agrinesia Sales Dashboard | Mitra Sales Report
@endsection
@section('header.plugins')
<link href="{{ asset('assets/global/plugins/bootstrap-multiselect/css/bootstrap-multiselect.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="page-content">
	<div class="portlet box red ">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-database"></i> Mitra Sales Reports Query
			</div>
		</div>
		<div class="portlet-body form">
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
			<div class="form-body">
				<div class="row">
					<div class="col-md-4">
						<div class="portlet box blue-hoki">
							<div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i>Info Penjualan 
                                </div>
                            </div>
                            <div class="portlet-body">
                            	<div class="row">
                            		<div class="col-md-12">
                            			<div class="form-group">
											<label class="control-label">Area</label>
											<select class="mt-multiselect btn btn-default" multiple="multiple" data-label="left" data-width="100%" data-filter="true" data-height="300">
												@foreach($areas as $area)
												<option value="{{$area}}">{{$area}}</option>
												@endforeach
											</select>
										</div>    		
										<div class="form-group">
											<label class="control-label">Mitra Name</label>
											<select class="mt-multiselect btn btn-default" multiple="multiple" data-label="left" data-width="100%" data-filter="true" data-height="300">
												@foreach($mitra as $cust)
												<option value="{{$cust}}">{{$cust}}</option>
												@endforeach
											</select>
										</div>
										<div class="form-group">
											<label class="control-label">Mitra Type</label>
											<select class="mt-multiselect btn btn-default" multiple="multiple" data-label="left" data-width="100%" data-filter="true" data-height="300">
												<option value="1">Mitra A</option>
												<option value="2">Mitra B</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="portlet box blue-hoki">
							<div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i>Tanggal Pembelian 
                                </div>
                            </div>
                            <div class="portlet-body">
                            	<div class="row">
                            		<div class="col-md-12">    		
										<div class="form-group">
											<label class="control-label">From</label>
											{!! Form::date('from_date', '', array('id' => 'datepicker','class' => 'form-control')) !!}
										</div>
										<div class="form-group">
											<label class="control-label">To</label>
											{!! Form::date('to_date', '', array('id' => 'datepicker','class' => 'form-control')) !!}
										</div>
										<div class="form-group">
											<label class="control-label">Day</label>
											<select class="mt-multiselect btn btn-default" multiple="multiple" data-label="left" data-width="100%" data-filter="true" data-height="300">
												@foreach($days as $day)
												<option value="{{$day}}">{{$day}}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="portlet box blue-hoki">
							<div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i>Info Produk 
                                </div>
                            </div>
                            <div class="portlet-body">
                            	<div class="row">
                            		<div class="col-md-12">
                            			<div class="form-group">
											<label class="control-label">Brand</label>
											<select class="mt-multiselect btn btn-default" multiple="multiple" data-label="left" data-width="100%" data-filter="true" data-height="300">
												@foreach($brands as $brand)
												<option value="{{$brand}}">{{$brand}}</option>
												@endforeach
											</select>
										</div>
										<div class="form-group">
											<label class="control-label">Varian</label>
											<select class="mt-multiselect btn btn-default" multiple="multiple" data-label="left" data-width="100%" data-filter="true" data-height="300">
												@foreach($varian as $var)
												<option value="{{$var}}">{{$var}}</option>
												@endforeach
											</select>
										</div>    		
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-actions left">
					<button type="submit" class="btn blue">
						<i class="fa fa-search"></i> Search
					</button>
				</div>
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection
@section('footer.plugins')
<script src="{{ asset('assets/global/plugins/bootstrap-multiselect/js/bootstrap-multiselect.js') }}" type="text/javascript"></script>
@endsection
@section('footer.scripts')
<script src="{{ asset('assets/pages/scripts/components-bootstrap-multiselect.min.js') }}" type="text/javascript"></script>
@endsection
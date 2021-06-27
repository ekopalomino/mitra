@extends('back.layouts.main')
@section('header.title')
Agrinesia Sales Dashboard | Mitra Sales Report
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
											{!! Form::select('areas', [null=>'Please Select'] + $areas,[], array('class' => 'form-control')) !!}
										</div>    		
										<div class="form-group">
											<label class="control-label">Mitra Name</label>
											{!! Form::select('mitra_name', [null=>'Please Select'] + $mitra,[], array('class' => 'form-control')) !!}
										</div>
										<div class="form-group">
											<label class="control-label">Mitra Type</label>
											<select id="single" name="supplier_code" class="form-control select2">
												<option value="">Please Select</option>
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
											{!! Form::select('days', [null=>'Please Select'] + $days,[], array('class' => 'form-control')) !!}
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
											{!! Form::select('brands', [null=>'Please Select'] + $brands,[], array('class' => 'form-control')) !!}
										</div>
										<div class="form-group">
											<label class="control-label">Varian</label>
											{!! Form::select('varian', [null=>'Please Select'] + $varian,[], array('class' => 'form-control')) !!}
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
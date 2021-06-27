@extends('apps.layouts.main') 
@section('content')
<div class="page-content">
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
	<div class="row">
		<div class="col-md-12">
			{!! Form::model($user, ['method' => 'POST','route' => ['user.update', $user->id]]) !!}
            @csrf
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
                        <label class="control-label">Unit Kerja</label>
                        {!! Form::select('division_id', $ukers,old('division_id'), array('class' => 'form-control')) !!}
                    </div>
                </div>                                                              
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Hak Akses</label>
                        {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control')) !!}
                    </div>
                </div>
            </div> 
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Gudang</label>
                            <div class="mt-checkbox-list">
                                <label class="mt-checkbox mt-checkbox-outline">
                                    <input type="checkbox" name="warehouse_name[]" value="Gudang Utama"
                                    @foreach($userLocations as $warehouse)
                                        @if($warehouse->warehouse_name == 'Gudang Utama')checked
                                        @endif
                                    @endforeach
                                    > 
                                    Gudang Utama
                                    <span></span>
                                </label>
                                <label class="mt-checkbox mt-checkbox-outline">
                                    <input type="checkbox" name="warehouse_name[]" value="Gudang Pengiriman"
                                    @foreach($userLocations as $warehouse)
                                        @if($warehouse->warehouse_name == 'Gudang Pengiriman')checked
                                        @endif
                                    @endforeach
                                    > Gudang Pengiriman
                                    <span></span>
                                </label>
                                <label class="mt-checkbox mt-checkbox-outline">
                                    <input type="checkbox" name="warehouse_name[]" value="Gudang Produksi"
                                    @foreach($userLocations as $warehouse)
                                        @if($warehouse->warehouse_name == 'Gudang Produksi')checked
                                        @endif
                                    @endforeach
                                    > Gudang Produksi
                                    <span></span>
                                </label>
                                <label class="mt-checkbox mt-checkbox-outline">
                                    <input type="checkbox" name="warehouse_name[]" value="Gudang Scrap"
                                    @foreach($userLocations as $warehouse)
                                        @if($warehouse->warehouse_name == 'Gudang Scrap')checked
                                        @endif
                                    @endforeach
                                    > Gudang Scrap
                                    <span></span>
                                </label>
                                <label class="mt-checkbox mt-checkbox-outline">
                                    <input type="checkbox" name="warehouse_name[]" value="Gudang Retur"
                                    @foreach($userLocations as $warehouse)
                                        @if($warehouse->warehouse_name == 'Gudang Retur')checked
                                        @endif
                                    @endforeach
                                    > Gudang Retur
                                    <span></span>
                                </label>
                            </div>
                    </div>
                </div>                                                              
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Status</label>
                        {!! Form::select('status_id', array('2b643e21-a94c-4713-93f1-f1cbde6ad633'=>'Active','82e9ec8c-5a82-4009-ba2f-ab620eeaa71a'=>'Suspended'),old('status_id'), array('class' => 'form-control')) !!}
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
@endsection

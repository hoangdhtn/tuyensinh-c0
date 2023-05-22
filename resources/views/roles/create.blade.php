@extends('layouts.app')
{{-- @section('page-title')
<h4 class="m-0">Users Management</h4>
@endsection --}}
@section('content')
<div class="page">
    <div class="page-content container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
            <!-- general form elements -->
<div class="col-md-12">
     @if(Session::has('success'))
                <div class="alert  alert-success alert-dismissible" role="alert">
                    <div class="toast toast-just-text toast-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        {{Session::get('success')}}
                        @php
                        Session::forget('success');
                        @endphp
                    </div>
                </div>
                @endif
                @if(Session::has('fail'))
                <div class="alert  alert-danger alert-dismissible" role="alert">
                    <div class="toast toast-just-text toast-error">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        {{Session::get('fail')}}
                        @php
                        Session::forget('fail');
                        @endphp
                    </div>
                </div>
                @endif
                @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert  alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    {{ $error }}
                </div>
                @endforeach
                @endif
     <div class="panel">
                    <div class="panel-body container-fluid">

        <h2 class="card-title">Thêm vai trò mới</h2>
                <div class="card-tools">
                <a class="btn btn-success" href="{{ route('roles.index') }}"><i class="fas fa-angle-double-left"></i> Quay lại danh sách</a>
            </div>
        <!-- /.card-header -->
        <!-- form start -->
        {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
        <div class="card-body">

                <div class="form-horizontal">
                    <div class="form-group">
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br>
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label for="inputName" class="col-md-2 col-form-label">Tên</label>
                        <div class="col-md-10">
                            {!! Form::text('name', null, array('placeholder' => 'Tên','class' => 'form-control')) !!}

                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="inputPermission" class="col-md-2 col-form-label">Quyền</label>
                        <div class="col-md-10">

                            <div class="row">
                                <?php
$abc = "";
$len = count($permission);
?>
                                @foreach($permission as $key => $value)

                                    <?php

if ($key === 0) {
	echo '<div class="col-lg-4">';
}

if ($abc != substr($value->name, 0, strpos($value->name, "-")) && $key === 0) {
	$abc = substr($value->name, 0, strpos($value->name, "-"));

	echo '<label>' . $abc . '</label><div class="block">';

} else if ($abc != substr($value->name, 0, strpos($value->name, "-")) && $key !== 0) {
	$abc = substr($value->name, 0, strpos($value->name, "-"));
	echo '</div></div><div class="col-lg-4">';
	echo '<label>' . $abc . '</label><div class="block">';
}

?>
                                                                        {{-- {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }} --}}
                                                                        <input type="checkbox" class="icheckbox-primary" name="permission[]" value="{{ $value->id }}"
                                    data-plugin="iCheck" data-checkbox-class="icheckbox_flat-blue"
                                  />
                                                                        {{ $value->name }}
                                                                        <br />
                                                                        <?php
if ($key === $len - 1) {
	echo '</div></div>';
}
?>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>

        </div>
        <!-- /.card-body -->

        <button type="submit" class="btn btn-primary float-right">Tạo</button>
        {!! Form::close() !!}
    </div> </div>
    <!-- /.card -->
</div>
    </div>
</div>
</div>
@endsection

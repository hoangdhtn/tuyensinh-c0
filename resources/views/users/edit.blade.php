@extends('layouts.app')
{{-- @section('page-title')
<h4 class="m-0">Users Management</h4>
@endsection --}}
@section('content')
<div class="page">
  <div class="page-content container-fluid">
    <div class="panel">
      <div class="panel-body container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
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
            {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
            <div class="row">
              <div class="form-group col-md-6">
                <label class="form-control-label" for="inputBasicFirstName">Tên</label>
                {!! Form::text('name', null, array('value' => '{{ old("name") }}', 'placeholder' => 'Tên','class' => 'form-control')) !!}
                <span class="text-danger">{{ $errors->first('name') }}</span>
              </div>
              <div class="form-group col-md-6">
                <label class="form-control-label" for="inputBasicLastName">Email</label>
                {!! Form::text('email', null, array('value' => '{{ old("email") }}', 'placeholder' => 'Email','class' => 'form-control')) !!}
                <span class="text-danger">{{ $errors->first('email') }}</span>
              </div>
            </div>
            <div class="form-group">
              <label class="form-control-label" for="inputBasicEmail">Mật khẩu</label>
              {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
              <span class="text-danger">{{ $errors->first('password') }}</span>
            </div>
            <div class="form-group">
              <label class="form-control-label" for="inputBasicPassword">Nhập lại mật khẩu</label>
              {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
              <span class="text-danger">{{ $errors->first('confirm-password') }}</span>
            </div>
            <div class="form-group">
              <!-- Example Multi-Select Public Methods -->
              <div class="example-wrap">
                <label class="form-control-label">Quyền</label>
                <div class="example">
                  <select class="multi-select-methods form-control" multiple name="roles[]">
                    @foreach($roles as $r)
                    <option na value="{{ $r }}">{{ $r}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="example-buttons">
                  <button class="btn btn-primary btn-outline" id="buttonSelectAll" type="button">Chọn tất cả</button>
                  <button class="btn btn-primary btn-outline" id="buttonDeselectAll" type="button">Bỏ chọn tất cả</button>
                  <button class="btn btn-primary btn-outline" id="buttonRefresh" type="button">Làm mới</button>
                </div>
              </div>
              <!-- End Example Multi-Select Public Methods -->
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary float-right">Tạo</button>
            </div>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

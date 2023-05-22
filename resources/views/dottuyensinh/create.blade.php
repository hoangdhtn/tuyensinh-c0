@extends('layouts.app')
{{-- @section('page-title')
<h4 class="m-0">Users Management</h4>
@endsection --}}
@section('content')
<div class="page">
    <div class="page-content container-fluid">
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

                <div class="panel">
                    <div class="panel-body container-fluid">
                        <div class="card">
                            <h2 class="card-title">Thêm đợt tuyển sinh</h2>
                            <div class="card-tools">
                                @can('user-create')
                                <a class="btn btn-success" href="{{ route('dottuyensinh.index') }}"><i class="fas fa-plus-square"></i> Quay lại </a>
                                @endcan
                            </div>
                        </div>
                        {!! Form::open(array('route' => 'dottuyensinh.store','method'=>'POST')) !!}
                        <div class="form-group">
                            <label class="form-control-label" for="inputBasicFirstName">Tiêu đề</label>
                            {!! Form::text('tieude', null, array('value' => '{{ old("tieude") }}', 'placeholder' => 'Tiêu đề','class' => 'form-control')) !!}
                            <span class="text-danger">{{ $errors->first('tieude') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="inputBasicFirstName">Mã đợt tuyển sinh</label>
                            <input value="{{ old("msts") }}" type="text" class="form-control" id="inputPlaceholder" placeholder="Mã đợt tuyển sinh" name="msts">
                            <span class="text-danger">{{ $errors->first('msts') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="inputBasicFirstName">Thời gian</label>
                            <div class="example datepair-wrap" data-plugin="datepair">
                                <div class="input-daterange-wrap">
                                    <div class="input-daterange">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="icon wb-calendar" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                            <input value="{{ old("ngay_batdau") }}" type="text" class="form-control datepair-date datepair-start" data-plugin="datepicker" name="ngay_batdau">
                                            <span class="text-danger">{{ $errors->first('ngay_batdau') }}</span>
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="icon wb-time" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                            <input value="{{ old("gio_batdau") }}" type="text" class="timepicker form-control" data-plugin="clockpicker" data-autoclose="true" name="gio_batdau">
                                            <span class="text-danger">{{ $errors->first('gio_batdau') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-daterange-to">tới</div>
                                <div class="input-daterange-wrap">
                                    <div class="input-daterange">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="icon wb-calendar" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                            <input value="{{ old("ngay_ketthuc") }}" type="text" class="form-control datepair-date datepair-end" data-plugin="datepicker" name="ngay_ketthuc">
                                            <span class="text-danger">{{ $errors->first('ngay_ketthuc') }}</span>
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="icon wb-time" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                            <input value="{{ old("gio_ketthuc") }}" type="text" class="timepicker form-control" data-plugin="clockpicker" data-autoclose="true" name="gio_ketthuc">
                                            <span class="text-danger">{{ $errors->first('gio_ketthuc') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="inputBasicFirstName">Chỉ tiêu</label>
                            <input value="{{ old("chi_tieu") }}" type="text" class="form-control" id="inputPlaceholder" placeholder="Số lượng chỉ tiêu" name="chi_tieu">
                            <span class="text-danger">{{ $errors->first('chi_tieu') }}</span>
                        </div>
                        <div class="form-gruop">
                            <label class="form-control-label" for="inputBasicFirstName">Quy định</label>
                            <textarea id="summernote" data-plugin="summernote" name="quy_dinh">{{ old("quy_dinh") }}</textarea>
                            <span class="text-danger">{{ $errors->first('quy_dinh') }}</span>
                        </div>
                        <div class="form-gruop">
                            <label class="form-control-label" for="inputBasicFirstName">Hồ sơ tuyển sinh</label>
                            <textarea id="summernote" name="hoso_tuyensinh" id="summernote" data-plugin="summernote">{{ old("hoso_tuyensinh") }}</textarea>
                            <span class="text-danger">{{ $errors->first('hoso_tuyensinh') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="inputBasicFirstName">Trạng thái</label>
                            <select class="form-control" data-plugin="select2" name="trangthai">
                                <option value="1">Mở</option>
                                <option value="0">Đóng</option>
                            </select>
                            <span class="text-danger">{{ $errors->first('trangthai') }}</span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary float-right">Tạo</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>
@endsection

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
                        <div class="card">
                            <h2 class="card-title">Tuyển sinh</h2>
                            <div class="card-tools">
                                @can('user-create')
                                <a class="btn btn-success" href="{{ route('dottuyensinh.create') }}"><i class="fas fa-plus-square"></i> Thêm đợt tuyển sinh</a>
                                @endcan
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
                                    <thead>
                                        <tr>
                                            <th >STT</th>
                                            <th>Tiêu đề</th>
                                            <th>Ngày bắt đầu</th>
                                            <th>Giờ bắt đầu</th>
                                            <th>Ngày kết thúc</th>
                                            <th>Giờ kết thúc</th>
                                            <th>Chỉ tiêu</th>
                                            <th>Trạng thái</th>
                                            <th class="text-center">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1; @endphp
                                        @foreach($dottuyensinh as $p)
                                        <tr>
                                            <td>@php echo $i; @endphp</td>
                                            <td>{{ $p->tieude}}</td>
                                            <td>{{ $p->ngay_batdau}}</td>
                                            <td>{{ $p->gio_batdau}}</td>
                                            <td>{{ $p->ngay_ketthuc}}</td>
                                            <td>{{ $p->gio_ketthuc}}</td>
                                            <td>{{ $p->chi_tieu}}</td>
                                            <td>{{ $p->trangthai}}</td>
                                            <td class="text-center">
                                                <a class="btn btn-sm btn-primary" href="{{ route('dottuyensinh.show',$p->id) }}">Chi tiết</a>
                                                @can('dottuyensinh-edit')
                                                <a class="btn btn-sm btn-primary" href="{{ route('dottuyensinh.edit',$p->id) }}">Sửa</a>
                                                @endcan
                                                @can('dottuyensinh-delete')
                                                <form action="{{ route('dottuyensinh.destroy', $p->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger" data-target="#examplePositionCenter{{ $p->id }}" data-toggle="modal"
                                                    type="button">Xóa</button>
                                                    <!-- Modal -->
                                                    <div class="modal fade modal-danger" id="examplePositionCenter{{ $p->id }}" aria-hidden="true" aria-labelledby="examplePositionCenter"
                                                        role="dialog" tabindex="-1">
                                                        <div class="modal-dialog modal-simple modal-center">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                    </button>
                                                                    <h4 class="modal-title">Thông báo</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Khi xóa quyền này sẽ mất vĩnh viễn trên hệ thống</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                                                                    <button type="submit" class="btn btn-danger">Đồng ý</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Modal -->
                                                </form>
                                                @endcan
                                            </td>
                                        </tr>
                                        @php $i++; @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>
@endsection

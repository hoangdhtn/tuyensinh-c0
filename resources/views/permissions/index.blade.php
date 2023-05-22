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
                        <h2 class="card-title">Quản lý quyền</h2>
                        <div class="card-tools">
                            <button type="button" class="btn btn-success btn-create" data-toggle="modal" data-target="#PermissionModal">
                            <i class="fas fa-plus-square"></i> Thêm quyền
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            {{-- <table id="permission_table" class="table table-bordered data-table">
                                <thead>
                                    <tr class="bg-blue">
                                        <th width="50px">No</th>
                                        <th>Name</th>
                                        <th width="150px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table> --}}
                            <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
                                <thead>
                                    <tr>
                                        <th >STT</th>
                                        <th>Tên</th>
                                        <th class="text-center">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach($permissions as $p)
                                    <tr>
                                        <td>@php echo $i; @endphp</td>
                                        <td>{{ $p->name}}</td>
                                        <td class="text-center">
                                            @can('permission-edit')
                                            <a class="btn btn-sm btn-primary" href="{{ route('permissions.edit',$p->id) }}">Sửa</a>
                                            @endcan
                                            @can('permission-delete')
                                            <form action="{{ route('permissions.destroy', $p->id) }}" method="POST" style="display: inline;">
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
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- Modal UpadateOrCreate Permission -->
            <div class="modal fade" id="PermissionModal">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <form method="POST" action="" id="permissionForm">
                            @csrf
                            <div class="modal-header">
                                <h4 class="modal-title">Thêm quyền</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="_method" id="permission_method" value="POST">
                                <input type="hidden" name="id" id="id" value="">
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Tên</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Tên" value="" required>
                                        @error('name')
                                        <p class="mt-2 mb-0 error text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                <button type="submit" class="btn btn-primary" id="savedata">Lưu</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </div>
    </div>
</div>
@endsection

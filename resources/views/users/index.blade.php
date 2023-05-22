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
                            <h2 class="card-title">Quản lý người dùng hệ thống</h2>
                            <div class="card-tools">
                                @can('user-create')
                                <a class="btn btn-success" href="{{ route('users.create') }}"><i class="fas fa-plus-square"></i> Thêm người dùng</a>
                                @endcan
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive">
                                <table class="table table-striped table-bordered">
                                    <tr class="bg-blue text-center">
                                        <th width="50px">STT</th>
                                        <th>Tên</th>
                                        <th>Email</th>
                                        <th>Quyền</th>
                                        <th width="150px">Thao tác</th>
                                    </tr>
                                    @foreach ($users as $key => $user)
                                    <tr>
                                        <td class="text-center">{{ ++$key }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td class="text-center">
                                            @if(!empty($user->getRoleNames()))
                                            @foreach($user->getRoleNames() as $v)
                                            <label class="badge badge-success">{{ $v }}</label>
                                            @endforeach
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @can('user-edit')
                                            <a class="btn btn-sm btn-primary" href="{{ route('users.edit',$user->id) }}">Sửa</a>
                                            @endcan
                                            @can('user-delete')
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger" data-target="#examplePositionCenter" data-toggle="modal"
                                                type="button">Xóa</button>
                                                <!-- Modal -->
                                                <div class="modal fade modal-danger" id="examplePositionCenter" aria-hidden="true" aria-labelledby="examplePositionCenter"
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
                                                                <p>Khi xóa người dùng này sẽ mất vĩnh viễn trên hệ thống</p>
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
                                    @endforeach
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <div class="float-left">
                                    <div class="dataTables_info">
                                        Hiển thị {{ $users->firstItem() }} trong số {{ $users->lastItem() }} đến {{ $users->total() }} người dùng
                                    </div>
                                </div>
                                <div class="float-right">
                                    {{ $users->links() }}
                                </div>
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

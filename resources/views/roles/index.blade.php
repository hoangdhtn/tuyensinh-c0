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

                <div class="panel">
                    <div class="panel-body container-fluid">
                        <h2 class="card-title">Quản lý vai trò</h2>
                        <div class="card-tools">
                            <a class="btn btn-success" href="{{ route('roles.create') }}"><i class="fas fa-plus-square"></i> Thêm vai trò</a>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-striped table-bordered">
                                <tr class="bg-blue text-center">
                                    <th width="50px">STT</th>
                                    <th>Tên</th>
                                    <th width="150px">Thao tác</th>
                                </tr>
                                @foreach ($roles as $key => $role)
                                <tr>
                                    <td class="text-center">{{ ++$key }}</td>
                                    <td class="text-center">{{ $role->name }}</td>
                                    <td class="text-center">
                                        @can('role-edit')
                                        <a class="btn btn-sm btn-primary" href="{{ route('roles.edit',$role->id) }}">Sửa</a>
                                        @endcan
                                        @can('role-delete')
                                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" data-target="#examplePositionCenter{{ $role->id }}" data-toggle="modal"
                                            type="button">Xóa</button>
                                            <!-- Modal -->
                                            <div class="modal fade modal-danger" id="examplePositionCenter{{ $role->id }}" aria-hidden="true" aria-labelledby="examplePositionCenter"
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
                                @endforeach
                            </table>
                            {!! $roles->render() !!}
                        </div>
                        <div class="float-left">
                            <div class="dataTables_info">
                                Showing {{ $roles->firstItem() }} to {{ $roles->lastItem() }} of {{ $roles->total() }} entries
                            </div>
                        </div>
                        <div class="float-right">
                            {{ $roles->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

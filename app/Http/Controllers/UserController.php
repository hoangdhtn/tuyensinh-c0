<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use DB;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;

class UserController extends Controller {
	function __construct() {
		$this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index', 'store']]);
		$this->middleware('permission:user-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:user-delete', ['only' => ['destroy']]);
	}
	public function index(Request $request) {

		$users = User::orderBy('id', 'DESC')->paginate(5);

		return view('users.index', compact('users'));

	}

	public function create() {
		if (auth()->user()->hasRole('Super-Admin')) {
			$roles = Role::pluck('name', 'name')->all();
		} else {
			$roles = Role::pluck('name', 'name')->except(['name', 'Super-Admin']);
		}

		return view('users.create', compact('roles'));
	}

	public function store(Request $request) {
		$this->validate($request, [
			'name' => 'required',
			'email' => 'required|email|unique:users,email',
			'password' => 'required',
			'confirm-password' => 'required|same:password',
			'roles' => 'required',
		]);

		$input = $request->all();
		$input['password'] = Hash::make($input['password']);

		$user = User::create($input);
		$user->assignRole($request->input('roles'));

		return redirect()->route('users.index')
			->with('success', 'Tạo người dùng thành công');
	}

	public function show($id) {
		return redirect()->route('users.index');
	}

	public function edit($id) {
		$user = User::find($id);
		if ($user->hasRole('Super-Admin')) {
			return redirect()->route('users.index')->with('fail', "Bạn không có quyền chỉnh sửa người dùng này");
		}
		if (auth()->user()->hasRole('Super-Admin')) {
			$roles = Role::pluck('name', 'name')->all();
		} else {
			$roles = Role::pluck('name', 'name')->except(['name', 'Super-Admin']);
		}
		$userRole = $user->roles->pluck('name', 'name')->all();

		return view('users.edit', compact('user', 'roles', 'userRole'));
	}

	public function update(Request $request, $id) {
		$this->validate($request, [
			'name' => 'required',
			'email' => 'required|email|unique:users,email,' . $id,
			'password' => 'same:confirm-password',
			'roles' => 'required',
		]);

		$input = $request->all();
		if (!empty($input['password'])) {
			$input['password'] = Hash::make($input['password']);
		} else {
			$input = Arr::except($input, array('password'));
		}

		$user = User::find($id);
		$user->update($input);
		DB::table('model_has_roles')->where('model_id', $id)->delete();

		$user->assignRole($request->input('roles'));

		return redirect()->route('users.index')
			->with('fail', "Cập nhật người dùng thành công");
	}

	public function destroy($id) {
		$user = User::find($id);

		if (auth()->id() == $id) {

			return redirect()->route('users.index')
				->with('fail', "Bạn không thể xóa bản thân");

		}
		if ($user->hasRole('Super-Admin')) {

			return redirect()->route('users.index')
				->with('fail', "Bạn không có quyền xóa người dùng này");
		}
		$user->delete();

		return redirect()->route('users.index')
			->with('success', "Xóa người dùng thành công");
	}
}

<?php

namespace App\Http\Controllers;

use App\Models\DotTuyenSinh;
use Illuminate\Http\Request;

class DotTuyenSinhController extends Controller {
	function __construct() {
		$this->middleware('permission:dottuyensinh-list|dottuyensinh-create|dottuyensinh-edit|dottuyensinh-delete', ['only' => ['index', 'store']]);
		$this->middleware('permission:dottuyensinh-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:dottuyensinh-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:dottuyensinh-delete', ['only' => ['destroy']]);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$dottuyensinh = DotTuyenSinh::orderBy('id', 'DESC')->paginate(5);
		return view('dottuyensinh.index', compact('dottuyensinh'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		return view('dottuyensinh.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$this->validate($request, [
			'tieude' => 'required',
			'ngay_batdau' => 'required|date',
			'ngay_ketthuc' => 'required|date|after_or_equal:ngay_batdau',
			'gio_batdau' => 'required',
			'gio_ketthuc' => 'required',
			'chi_tieu' => 'required',
			'quy_dinh' => 'required',
			'hoso_tuyensinh' => 'required',
			'trangthai' => 'required',
			'msts' => 'required',
		], [
			'tieude.required' => 'Tiêu đề không trống',
			'ngay_batdau.required' => 'Ngày không trống',
			'ngay_batdau.date' => 'Ngày bắt đầu không hợp lệ',
			'ngay_ketthuc.required' => 'Ngày không trống',
			'ngay_ketthuc.date' => 'Ngày kết thúc không hợp lệ',
			'ngay_ketthuc.after_or_equal' => 'Ngày kết thúc không hợp lệ',
			'gio_batdau.required' => 'Giờ bắt đầu không trống',
			'gio_ketthuc.required' => 'Giờ kết thúc không trống',
			'chi_tieu.required' => 'Chỉ tiêu không trống',
			'quy_dinh.required' => 'Quy định không trống',
			'hoso_tuyensinh.required' => 'Hồ sơ tuyển sinh không trống',
			'trangthai.required' => 'Trạng thái không trống',
			'msts.required' => 'Mã số tuyển sinh không trống',
		]);

		$input = $request->all();

		$input['msts'] = str_replace(' ', '', $input['msts']);
		$input['ngay_batdau'] = date('Y-m-d', strtotime($input['ngay_batdau']));
		$input['ngay_ketthuc'] = date('Y-m-d', strtotime($input['ngay_ketthuc']));
		$dottuyesinh = DotTuyenSinh::create($input);

		return redirect()->route('dottuyensinh.create')
			->with('success', 'Tạo đợt tuyển sinh thành công');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
}

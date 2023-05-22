<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoSoTuyenSinh extends Model {
	use HasFactory;
	public $timestamps = true;

	// protected $fillable = [
	// 	'id', 'tieude', 'ngay_batdau', 'ngay_ketthuc', 'gio_batdau', 'gio_ketthuc', 'chi_tieu', 'quy_dinh', 'hoso_tuyensinh', 'trangthai', 'msts',
	// ];
	protected $primaryKey = 'id';
	protected $table = 'hosotuyensinh';

	public function dottuyensinh() {
		return $this->belongsTo('App\Models\DotTuyenSinh');
	}
}

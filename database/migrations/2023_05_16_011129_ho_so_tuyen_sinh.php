<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HoSoTuyenSinh extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		//
		Schema::create('hosotuyensinh', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('id_msts')->nullable();
			$table->string('mshs')->nullable();
			$table->string('hoten')->nullable();
			$table->string('gioitinh')->nullable();
			$table->string('ngaysinh')->nullable();
			$table->string('noisinh')->nullable();
			$table->string('dantoc')->nullable();
			$table->string('hokhau')->nullable();
			$table->string('coht_tinh')->nullable();
			$table->string('coht_quanhuyen')->nullable();
			$table->string('coht_xaphuong')->nullable();
			$table->string('coht_khupho');
			$table->string('coht_to');
			$table->string('coht_duong');
			$table->string('coht_sonha');
			$table->string('hkg_tinh')->nullable();
			$table->string('hkg_quanhuyen')->nullable();
			$table->string('hkg_xaphuong')->nullable();
			$table->string('hkg_khupho');
			$table->string('hkg_to');
			$table->string('hkg_duong');
			$table->string('hkg_sonha');
			$table->string('ttgd_hotenbo');
			$table->string('ttgd_namsinhbo');
			$table->string('ttgd_nghenghiepbo');
			$table->string('ttgd_sdtbo');
			$table->string('ttgd_hotenme');
			$table->string('ttgd_namsinhme');
			$table->string('ttgd_nghenghiepme');
			$table->string('ttgd_sdtme');
			$table->string('ttgd_hotengiamho');
			$table->string('ttgd_namsinhgiamho');
			$table->string('ttgd_nghenghiepgiamho');
			$table->string('ttgd_sdtgiamho');
			$table->string('ttgd_lienhechinh');
			$table->string('gmail_lienhe');
			$table->string('sdt_lienhe');
			$table->string('matkhau');
			$table->string('hinhthucdangki');
			$table->string('trangthaihs'); // 1 chua duyet 2 dang xu ly 3 chap nhan 4 that bai

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		//
		Schema::dropIfExists('hosotuyensinh');
	}
}

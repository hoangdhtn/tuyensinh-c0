<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DotTuyenSinh extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		//
		Schema::create('dottuyensinh', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('tieude')->nullable();
			$table->date('ngay_batdau')->nullable();
			$table->date('ngay_ketthuc')->nullable();
			$table->time('gio_batdau')->nullable();
			$table->time('gio_ketthuc')->nullable();
			$table->string('chi_tieu')->nullable();
			$table->text('quy_dinh');
			$table->text('hoso_tuyensinh');
			$table->boolean('trangthai');
			$table->string('msts')->nullable();

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
		Schema::dropIfExists('dottuyensinh');
	}
}

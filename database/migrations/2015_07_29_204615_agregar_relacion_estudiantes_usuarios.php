<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregarRelacionEstudiantesUsuarios extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('estudiantes', function(Blueprint $table)
		{
			$table->foreign('rut')->references('rut')->on('usuarios');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('estudiantes', function(Blueprint $table)
		{
			$table->dropForeign('estudiantes_usuario_rut_foreign');
		});
	}

}

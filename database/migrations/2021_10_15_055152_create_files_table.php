<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('filename');
            $table->foreignId('role_id')->constrained('roles')->nullable();
            $table->foreignId('user_id')->constrained('users')->nullable();
            $table->string('fileobjective');
            $table->boolean('toPmu')->default(0);
            $table->boolean('toAccountants')->default(0);
            $table->string('filestatus')->default('Not Aproved');
            $table->string('paymentstatus')->default('Not Payed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}

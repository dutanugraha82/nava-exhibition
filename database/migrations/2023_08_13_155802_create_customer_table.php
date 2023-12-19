<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Extension\Table\Table;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->text('kode_registrasi');
            $table->string('name');
            $table->string('nohp');
            $table->string('kode_tiket')->nullable();
            $table->string('email');
            $table->enum('sex',['male','female']);
            $table->integer('jumlah_tiket');
            $table->integer('total_harga');
            $table->string('invoice')->nullable();
            $table->enum('status_validasi',[0,1]);
            $table->enum('status_tiket',[0,1]);
            $table->unsignedBigInteger('users_id')->nullable();
            $table->foreign('users_id')->references('id')->on('users');
            $table->unsignedBigInteger('ticket_id');
            $table->foreign('tickets_id')->references('id')->on('tickets');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');
    }
}

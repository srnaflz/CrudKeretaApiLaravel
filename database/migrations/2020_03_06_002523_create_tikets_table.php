<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tikets', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('no_duduk');


            $table->string('jumlah');
            $table->timestamps();
        });
        Schema::create('pembeli_tiket', function (Blueprint $table) {
            $table->bigIncrements('id');
              

            $table->unsignedBigInteger('id_pembeli');
            $table->foreign('id_pembeli')->references('id')
                    ->on('pembelis')->onDelete('cascade');

            $table->unsignedBigInteger('id_tiket');
            $table->foreign('id_tiket')->references('id')
                    ->on('tikets')->onDelete('cascade');

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
        Schema::dropIfExists('tikets');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('operationid');
            $table->unsignedInteger('customer_id');
            $table->date('startdate');
            $table->unsignedInteger('region_id')->nullable();
            $table->double('volume',12,4);
            $table->boolean('cargotype')->default(1);
            $table->double('km',12,4)->nullable();;
            $table->double('tariff',12,4);
            $table->boolean('status')->default(1);
            $table->boolean('closed')->default(1);
            $table->date('enddate')->nullable();;
            $table->text('remark')->nullable();
            $table->softDeletes();

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
        Schema::dropIfExists('operations');
    }
}

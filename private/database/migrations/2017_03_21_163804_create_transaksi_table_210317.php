<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiTable210317 extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('orders', function (Blueprint $table) {
                    $table->increments('id');
                    $table->string('no', 50);
                    $table->integer('costomer_id')->unsigned()->nullable();
                    $table->foreign('costomer_id')
                            ->references('id')->on('companies')
                            ->onUpdate('cascade')
                            ->onDelete('restrict');
                    $table->integer('service_id')->unsigned()->nullable();
                    $table->foreign('service_id')
                            ->references('id')->on('services')
                            ->onUpdate('cascade')
                            ->onDelete('restrict');
                    $table->string('cargo_type', 255);
                    $table->integer('quantity_cargo');
                    $table->double('volume', 10, 2);
                    $table->integer('party');
                    $table->double('weight', 10, 2);                    
                    $table->datetime('stuffing_date');
                    $table->text('note');
                    $table->timestamps();
                });

        Schema::create('orders_vendors', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('order_id')->unsigned()->nullable();
                    $table->foreign('order_id')
                            ->references('id')->on('orders')
                            ->onUpdate('cascade')
                            ->onDelete('restrict');
                    $table->integer('vendor_id')->unsigned()->nullable();
                    $table->foreign('vendor_id')
                            ->references('id')->on('companies')
                            ->onUpdate('cascade')
                            ->onDelete('restrict');
                    $table->integer('type');
                    $table->enum('tax', ['0', '1']);
                    $table->timestamps();
                });


        Schema::create('orders_vendors_shipping', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('order_id')->unsigned()->nullable();
                    $table->foreign('order_id')
                            ->references('id')->on('orders')
                            ->onUpdate('cascade')
                            ->onDelete('restrict');
                    $table->string('seal', 100);
                    $table->double('bl_fee', 10, 2);
                    $table->string('vessel_name', 100);
                    $table->string('voyage', 100);
                    $table->datetime('closing_date');
                    $table->datetime('etd_pol');
                    $table->datetime('etd_pod');
                    $table->text('note');
                    $table->timestamps();
                });

        Schema::create('orders_additional_costs', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('order_id')->unsigned()->nullable();
                    $table->foreign('order_id')
                            ->references('id')->on('orders')
                            ->onUpdate('cascade')
                            ->onDelete('restrict');
                    $table->integer('cost_id')->unsigned()->nullable();
                    $table->foreign('cost_id')
                            ->references('id')->on('additional_costs')
                            ->onUpdate('cascade')
                            ->onDelete('restrict');
                    $table->integer('type');
                    $table->timestamps();
                });

        Schema::create('orders_cargo', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('order_id')->unsigned()->nullable();
                    $table->foreign('order_id')
                            ->references('id')->on('orders')
                            ->onUpdate('cascade')
                            ->onDelete('restrict');                   
                    $table->string('no_container', 100);
                    $table->string('no_seal', 100);
                    $table->string('voyage', 100);
                    $table->date('date');
                    $table->text('rute');
                    $table->date('ta_pod');
                    $table->date('tb_pod');
                    $table->date('estimasi_delivery');
                    $table->date('delivery');
                    $table->timestamps();
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('orders');
        Schema::drop('orders_vendors');
        Schema::drop('orders_additional_costs');
    }

}

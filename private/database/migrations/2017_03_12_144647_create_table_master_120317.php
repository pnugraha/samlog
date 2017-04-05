<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMaster120317 extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('companies', function (Blueprint $table) {
                    $table->increments('id');
                    $table->string('name', 255);
                    $table->text('address');
                    $table->string('phone', 15);
                    $table->string('pic1');
                    $table->string('hp1', 15);
                    $table->string('email1', 100);
                    $table->string('pic2');
                    $table->string('hp2', 15);
                    $table->string('email2', 100);
                    $table->string('npwp', 50);
                    $table->integer('type');
                    $table->timestamps();
                });

        Schema::create('services', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('company_id')->unsigned()->nullable();
                    $table->foreign('company_id')
                            ->references('id')->on('companies')
                            ->onUpdate('cascade')
                            ->onDelete('cascade');
                    $table->string('pick_up', 50);
                    $table->string('delivery', 50);
                    $table->double('tarif', 10, 2);
                    $table->string('pol', 50);
                    $table->double('thc_pol', 10, 2);
                    $table->string('pod', 50);                    
                    $table->double('thc_pod', 10, 2);
                    $table->integer('status');
                    $table->timestamps();
                });

        Schema::create('additional_costs', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('company_id')->unsigned()->nullable();
                    $table->foreign('company_id')
                            ->references('id')->on('companies')
                            ->onUpdate('cascade')
                            ->onDelete('cascade');
                    $table->string('name', 50);
                    $table->double('tarif', 10, 2);
                    $table->integer('status');
                    $table->timestamps();
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('companies');
        Schema::drop('services');
        Schema::drop('additional_cost');
    }

}

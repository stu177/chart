<?php namespace Stu177\Chart\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateDataTable extends Migration
{

    public function up()
    {
        Schema::create('chart_data', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('dataset_id')->unsigned();
            $table->foreign('dataset_id')->references('id')->on('chart_dataset');
            $table->float('value');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('chart_data');
    }

}

<?php namespace Stu177\Chart\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateDatasetTable extends Migration
{

    public function up()
    {
        Schema::create('chart_dataset', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('chart_id')->unsigned()->nullable();
            $table->foreign('chart_id')->references('id')->on('chart');
            $table->string('label');
            $table->mediumText('data');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('chart_dataset');
    }

}

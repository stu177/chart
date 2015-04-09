<?php namespace Stu177\Chart\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateDatasetTable extends Migration
{

    public function up()
    {
        Schema::create('stu177_chart_dataset', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('chart_id')->unsigned()->nullable();
            $table->foreign('chart_id')->references('id')->on('stu177_chart');
            $table->string('label');
            $table->string('colour');
            $table->mediumText('data');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('stu177_chart_dataset');
    }

}

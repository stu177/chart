<?php namespace Stu177\Chart\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateChartTable extends Migration
{

    public function up()
    {
        Schema::create('chart', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('type')->nullable();
            $table->mediumText('labels');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('chart');
    }

}

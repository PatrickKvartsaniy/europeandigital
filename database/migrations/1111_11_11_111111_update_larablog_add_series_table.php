<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateLarablogAddSeriesTable extends Migration
{
    public function up()
    {
        $prefix = config('larablog.table.prefix');

        Schema::create($prefix . '_series', function(Blueprint $t)
        {
            $t->increments('id')->unsigned();
            $t->string('slug', 255)->unique()->index();
            $t->string('title', 255);
            $t->string('description', 10000);
            $t->integer('position')->default(0);
            $t->integer('user_id')->unsigned()->default(0)->nullable();
            $t->string('main_img', 500);
            $t->boolean('show_in_main_menu')->default(false);
            $t->integer('posts_count')->unsigned()->default(0)->index();
            $t->timestamps();

            $t->index('created_at');
            $t->index('updated_at');
        });

        Schema::table($prefix . '_posts', function(Blueprint $t) {
            $t->integer('serie_id')->unsigned()->default(0)->index()->after('id');
        });
    }

    public function down()
    {
        $prefix = config('larablog.table.prefix');

        Schema::table($prefix . '_posts', function(Blueprint $t) {
            $t->dropColumn('serie_id');
        });

        Schema::drop($prefix . '_series');
    }
}

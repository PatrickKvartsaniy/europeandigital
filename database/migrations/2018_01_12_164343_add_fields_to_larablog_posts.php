<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToLarablogPosts extends Migration
{

    public function up()
    {
        $prefix = config('larablog.table.prefix');

        Schema::table($prefix . '_posts', function(Blueprint $t) {
            $t->dropColumn('meta');

            $t->string('meta_title', 1024);
            $t->string('meta_description', 1024);
            $t->string('meta_keywords', 1024);

            $t->string('language', 5);

            $t->string('short_description', 1024);
        });
    }

    public function down()
    {
        $prefix = config('larablog.table.prefix');

        Schema::table($prefix . '_posts', function(Blueprint $t) {
            $t->text('meta');

            $t->dropColumn('meta_title');
            $t->dropColumn('meta_description');
            $t->dropColumn('meta_keywords');

            $t->dropColumn('language');

            $t->dropColumn('short_description');
        });

    }

}

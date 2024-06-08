<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('ourchef', function (Blueprint $table) {
            $table->renameColumn('full name', 'full_name');
        });
    }
    
    public function down()
    {
        Schema::table('ourchef', function (Blueprint $table) {
            $table->renameColumn('full_name', 'full name');
        });
    }
    
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->tinyInteger('pro_country')->default(0)->after('created_at');
            $table->string('pro_energy')->nullable()->after('created_at');
            $table->string('pro_resistant')->nullable()->after('created_at');
            $table->string('pro_diameter')->nullable()->after('created_at');
            $table->string('pro_material')->nullable()->after('created_at');
            $table->string('pro_wire')->nullable()->after('created_at');
            $table->string('pro_strap')->nullable()->after('created_at');
            $table->string('pro_warranty')->after('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['pro_country',  'pro_energy', 'pro_resistant', 'pro_diameter', 'pro_material', 'pro_wire', 'pro_strap', 'pro_warranty']);
        });
    }
};

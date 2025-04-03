<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->boolean('quick_menu_enabled')->default(false)->after('content');
            $table->string('quick_menu_position')->nullable()->after('quick_menu_enabled');
            $table->json('quick_menus')->nullable()->after('quick_menu_position');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn(['quick_menu_enabled', 'quick_menu_position', 'quick_menus']);
        });
    }
};

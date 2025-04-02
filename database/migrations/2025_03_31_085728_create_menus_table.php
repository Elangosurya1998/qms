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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('name');
            $table->string('slug')->unique();
            $table->boolean('status')->default(true);
            $table->integer('order_by')->nullable();
            $table->foreignId('parent_id')->nullable()->constrained('menus')->onDelete('cascade');
            $table->boolean('is_url')->default(false);
            $table->longText('url')->nullable();
            $table->json('locations')->nullable();
            $table->string('target')->nullable();
            $table->longText( 'excerpt')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_published')->default(false)->after('locations');
            $table->date('publish_date')->nullable()->after('is_published');
            $table->time('publish_time')->nullable()->after('publish_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};

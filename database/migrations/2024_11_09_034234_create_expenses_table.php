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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->enum('category', ['OfficeUse', 'Ads', 'Maintenance', 'PrintSup', 'PackSup', 'Stocks', 'CustomSup', 'Others']);
            $table->string('product');
            $table->decimal('total_expenses', 10, 2);
            $table->decimal('print_photo', 10, 2);
            $table->decimal('udd_merch',10, 2);
            $table->decimal('custom_deals', 10, 2);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};

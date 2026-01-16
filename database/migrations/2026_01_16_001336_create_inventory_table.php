<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inventory', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained(); // quem fez a movimentação
            $table->morphs('inventoriable'); // product_item ou product_bundle
            $table->integer('quantity');
            $table->enum('type', ['in', 'out', 'adjustment']);
            $table->string('reason')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->index(['inventoriable_type', 'inventoriable_id']);
            $table->index('created_at'); // para relatórios por período
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inventory');
    }
};

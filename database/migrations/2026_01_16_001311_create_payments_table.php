<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->enum('method', ['pix', 'boleto']);
            $table->enum('status', ['pending', 'paid', 'failed', 'expired'])->default('pending');
            $table->decimal('amount', 10, 2);

            // PIX
            $table->text('pix_qr_code')->nullable();
            $table->text('pix_qr_code_base64')->nullable();
            $table->string('pix_key')->nullable();

            // Boleto
            $table->text('boleto_url')->nullable();
            $table->string('boleto_barcode')->nullable();
            $table->date('boleto_due_date')->nullable();

            // Confirmação
            $table->timestamp('paid_at')->nullable();
            $table->string('transaction_id')->nullable();

            $table->timestamps();

            $table->index(['order_id', 'status']);
            $table->index('transaction_id'); // para webhooks
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};

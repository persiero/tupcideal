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
        // 1. Categorías (Estudios, Trabajo, etc.)
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 2. Subcategorías (Universidad, Arquitectura...)
        Schema::create('subcategories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('parent_id')->nullable()->constrained('subcategories')->cascadeOnDelete();
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // 3. Tipos de Componente (RAM, CPU...)
        Schema::create('component_types', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Procesador
            $table->string('slug')->unique(); // cpu
        });

        // 4. Especificaciones de Hardware (Items reales)
        Schema::create('hardware_specs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('component_type_id')->constrained()->cascadeOnDelete();
            $table->string('name'); // Intel Core i5...
            $table->integer('score')->default(0); // 0-100
            $table->json('technical_details')->nullable();
            $table->timestamps();
        });

        // 5. Recomendaciones (La Lógica)
        Schema::create('recommendations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subcategory_id')->constrained()->cascadeOnDelete();
            $table->foreignId('component_type_id')->constrained();
            
            // Rangos
            $table->foreignId('min_spec_id')->constrained('hardware_specs');
            $table->foreignId('rec_spec_id')->constrained('hardware_specs');
            
            // Filtro Laptop/Desktop
            $table->enum('applicable_to', ['BOTH', 'LAPTOP', 'DESKTOP'])->default('BOTH');
            
            $table->text('reason')->nullable();
        });

        // 6. Servicios de Soporte (Lo que vendes)
        Schema::create('support_services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 7. Historial de Simulaciones (Leads)
        Schema::create('simulation_history', function (Blueprint $table) {
            $table->id();
            $table->string('tracking_code')->unique();
            $table->json('user_selections'); // Guardamos todo lo que eligió
            $table->foreignId('interested_service_id')->nullable()->constrained('support_services');
            $table->string('client_ip')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Borrar en orden inverso para evitar errores de llave foránea
        Schema::dropIfExists('simulation_history');
        Schema::dropIfExists('support_services');
        Schema::dropIfExists('recommendations');
        Schema::dropIfExists('hardware_specs');
        Schema::dropIfExists('component_types');
        Schema::dropIfExists('subcategories');
        Schema::dropIfExists('categories');
    }
};

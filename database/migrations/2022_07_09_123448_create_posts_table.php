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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('source_capa');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('finding');
            $table->foreignId('classification_id');
            $table->text('requirement');
            $table->text('gap_analysis');
            $table->foreignId('rootcause_id');
            $table->text('corrective_action');
            $table->text('preventive_action');
            $table->foreignId('user_id');
            $table->foreignId('departement_id');
            //tipe data timestamp yang namanya published_at dan nilainya 0
            $table->timestamps('timeline')->nullable();
            $table->text('prove')->nullable();
            $table->string('image')->nullable();
            $table->foreignId('status_id');
            //tipe data timestamp yang namanya published_at dan nilainya 0
            $table->timestamps('published_at')->nullable();
            //method untuk membuat created at dan updated at
            $table->timestamps();
            // php artisan migrate \database\migrations\2022_07_09_123448_create_posts_table.php
            // php artisan migrate /database/migrations/2022_07_09_123448_create_posts_table.php
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};

//  Post::create([
//         'source_capa' => 'Audit Eksternal ',
//         'title' => 'Temuan Audit Eksternal ke 1',
//         'slug' => 'audit-eksternal-2',
//         'finding' => 'Ditemukan bahwa A mesin rusak',
//         'classification_id' => '2',
//         'requirement' => 'N/A',
//         'gap_analysis' => 'N/A',
//         'rootcause_id' => '2',
//         'corrective_action' => 'Melakukan perbaikan mesin',
//         'preventive_action' => 'dilakukan PM Bulanan',
//         'user_id' => '2',
//         'departement_id' => '2',
//         'status_id' => '1'
//         ])

// Post::create([
//     'source_capa' => 'Audit Internaaaaaaaal ',
//     'title' => 'Temuan 223123123',
//     'slug' => 'audit-Interna-2',
//     'finding' => 'Ditemukan  ',
//     'classification_id' => '2',
//     'requirement' => 'N/A',
//     'gap_analysis' => 'N/A',
//     'rootcause_id' => '1',
//     'corrective_action' => 'Melakukan Perbaikan',
//     'preventive_action' => 'dilakukan Training',
//     'user_id' => '1',
//     'departement_id' => '5',
//     'status_id' => '1'
//     ])

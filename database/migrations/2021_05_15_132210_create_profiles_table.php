<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('profiles', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->constrained()->cascadeOnUpdate();
      $table->string('name');
      $table->foreignId('city_id')->constrained();
      $table->string('phone_number');
      $table->foreignId('gender_id');
      $table->integer('age');
      $table->json('skills');
      $table->text('about_me');
      $table->foreignId('language_id');
      $table->string('cv')->nullable();
      $table->string('certificate')->nullable();
      $table->string('profile_picture')->nullable();
      $table->timestamps();
      $table->softDeletes();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('profiles');
  }
}

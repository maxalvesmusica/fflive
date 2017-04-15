<?php
namespace App\Domains\Users\Database;

use Codecasts\Support\Domain\Migration;
use Illuminate\Database\Schema\Blueprint;
/**
 * Class CreateUsersTable.
 */
class CreateUsersTable extends Migration
{
    /**
     * @var \Illuminate\Database\Schema\Builder
     */
    protected $schema;
    /**
     * Migration constructor.
     */
    public function __construct()
    {
        $this->schema = app('db')->connection()->getSchemaBuilder();
    }
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('avatar')->unique();
            $table->string('profile')->nullable()->default('user');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('users');
    }
}
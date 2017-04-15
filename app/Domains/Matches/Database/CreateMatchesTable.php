<?php
namespace App\Domains\Matches\Database;

use Codecasts\Support\Domain\Migration;
use Illuminate\Database\Schema\Blueprint;
/**
 * Class CreateUsersTable.
 */
class CreateMatchesTable extends Migration
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
        $this->schema->create('matches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tone');
            $table->string('ttwo');
            $table->string('championship');
            $table->string('slug');
            $table->string('link');
            $table->string('score');
            $table->string('live')->nullable()->default(1);
            $table->datetime('datetime');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('matches');
    }
}
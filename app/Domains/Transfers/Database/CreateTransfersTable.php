<?php
namespace App\Domains\Transfers\Database;

use Codecasts\Support\Domain\Migration;
use Illuminate\Database\Schema\Blueprint;
/**
 * Class CreateUsersTable.
 */
class CreateTransfersTable extends Migration
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
        $this->schema->create('transfers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('balance');
            $table->boolean('done')->default(0);
            $table->index(['user_id']);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('transfers');
    }
}
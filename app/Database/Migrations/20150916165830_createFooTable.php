<?php

/**
 * Silex Skeleton App version 0.1.0
 * https://github.com/Ardakilic/silex-skeleton-app
 * Arda Kilicdagi <arda@kilicdagi.com>
 */

use Phpmig\Migration\Migration;

//Needed for Type-hinting
use Illuminate\Database\Schema\Blueprint;

class CreateFooTable extends Migration
{

    protected $table;
    protected $schema;

    public function init()
    {
        $this->table = 'foo';
        $this->schema = $this->get('foo');
    }

    /**
     * Do the migration
     */
    public function up()
    {
        $this->schema->create($this->table, function (Blueprint $table) {

            $table->increments('id');
            $table->string('title');
            $table->timestamps();
        });

    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $this->schema->drop($this->table);
    }
}

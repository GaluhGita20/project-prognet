<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreateMigrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE OR REPLACE FUNCTION add_log_create_nasabah()
        RETURNS trigger AS $$
        BEGIN
            INSERT INTO histories (user_id, log, created_at, updated_at) VALUES (NEW.id, "Akun user berhasil dibuat!", NOW(), NOW());
            RETURN NULL;
        END
        $$ LANGUAGE plpgsql;
        
        CREATE TRIGGER add_nasabah_log
            AFTER INSERT ON users
            FOR EACH ROW
            EXECUTE PROCEDURE add_log_create_nasabah()
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    { 
        DB::unprepared('
        DROP TRIGGER add_nasabah_log;
        DROP FUNCTION add_log_create_nasabah;
        ');
    }
}

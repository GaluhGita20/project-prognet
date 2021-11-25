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
                CREATE TRIGGER tr_after_register_user AFTER INSERT ON users FOR EACH ROW
                    BEGIN
                        INSERT INTO histories(user_id, log, created_at, updated_at) VALUES (NEW.id, "Akun user berhasil dibuat!", NOW(), NOW());
                    END
                ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    { 
        DB::unprepared('DROP TRIGGER tr_after_register_user');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropTableRoomAccessibilitiesAndRoomAccessibilityIo extends Migration
{
	protected function getSchema(){
		$this->connection = env("DB_DATABASE_KOSAN_DEVICE", $this->connection);
		return Schema::connection($this->connection);
	}
	
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		$this->getSchema()->dropIfExists("room_accessibility_io");
        $this->getSchema()->dropIfExists("room_accessibilities");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		
		//re-create room_accessibilities table
        $this->getSchema()->create('room_accessibilities', function (Blueprint $table) {
            $table->timestamps();
            $table->bigIncrements('id');
			$table->unsignedBigInteger('room_id');
			$table->unsignedBigInteger('door_chipset_io_id');
			$table->unsignedBigInteger('lock_chipset_io_id');
			$table->timestamp('valid_after')->nullable()->default(null);
			$table->timestamp('valid_before')->nullable()->default(null);
			$table->integer('grace_periode')->comment('in seconds');
			
			$table->foreign('room_id')->references('id')->on('kosan_kosan.rooms');
			$table->foreign('door_chipset_io_id')->references('id')->on('chipset_io');
			$table->foreign('lock_chipset_io_id')->references('id')->on('chipset_io');
        });
		
		$this->getSchema()->table('room_accessibilities', function(Blueprint $table){
			$table->dropForeign(['door_chipset_io_id']);
			$table->dropColumn('door_chipset_io_id');
			
			$table->dropForeign(['lock_chipset_io_id']);
			$table->dropColumn('lock_chipset_io_id');
		});
		
		//re-create room_accessibility_io table
        $this->getSchema()->create('room_accessibility_io', function (Blueprint $table) {
            $table->timestamps();
            $table->bigIncrements('id');
			$table->unsignedBigInteger("room_accessibility_id");
			$table->unsignedBigInteger("door_chipset_id");
			$table->unsignedBigInteger("lock_chipset_id");
			
			$table->foreign('room_accessibility_id')->references('id')->on('room_accessibilities');
			$table->foreign('door_chipset_id')->references('id')->on('chipset_io');
			$table->foreign('lock_chipset_id')->references('id')->on('chipset_io');
        });
		
    }
}

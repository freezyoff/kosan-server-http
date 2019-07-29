<?php 

namespace App\Models\Device;

trait HasAdminShell{
	
	public function shell(){
		return $this->hasMany("\App\Models\DeviceShell", "device_id", "id");
	}
	
	public function shell_unexecuted(){
		$rows = $this->shell()
					->orderBy("created_at", "asc")
					->where("executed", false)
					->get();
		$result = [];
		if ($rows->count() > 0){
			foreach($rows as $unexecuted){
				$unexecuted->executed = true;
				$unexecuted->executed_at = now()->format("Y-m-d H:i:s");
				$unexecuted->save();
				$result[] = $unexecuted->shell;
			}
			return implode("\n", $result);
		}
		
		return false;
	}
	
}
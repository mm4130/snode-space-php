<?php

class sNode // By @NimaH79
{	
	function __construct($key = "k") {
		if($key === "k") {
			die("API key is required.");
		}
		define("KEY", $key);
	}

	function list($limit = 15) {
		if($limit === 15) {
			$ch = curl_init("https://api.snode.space/files/v1/list.py");
			curl_setopt($ch, CURLOPT_POSTFIELDS, ["access_token" => KEY, "limit" => 15]);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			return json_decode(curl_exec($ch), true);
			curl_close($ch);
		}
		else {
			$ch = curl_init("https://api.snode.space/files/v1/list.py");
			curl_setopt($ch, CURLOPT_POSTFIELDS, ["access_token" => KEY, "limit" => $limit]);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			return json_decode(curl_exec($ch), true);
			curl_close($ch);
		}
	}

	function upload($file, $hidden = 1) {
		if($hidden === 1) {
			$ch = curl_init("https://api.snode.space/files/v1/upload.py");
			curl_setopt($ch, CURLOPT_POSTFIELDS, ["access_token" => KEY, "upload_file" => new CURLFile($file)]);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			return json_decode(curl_exec($ch), true);
			curl_close($ch);
		}
		else {
			$ch = curl_init("https://api.snode.space/files/v1/upload.py");
			curl_setopt($ch, CURLOPT_POSTFIELDS, ["access_token" => KEY, "upload_file" => new CURLFile($file), "hidden" => 0]);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			return json_decode(curl_exec($ch), true);
			curl_close($ch);
		}
	}

	function stats($file_id) {
		if(isset($file_id)) {
			$ch = curl_init("https://api.snode.space/files/v1/stats.py");
			curl_setopt($ch, CURLOPT_POSTFIELDS, ["access_token" => KEY, "file_id" => $file_id]);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			return json_decode(curl_exec($ch), true);
			curl_close($ch);
		}
		else {
			return "file_id is required";
		}
	}

	function delete($file_id) {
		if(isset($file_id)) {
			$ch = curl_init("https://api.snode.space/files/v1/delete.py");
			curl_setopt($ch, CURLOPT_POSTFIELDS, ["access_token" => KEY, "file_id" => $file_id]);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			return json_decode(curl_exec($ch), true);
			curl_close($ch);
		}
		else {
			return "file_id is required";
		}
	}
}

?>
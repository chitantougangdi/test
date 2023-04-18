<?php


namespace app\index;

class webview_valid extends Base
{
	function index()
	{
		if (is_numeric($this->action)) {
			$_var_0 = db("app_pack")->where("id", $this->action)->find();
			if ($_var_0 && ($_var_0["period"] < 1 || $_var_0["period"] > time())) {
				$_var_1 = json(["msg" => "", "date" => date("Y-m-d", strtotime("+ 1 days")), "status" => 0, "ext" => ""]);
				exit($_var_1);
			}
		}
		
		$_var_1 = json(["msg" => "应用已过期", "date" => date("Y-m-d", strtotime("- 1 days")), "status" => 1, "ext" => ""]);
		exit($_var_1);
	}
	function verify()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers:Origin, X-Requested-With, Content-Type, Accept,Token");
		header("Access-Control-Allow-Methods: POST,GET");
		$_var_2 = SafeRequest("id", "get");
		$_var_2 = is_numeric($_var_2) ? $_var_2 : bees_decrypt($_var_2);
		$_var_3 = db("app_pack")->where("id", $_var_2)->value("url");
		reJSON(["url" => $_var_3]);
	}
}
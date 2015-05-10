<?php

namespace Recaptcha\Controller;

class Recaptcha extends \Cockpit\Controller
{
    public function index() {
        $recaptcha = cockpit("recaptcha");
        return $this->render("recaptcha:views/index.php",[
			'site_key' => $recaptcha->site_key,
			'secret_key' => $recaptcha->secret_key
		]);
    }

    public function saveconfig() {
		$return = [
			"message" => 'Saving settings failed',
			"status" => 'danger'
		];
		$settings = $this->param("settings", false);
		if (cockpit("recaptcha")->saveConfig($settings)) {
			$return = [
				"message" => 'Settings saved',
				"status" => 'success'
			];
		}
        return json_encode($return);
    }
}
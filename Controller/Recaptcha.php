<?php

namespace Recaptcha\Controller;

class Recaptcha extends \Cockpit\Controller
{
    public function index() {
        $config = cockpit("recaptcha")->getConfig();
        return $this->render("recaptcha:views/index.php",[
			'site_key' => $config['site_key'],
			'secret_key' => $config['secret_key']
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
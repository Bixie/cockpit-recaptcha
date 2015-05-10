<?php
/* *
 *	Bixie Recaptcha
 *  bootstrap.php
 *	Created on 10-5-2015 12:15
 *  
 *  @author Matthijs Alles
 *  @copyright Copyright (C)2015 Bixie.nl
 *  @license MIT
 *
 */

/**
 * @var LimeExtra\App $app
 */
spl_autoload_register(function($class){
	$class_path = __DIR__.'/vendor/'.str_replace('\\', '/', $class).'.php';
	if(file_exists($class_path)) include_once($class_path);
});


// API

$this->module("recaptcha")->extend([

	'tablename' => 'recaptcha_config',

	'get_recaptcha' => function () {
		$config = $this->getConfig();

		if (empty($config['site_key']) || empty($config['secret_key'])) {
			return 'Set Google reCaptcha API keys';
		}

		$output = '<script>
					var head = document.getElementsByTagName("head")[0], js = document.createElement("script");
					js.type = "text/javascript";
					js.src = "https://www.google.com/recaptcha/api.js";
					head.appendChild(js);
				</script>';
		$output .= '<div class="g-recaptcha" data-sitekey="' . $config['site_key'] . '"></div>';

		return $output;
	},

	'check_recaptcha' => function () use ($app) {
		$config = $this->getConfig();
		$recaptcha = new \ReCaptcha\ReCaptcha($config['secret_key']);
		$resp = $recaptcha->verify($app->param('g-recaptcha-response'), $_SERVER['REMOTE_ADDR']);
		if ($resp->isSuccess()) {
			return true;
		} else {
			return false;
		}
	},

	'settingsIndex' => function () use ($app) {
		$config = $this->getConfig();
		return $app->view("recaptcha:views/settings.php", [
			'site_key' => $config['site_key'],
			'secret_key' => $config['secret_key']
		]);
	},

	'getConfig' => function () use ($app) {
		return $app->module("datastore")->findOne($this->tablename, ['key'=>'recaptchaKeys']);
	},

	'saveConfig' => function ($settings) use ($app) {
		$config = $this->getConfig();
		if (isset($config['_id'])) {
			$settings['_id'] = $config['_id'];
		}
		$settings['key'] = 'recaptchaKeys';
		return $app->module("datastore")->save_entry($this->tablename, $settings);
	}
]);

// extend lexy parser
$app->renderer->extend(function ($content) {

	$content = preg_replace('/(\s*)@get_recaptcha\(\)/', '$1<?php echo cockpit("recaptcha")->get_recaptcha(); ?>', $content);

	return $content;
});


if (!function_exists('get_recaptcha')) {
	function get_recaptcha () {
		return cockpit('recaptcha')->get_recaptcha();
	}
}

if (!function_exists('check_recaptcha')) {
	function check_recaptcha () {
		return cockpit('recaptcha')->check_recaptcha();
	}
}

$this->module("datastore")->extend([
	"recaptcha_get_or_create_datastore" => function ($name) use ($app) {

		$datastore = $this->get_datastore($name);

		if (!$datastore) {

			$datastore = [
				"name" => $name,
				"modified" => time()
			];

			$datastore["created"] = $datastore["modified"];

			$app->db->save("common/datastore", $datastore);
		}

		return $datastore;
	}
]);


// ADMIN
if (COCKPIT_ADMIN && !COCKPIT_REST) include_once(__DIR__ . '/admin.php');

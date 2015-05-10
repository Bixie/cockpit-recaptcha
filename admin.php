<?php
/**
 * @var LimeExtra\App $app
 */

// ACL
$this("acl")->addResource('Recaptcha', ['manage.recaptcha']);


$app->on('admin.init', function() use($app) {

    $datastore = $this->module("datastore");
    $recaptcha = $this->module("recaptcha");

    // make sure datastore exists
    if($store = $datastore->recaptcha_get_or_create_datastore($recaptcha->tablename)) {
		$config = $recaptcha->getConfig();
		$recaptcha->site_key = $config['site_key'];
		$recaptcha->secret_key = $config['secret_key'];

		$app->bindClass("Recaptcha\\Controller\\Recaptcha", "recaptcha");

	}

});
$app->on('cockpit.settings.index', function() use($app) {
	echo $this->module("recaptcha")->settingsIndex();
});
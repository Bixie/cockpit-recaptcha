<?php
/**
 * @var string $site_key
 * @var string $secret_key
 */
?>


@start('header')

    {{ $app->assets(['recaptcha:assets/recaptcha.js']) }}

@end('header')

<h1><a href="@route('/settingspage')">@lang('Settings')</a> / @lang('reCaptcha')</h1>


<div class="uk-panel uk-panel-box uk-form uk-form-horizontal">

	<span class="uk-badge app-badge">@lang('API settings')</span>

	<hr/>

	<div class="uk-alert"><a href="https://www.google.com/recaptcha/admin" target="_blank"><i
				class="uk-icon-external-link-square uk-margin-small-right"></i>@lang('Get your API-keys at Google reCAPTCHA')</a></div>

	<div class="uk-form-row">
		<label class="uk-form-label" for="site_key">@lang('Site key')</label>
		<div class="uk-form-controls">
			<input name="site_key" id="site_key" value="<?= $site_key ?>" class="uk-form-large uk-form-width-large">
		</div>
	</div>
	<div class="uk-form-row">
		<label class="uk-form-label" for="secret_key">@lang('Secret key')</label>
		<div class="uk-form-controls">
			<input name="site_key" id="secret_key" value="<?= $secret_key ?>" class="uk-form-large uk-form-width-large">
		</div>
	</div>
	<div class="uk-margin">
		<button type="button" id="saveRecaptcha" class="uk-button uk-button-large uk-button-success">Save</button>
	</div>
</div>
<div class="uk-panel uk-panel-box uk-margin">

	<span class="uk-badge app-badge">@lang('How to use')</span>

	<hr/>

	<strong>@lang('Display reCaptcha widget in your form'):</strong>
	<highlightcode>&lt;?php echo <strong>get_recaptcha()</strong>; ?&gt;</highlightcode>

	<strong>@lang('Validation reCaptcha'):</strong><br/>
	@lang('Create a file with the name of the form in folder `custom/forms`, eg `custom/forms/Contact.php`, with the following content')
	<highlightcode>&lt;?php return <strong>check_recaptcha()</strong>; ?&gt;</highlightcode>
</div>

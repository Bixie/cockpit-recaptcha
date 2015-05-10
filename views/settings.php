<?php
/**
 * @var string $site_key
 * @var string $secret_key
 */
?>

@if($app["user"]["group"]=="admin")
	<div class="app-panel uk-margin">

		<div class="uk-text-left">
			<span class="uk-badge app-badge">@lang('reCaptcha')</span>
		</div>

		<hr>
		<div class="uk-flex">
			<div class="uk-width-1-6 uk-margin-right">
				<div>
					<i class="uk-icon-check-square-o"></i>
				</div>
				<div class="uk-text-truncate">
					<a href="@route('/recaptcha')">@lang('reCaptcha')</a>
				</div>
			</div>
			<div class="uk-text-left">

				<span class="uk-badge app-badge">@lang('Current settings')</span>

				<dl class="uk-description-list uk-description-list-horizontal">
					<dt>@lang('Site key')</dt>
					<dd><?= $site_key ?></dd>
					<dt>@lang('Secret key')</dt>
					<dd><?= $secret_key ?></dd>
				</dl>
			</div>
		</div>
	</div>
@endif

<div style="width: 100%; display:block;">
<h2>{{ $data['app_name'] . trans('labels.EcommerceAppOrderStatus') }}</h2>
<p>
	<strong>{{ trans('labels.Hi') }} {{ $data['devices']->customers_firstname }} {{ $data['devices']->customers_lastname }}!</strong><br>
	{{ $data['message'] }}<br><br>
	<strong>{{ trans('labels.Sincerely') }},</strong><br>
	{{ $data['app_name'] }}
</p>
</div>
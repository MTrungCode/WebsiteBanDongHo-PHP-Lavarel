<!DOCTYPE html>
<html lang="vi">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
        <meta http-equiv="content-language" itemprop="inLanguage" content="vi">
        <title>{{ $title_page ?? "Trang chủ" }}</title>
        <link rel="stylesheet" type="text/css" href="https://codeseven.github.io/toastr/build/toastr.min.css">
		@yield('css')

		@if(session('toastr'))
			<script>
				var TYPE_MESSAGE = "{{ session('toastr.type') }}";
				var MESSAGE      = "{{ session('toastr.message') }}";
			</script>
		@endif

		<style type="text/css">
			.text-danger {
				color: red;
				font-size: 11px;
			}
		</style>
	</head>
	<body>
		@include('frontend.components.header')
		@yield('content')
		@include('frontend.components.footer')
		@yield('script')
		<script type="text/javascript" src="https://codeseven.github.io/toastr/build/toastr.min.js"></script>
		<script type="text/javascript">
			if(typeof TYPE_MESSAGE != "undefined")
			{
				switch (TYPE_MESSAGE) {
					case 'success':
						toastr.success(MESSAGE)
						break;
					case 'error':
						toastr.error(MESSAGE)
						break;
				}
			}
		</script>
	</body>
</html>
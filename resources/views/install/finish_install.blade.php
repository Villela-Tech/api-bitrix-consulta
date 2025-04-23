<?php header('Access-Control-Allow-Origin: *'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<script src="//api.bitrix24.com/api/v1/"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<meta charset="UTF-8">
	<title>App</title>
</head>

<body>

	<script type="text/javascript">
		BX24.init(function() {

		});

		$(document).ready(function() {
			BX24.installFinish();
		});
	</script>

</body>

</html>
<!DOCTYPE html>
<html lang="tr">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Şifre Sıfırlama</h2>

		<div>
			Şİfrenizi sıfırlamak için bu formu doldurun: {{ URL::to('password/reset' . "?token =" . $token) }}
		</div>
	</body>
</html>

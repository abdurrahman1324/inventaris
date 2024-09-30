<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Inventory</title>
</head>

<body>
    <h1>Klik link di bawah ini untuk mereset password</h1>
    <a href="<?= base_url('forgotpasssword/' . $email . '/' . $token); ?>">Reset Password</a>

</body>

</html>

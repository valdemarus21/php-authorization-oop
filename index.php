<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>authorization and registration</title>
	</head>
	<body>
		<div class="wrapper" style="display: flex; flex-direction: column; gap: 50px">
			<div class="auth" style="max-width: 250px; border: 1px solid #000; padding: 10px">
				<form
					style="display: flex; flex-direction: column; gap: 25px"
					class="auth-form"
					action="./functions/authorization.php"
                    method="POST"

				>
					<div class="auth-form__fields" style="display: flex; flex-direction: column; gap: 15px">
						<input class="auth-form__fields-input" type="text" name="username" placeholder="username" />
						<input type="password" name="password" placeholder="password" />
					</div>
					<button style="width: 100%; border: 1px solid #000" type="submit">Log In</button>
				</form>
			</div>
			<div class="registration"  style="max-width: 250px; border: 1px solid #000; padding: 10px">
				<form class="registration-form" action="./functions/registration.php"
                method="POST" style="display: flex; flex-direction: column; gap: 25px"
                >
					<div
						class="registration-form__fields"
						style="display: flex; flex-direction: column; gap: 15px"
					>
						<input class="registration__fields-input" type="email" name="email" placeholder="email" />
						<input class="registration__fields-input" type="text" name="username" placeholder="username" />
						<input class="registration__fields-input" type="password" name="password" placeholder="password" />
					</div>
					<button style="width: 100%; border: 1px solid #000" type="submit">Register</button>
				</form>
			</div>
		</div>
	</body>
</html>

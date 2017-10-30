<div class="pen-title">
	<h1>Mini Messenger</h1><span> by <a href='#'>Jesús Magallón</a></span>
</div> <?php

if( isset($error) && !empty($error) ) { ?>
	<div class="error-module">
		<p>Error: <?= $error ?></p>
	</div> <?php
} ?>

<!-- Form Module-->
<div class="module form-module">
	<div class="toggle"><i class="fa fa-times fa-pencil"></i>
		<div class="tooltip">Click Me</div>
	</div>
	<div class="form">
		<h2>Inicia sesión</h2>
		<form action="/login" method="POST">
			<input type="email" name="email" placeholder="Email" required />
			<input type="password" name="password" placeholder="Password" required />
			<button type="submit">Iniciar sesión</button>
		</form>
	</div>
	<div class="form">
		<h2>Crea una cuenta</h2>
		<form action="/register">
			<input type="text" name="username" placeholder="Username"/>
			<input type="password" name="password" placeholder="Password"/>
			<input type="email" name="email" placeholder="Email Address"/>
			<button type="submit">Registrarse</button>
		</form>
	</div>
	<div class="cta">
	Create with <i class="fa fa-heart"></i> by Jesús Magallón
	</div>
</div>
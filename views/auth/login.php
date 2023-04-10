<h1 class="nombre-pagina">Login</h1>
<p class = "descripcion-pagina">Inicia sesión con tus datos</p>

<?php 
include __DIR__ . "/../templates/alertas.php";

?>

<form action="/" class="fomrulario" method="POST">
    <div class="campo">
        <label for="emial" >Email</label>
        <input 
        type="email"
        id="email"
        placeholder="Tu Email"
        name="email"
        />
    </div>

    <div class="campo">
        <label for="password">Password</label>
        <input
        type="password"
        id= "password"
        placeholder="Tu Password"
        name="password"
        />
    </div>

    <input type="submit" class="boton" value= "Iniciar Sesión">
</form>

<div class="acciones">
    <a href="/crear-cuenta">¿Aun no tienes una cuenta? Crear una?</a>
    <a href="/olvide">¿Olvidaste tu password?</a>
</div>

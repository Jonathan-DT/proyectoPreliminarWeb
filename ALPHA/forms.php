
<ul class="nav nav-tabs" id="myTabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Iniciar Sesión</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Registrarse</a>
    </li>
</ul>
<!-- Contenido de las Pestañas -->
<div class="tab-content mt-3" id="myTabsContent">
    <!-- Formulario de Inicio de Sesión -->
    <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
        <h2 class="text-center">Iniciar Sesión</h2>
        <form method="post" action="login.php">
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="password" name="contraseña" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
        </form>
    </div>
    <!-- Formulario de Registro -->
    <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
        <h2 class="text-center">Registro</h2>
        <form method="post" action="register.php">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" required>
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" class="form-control" id="correo_electronico" name="correo_electronico" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="contraseña" name="contraseña" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
        </form>
    </div>
</div>
<?php
require('script.php');?>
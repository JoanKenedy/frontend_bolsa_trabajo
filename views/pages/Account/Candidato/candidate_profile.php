<?php
if (!isset($_SESSION['rol']->rol_usuario_id)) {
    header('location:login.php');
    return;
} else {
    if ($_SESSION['rol']->rol_usuario_id != 1) {
        header('location:login.php');
        return;
    }
}
?>

<div class="container container-padre-perfil mx-auto my-3">
    <?php if ($_SESSION['rol']->rol_usuario_id  == 1) : ?>

        <div class="box-perfil">
            <img src="images/avatar/user-1.webp" alt="" class="img-perfil">
            <h3><?php echo $_SESSION['rol']->nombre ?> <?php echo $_SESSION['rol']->apellidos ?></h3>
            <h4>Programador Jr</h4>
            <span>Email: <?php echo $_SESSION['rol']->email ?></span>
        </div>
    <?php endif; ?>
    <div class="box-perfil">
        <h2>Objetivo profesional</h2>
        <span>Puesto</span>
        <h3>Programador web</h3>
        <span>Salario aproximado</span>
        <h3>MX$ 10,000</h3>
    </div>
    <div class="box-perfil">
        <h2>Experiencia profesional</h2>
        <h3>Agencia Dentarios</h3>
        <span>Julio 2020 - Julio 2024</span>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas rem quos enim atque harum sunt doloremque a cupiditate repudiandae numquam beatae aliquid aut, in provident autem quaerat quod libero necessitatibus explicabo. Ullam dolorum similique officiis modi exercitationem culpa incidunt, ex sapiente cupiditate! </p>
    </div>
    <div class="box-perfil">
        <h2>Área de especialidad</h2>
        <p>Desarrollo web</p>
        <p>Desarrollo de software</p>
    </div>
    <div class="box-perfil">
        <h2>Habilidad</h2>
        <p>CSS</p>
        <p>Html5</p>
        <p>Javascript</p>
    </div>
    <div class="box-perfil">
        <h2>Educación</h2>
        <h5>Universidad Insurgentes</h5>
        <span>2020</span>
        <h5>Universitario - Trunco en Lic. Informatica</h5>
    </div>
    <div class="box-perfil">
        <h2>Idioma</h2>
        <p>Describe los idiomas que conoces, incluso tu idioma nativo.</p>

    </div>
    <div class="box-perfil">
        <h2> Cursos y certificaciones</h2>
        <div>
            <h6>Full Stack Web</h6>
            <a href="">Link a su certificado</a>
        </div>
        <div>
            <h6>Full Stack Web</h6>
            <a href="">Link a su certificado</a>
        </div>

    </div>
    <div class="box-perfil">
        <h2>Archivos y enlaces</h2>
        <p>Adicionar sitios de referencia ayudará a que el reclutador conozca más sobre ti.</p>
    </div>

</div>
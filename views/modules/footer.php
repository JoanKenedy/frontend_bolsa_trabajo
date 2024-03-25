<footer class="site-footer">
    <div class="container">
        <div class="row">

            <div class="col-lg-5 col-md-6 col-12 mb-3">
                <div class="d-flex align-items-center mb-4">
                    <img src="images/logo.png" class="img-fluid logo-image">

                    <div class="d-flex flex-column">
                        <strong class="logo-text">Multiservices</strong>
                        <small class="logo-slogan">Bolsa de trabajo</small>
                    </div>
                </div>

                <p class="mb-2">
                    <i class="custom-icon bi-globe me-1"></i>

                    <a href="https://multiservicescard.com.mx/" class="site-footer-link" target="_blank">
                        multiservicescard.com.mx
                    </a>
                </p>

                <p class="mb-2">
                    <i class="custom-icon bi-telephone me-1"></i>

                    <a href="tel:3221328823" class="site-footer-link">
                        3221328823
                    </a>
                </p>

                <p>
                    <i class="custom-icon bi-envelope me-1"></i>

                    <a href="mailto:infomultiservices@gmail.com" class="site-footer-link">
                        infomultiservices@gmail.com
                    </a>
                </p>

            </div>

            <div class="col-lg-2 col-md-3 col-12 ms-lg-auto">
                <h6 class="site-footer-title">Compañia</h6>

                <ul class="footer-menu">
                    <?php if (isset($_SESSION['rol'])) : ?>
                        <?php if ($_SESSION['rol']->rol_usuario_id == 1) : ?>
                            <li class="footer-menu-item">
                                <a class="footer-menu-link" href="<?php echo $path ?>cuenta&candidato&nosotros">Nosotros</a>
                            </li>

                            <li class="footer-menu-item"><a href="<?php echo $path ?>cuenta&candidato&lista-trabajos" class="footer-menu-link">Trabajos</a></li>

                            <li class="footer-menu-item"><a href="<?php echo $path ?>cuenta&candidato&contacto" class="footer-menu-link">Contacto</a></li>

                        <?php elseif ($_SESSION['rol']->rol_usuario_id  == 2) :  ?>
                            <li class="footer-menu-item">
                                <a class="footer-menu-link" href="<?php echo $path ?>cuenta&reclutador&nosotros">Nosotros</a>
                            </li>

                            <li class="footer-menu-item"><a href="<?php echo $path ?>cuenta&reclutador&lista-trabajos" class="footer-menu-link">Trabajos</a></li>

                            <li class="footer-menu-item"><a href="<?php echo $path ?>cuenta&reclutador&contacto" class="footer-menu-link">Contacto</a></li>
                        <?php endif; ?>
                    <?php else :  ?>
                        <li class="footer-menu-item"><a href="<?php echo $path ?>nosotros.php" class="footer-menu-link">Nosotros</a></li>
                        <li class="footer-menu-item"><a href="<?php echo $path ?>lista-trabajos.php" class="footer-menu-link">Trabajos</a></li>
                        <li class="footer-menu-item"><a href="<?php echo $path ?>contacto.php" class="footer-menu-link">Contacto</a></li>
                    <?php endif; ?>




                </ul>
            </div>



            <div class="col-lg-5 col-md-8 col-12 mt-3 mt-lg-0">


                <form class="custom-form newsletter-form" action="#" method="post" role="form">
                    <h6 class="site-footer-title">Boletin informativo</h6>
                    <h6 class="site-footer-title">Recibe notificaciones de noticias de empleo</h6>

                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><i class="bi-person"></i></span>

                        <input type="text" name="newsletter-name" id="newsletter-name" class="form-control" placeholder="yourname@gmail.com" required>

                        <button type="submit" class="form-control">
                            <i class="bi-send"></i>
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <div class="site-footer-bottom">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-12 d-flex align-items-center">
                    <p class="copyright-text">Copyright © Multiservices Job 2024</p>

                    <ul class="footer-menu d-flex">
                        <li class="footer-menu-item"><a href="#" onclick="return false" class="footer-menu-link">Política de privacidad</a>
                        </li>

                        <li class="footer-menu-item"><a href="#" onclick="return false" class="footer-menu-link">Términos</a></li>
                    </ul>
                </div>

                <div class="col-lg-5 col-12 mt-2 mt-lg-0">
                    <ul class="social-icon">

                        <li class="social-icon-item">
                            <a href="https://www.facebook.com/multiservice.card" class="social-icon-link bi-facebook" target="_blank"></a>
                        </li>

                        <li class="social-icon-item">
                            <a href="https://www.instagram.com/multiservicecard/" class="social-icon-link bi-instagram" target="_blank"></a>
                        </li>


                    </ul>
                </div>

                <div class="col-lg-3 col-12 mt-2 d-flex align-items-center mt-lg-0">
                    <p class="text-white">Diseñado: <a class=" text-white" rel="sponsored" href="https://agenciainspiracion.com/" target="_blank">Agencia
                            de Marketing Digital Inspiración</a></p>
                </div>

                <a class="back-top-icon bi-arrow-up smoothscroll d-flex justify-content-center align-items-center" href="#top"></a>

            </div>
        </div>
    </div>
</footer>

<!-- JAVASCRIPT FILES -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/counter.js"></script>
<script src="js/custom.js"></script>
<script src="js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.2/jquery.twbsPagination.min.js"></script>
<script>
    function pagination() {
        var target = $(".paginacion");
        if (target.length > 0) {
            target.each(function() {
                var el = $(this),
                    totalPages = el.data("total-pages"),
                    currentPage = el.data("current-page"),
                    urlPage = el.data("url-page");

                el.twbsPagination({
                    totalPages: totalPages,
                    startPage: currentPage,
                    visiblePages: 3,
                    first: 'Inicio',
                    last: 'Final',
                    prev: '<i class="bi bi-arrow-left-circle-fill"></i>',
                    next: '<i class="bi bi-arrow-right-circle-fill"></i>',
                }).on("page", function(evt, page) {
                    if (urlPage.includes("&", 1)) {
                        urlPage = urlPage.replace("&" + currentPage, "&" + page);
                        window.location = urlPage;
                    } else {
                        window.location = urlPage + "&" + page;
                    }

                })
            });
        }
    }

    pagination();
</script>



</body>

</html>
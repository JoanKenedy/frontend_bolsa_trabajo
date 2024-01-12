<main>

    <header class="site-header">
        <div class="section-overlay"></div>

        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12 text-center">
                    <h1 class="text-white">Multiservices Job</h1>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="<?php echo $path ?>">Inicio</a></li>

                            <li class="breadcrumb-item active" aria-current="page">Contacto</li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </header>


    <section class="contact-section section-padding">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-6 col-12 mb-lg-5 mb-3">
                    <iframe class="google-map"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4722.136219194832!2d10.772202738834757!3d59.917660271855105!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46416fa8eba7e84d%3A0xf4e943975503fa30!2sUrtehagen%20(herb%20garden)!5e1!3m2!1sen!2sth!4v1680951932259!5m2!1sen!2sth"
                        width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <div class="col-lg-5 col-12 mb-3 mx-auto">
                    <div class="contact-info-wrap">
                        <div class="contact-info d-flex align-items-center mb-3">
                            <i class="custom-icon bi-building"></i>

                            <p class="mb-0">
                                <span class="contact-info-small-title">Oficina</span>

                                Puerto Vallarta, Jalisco México.
                            </p>
                        </div>

                        <div class="contact-info d-flex align-items-center">
                            <i class="custom-icon bi-globe"></i>

                            <p class="mb-0">
                                <span class="contact-info-small-title">Sitio web</span>

                                <a href="https://multiservicescard.com.mx" class="site-footer-link">
                                    multiservicescard.com.mx
                                </a>
                            </p>
                        </div>

                        <div class="contact-info d-flex align-items-center">
                            <i class="custom-icon bi-telephone"></i>

                            <p class="mb-0">
                                <span class="contact-info-small-title">Teléfono</span>

                                <a href="tel:3221328823" class="site-footer-link">
                                    3221328823
                                </a>
                            </p>
                        </div>

                        <div class="contact-info d-flex align-items-center">
                            <i class="custom-icon bi-envelope"></i>

                            <p class="mb-0">
                                <span class="contact-info-small-title">Email</span>

                                <a href="mailto:infomultiservices@gmail.com" class="site-footer-link">
                                    infomultiservices@gmail.com
                                </a>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-12 mx-auto">
                    <form class="custom-form contact-form" action="#" method="post" role="form">
                        <h2 class="text-center mb-4">¿Necesitas ayuda? Con gusto dejános mensaje.</h2>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <label for="first-name">Nombre completo</label>

                                <input type="text" name="full-name" id="full-name" class="form-control"
                                    placeholder="Jose Juan" required>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <label for="email">Email </label>

                                <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control"
                                    placeholder="jose12@gmail.com" required>
                            </div>

                            <div class="col-lg-12 col-12">
                                <label for="message">Mensaje</label>

                                <textarea name="message" rows="6" class="form-control" id="message"
                                    placeholder="¿Como podemos ayudarte?"></textarea>
                            </div>

                            <div class="col-lg-4 col-md-4 col-6 mx-auto">
                                <button type="submit" class="form-control">Enviar Mensaje</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
    <section class="cta-section">
        <div class="section-overlay"></div>

        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-10">


                    <h2 class="text-white mb-2">Más de 10.000 puestos de trabajo vacantes</h2>
                </div>

                <div class="col-lg-4 col-12 ms-auto">
                    <div class="custom-border-btn-wrap d-flex align-items-center mt-lg-4 mt-2">
                        <a href="<?php echo $path?>account&enrrollment"
                            class="custom-btn custom-border-btn btn me-4">Crear cuenta</a>

                        <a href="<?php echo $path ?>account&enrrollment" class="custom-link">Anuciar trabajo</a>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>
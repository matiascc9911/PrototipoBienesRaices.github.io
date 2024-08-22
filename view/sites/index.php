<main>

    <?php include 'icons.php';?>

    <section class="seccion contenedor">
        <h2>Propiedades Disponibles en Alquiler/Venta</h2>
        
        <?php 
            include "list.php";
        ?>

        <div class="alinear-der">
            <a href="/properties" class="boton-verde">Ver todas</a>
        </div>
        
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llenar el formulario de contacto y un asesor se pondrá en contacto con usted a la brevedad</p>
        <a href="contacto.php" class="boton boton-naranja-iblock">Contactanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img src="build/img/blog1.jpg" alt="Texto Entrada Blog" loading="lazy">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="/blog">
                        <h4>Terraza en el Techo de tu Casa</h4>
                        <p class="informacion-meta">Escrito el: <span>29/10/23</span> por: <span>Admin</span></p>
                        <p>Consejo para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero</p>
                    </a>
                </div>
            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img src="build/img/blog2.jpg" alt="Texto Entrada Blog" loading="lazy">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="/blog">
                        <h4>Guia para la decoración de tu hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>15/11/23</span> por: <span>Admin</span></p>
                        <p>Maximiza el espacio de tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio</p>
                    </a>
                </div>
            </article>
        </section> <!--.blog-->

        <section class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se comporto de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.
                </blockquote>
                <p>- Matias Carrillo</p>
            </div>
        </section>
    </div>

</main>

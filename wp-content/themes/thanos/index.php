<?php get_header(); ?>

<?php
    $files = scandir(bloginfo('template_url')+"/img");
?>
<section class="mt-1">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 px-5">

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?php bloginfo('template_url'); ?>/img/WhatsApp-Image-2020-01-18-at-20.35.47.jpeg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="http://localhost/amalitech.org/wp-content/uploads/2020/01/WhatsApp-Image-2020-01-18-at-20.35.13.jpeg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="http://localhost/amalitech.org/wp-content/uploads/2020/01/WhatsApp-Image-2020-01-19-at-17.25.31.jpeg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
    </div>
</section>


<section class="" style="margin-top: -80px">
    <div class="row mx-5">
        <div class="col-sm-12 col-md-4 col-lg-4">
            <div class="card shadow p-3 mb-5 rounded">
                <h5 class="card-header">Featured</h5>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                </div>
            </div>

        </div>
        <div class="col-sm-12 col-md-4 col-lg-4">
            <div class="card ">
                <h5 class="card-header">Featured</h5>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                </div>
            </div>

        </div>
        <div class="col-sm-12 col-md-4 col-lg-4">
            <div class="card shadow p-3 mb-5 rounded">
                <h5 class="card-header">Featured</h5>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                </div>
            </div>

        </div>
    </div>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
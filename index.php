<!DOCTYPE html>
<html lang="en">
<header>
    <p style="font-size: 15px;"text-align: center; background-color: #a1be7e;>Free Shippin on orders over $48</p>
</header>
    <?php
        include "inc/head.inc.php";
    ?>
    <body>
        <?php
            include "inc/nav.inc.php";
        ?>
    <div class="carousel">
        
        <h2 class="carousel-title" style="text-align: center;">Our Featured Brands</h2>

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/Edobio_Slider.jpg" class="d-block w-100" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5 style="font-size: 45px;">Edobio</h5>
                </div>
            </div>
        <div class="carousel-item">
            <img src="images/KylieSkin_Slider.jpg" class="d-block w-100" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
                <h5 style="font-size: 45px;">Kylie Skin</h5>
            </div>
        </div>
        <div class="carousel-item">
            <img src="path_to_your_third_image.jpg" class="d-block w-100" alt="Third slide">
        </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>

    </div>
        

    <!-- Additional Content Sections -->
    <section id="skincare-routine">
        <h2>Addition content here</h2>
        <div class="row">
            <!-- Content about skincare routines -->
        </div>
    </section>
    </div>
        <?php include "inc/footer.inc.php"; ?>

<!-- please check on this: is it suppose to be here? the boostrap script -->
<!-- Swiper JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<!-- Initialize Swiper -->
<script>
</script>
</body>
</html>
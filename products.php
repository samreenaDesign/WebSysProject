<!DOCTYPE html>
<html lang="en">
    <?php include "inc/head.inc.php"; ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .products {
            margin: 0 auto;
            max-width: 1200px; /* Adjust as needed */
            display: flex;
            justify-content: space-between; /* Spaces out the product items */
            padding: 20px; /* Adds vertical padding within the .products container */
            flex-wrap: wrap; /* Ensures the items wrap if there isn't enough space */
        }

        .product-item {
            display: flex;
            align-items: center; /* Vertically centers the items in the product item */
            padding: 20px; /* Adds some space inside each .product-item */
            flex-basis: 30%; /* Gives a base width to each product item */
            margin: 10px; /* Adds space between product items */
        }
        
        .product-item img {
            width: 150px; /* Adjust the width as needed */
            height: auto;
            margin-right: 20px; /* Adds space between the image and the text */
        }

        /* Styles to ensure text is not right-aligned if you want */
        .product-item h2, .product-item p, .product-item span {
            text-align: left;
        }

        /* Add the new CSS here */
        .card.h-100 {
            height: 100%;
        }

        .row-cols-1 .col {
            display: flex;
            flex: 1 0 auto;
        }

        .card-body {
            display: flex;
            flex-direction: column;
        }

        .card-body > *:last-child {
            margin-top: auto;
        }

        .card-text {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }

        #myBtn {
            display: none; /* Hidden by default */
            position: fixed; /* Fixed/sticky position */
            bottom: 20px; /* Place the button at the bottom of the page */
            right: 30px; /* Place the button 30px from the right */
            z-index: 99; /* Make sure it does not overlap */
            border: none; /* Remove borders */
            outline: none; /* Remove outline */
            background-color: red; /* Set a background color */
            color: white; /* Text color */
            cursor: pointer; /* Add a mouse pointer on hover */
            padding: 15px; /* Some padding */
            border-radius: 10px; /* Rounded corners */
            font-size: 18px; /* Increase font size */
            }

            #myBtn:hover {
            background-color: #555; /* Add a dark-grey background on hover */
        }
 
    </style>

    <body>
        <?php include "inc/nav.inc.php"; ?>


        <div class="container my-4">

        <h1>PRODUCTS PAGE</h1>

        <div class="row">

        <section id="lips">
            <h2>Lips</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4">

                <!-- lip one: Sugar lip scrub -->
                <div class="col">
                    <div class="card h-100">
                        <img src="images/sugar.png" class="card-img-top" alt="Sugar lip scrub">
                        <div class="card-body">
                            <h5 class="card-title">Sugar lip scrub</h5>
                            <p class="card-text">The Sugar lip scrub gently exfoliates and buffs away dead skin cells while helping to replenish the lips' moisture.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted">$20.00</span>
                                <a href="#" class="btn btn-primary add-to-cart">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- lip two: Pink me up lip balm -->
                <div class="col">
                    <div class="card h-100">
                        <img src="images/pink.png" class="card-img-top" alt="Pink me up lip balm">
                        <div class="card-body">
                            <h5 class="card-title">Pink me up lip balm</h5>
                            <p class="card-text">Pink me up lip balm is for those that loves natural flush colours with a radiant, satin finish.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted">$35.55</span>
                                <a href="#" class="btn btn-primary mt-3 add-to-cart">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- lip three: Mini matte lip kit -->
                <div class="col">
                    <div class="card h-100">
                        <img src="images/mini.png" class="card-img-top" alt="Mini matte lip kit">
                        <div class="card-body">
                            <h5 class="card-title">Mini matte lip kit</h5>
                            <p class="card-text">The mini matte lip kit features a lip liner pencil and a liquid lipstick, this ready-to-go lip routine is perfect for creating a full coverage matte look that last throughout the day.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted">$28.00</span>
                                <a href="#" class="btn btn-primary mt-3 add-to-cart">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- lip four: Strawberry lip oil -->
                <div class="col">
                    <div class="card h-100">
                        <img src="images/strawberry.png" class="card-img-top" alt="Strawberry lip oil">
                        <div class="card-body">
                            <h5 class="card-title">Strawberry lip oil</h5>
                            <p class="card-text">The strawberry lip oil hydrates, comforts and leaves the lips looking smooth and naturally plumped.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted">$35.20</span>
                                <a href="#" class="btn btn-primary mt-3 add-to-cart">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- lip five: Lip oil bundle -->
                <div class="col">
                    <div class="card h-100">
                        <img src="images/lipbundle.png" class="card-img-top" alt="Lip oil bundle">
                        <div class="card-body">
                            <h5 class="card-title">Lip oil bundle</h5>
                            <p class="card-text">The lip oil bundle includes the five best selling lip oil flavours. This rich, conditioning texture hydrates, comforts and leaves lips looking smooth and naturally plumped.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted">$55.00</span>
                                <a href="#" class="btn btn-primary mt-3 add-to-cart">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- lip six: Tinted butter balm bundle -->
                <div class="col">
                    <div class="card h-100">
                        <img src="images/tintbundle.png" class="card-img-top" alt="Tinted butter balm bundle">
                        <div class="card-body">
                            <h5 class="card-title">Tinted butter balm bundle</h5>
                            <p class="card-text">The tinted butter balm bundle features the six best seller shades that are perfect for everyday use.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted">$30.00</span>
                                <a href="#" class="btn btn-primary mt-3 add-to-cart">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>  
        
        <section id="face">
            <h2>Face</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4">

                <!-- face one: Glowing night gel mask -->
                <div class="col">
                    <div class="card h-100">
                        <img src="images/glowy.png" class="card-img-top" alt="Glowing night gel mask">
                        <div class="card-body">
                            <h5 class="card-title">Glowing night gel mask</h5>
                            <p class="card-text">A water-like, sleeping mask that regenerates and moisturizes the skin overnight.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted">$60.00</span>
                                <a href="#" class="btn btn-primary mt-3 add-to-cart">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- face two: Radiant booster mask -->
                <div class="col">
                    <div class="card h-100">
                        <img src="images/maske.png" class="card-img-top" alt="Radiant booster mask">
                        <div class="card-body">
                            <h5 class="card-title">Radiant booster mask</h5>
                            <p class="card-text">This rinse-off mask helps the skin combat damage from external factors that the skin is exposed to daily.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted">$30.50</span>
                                <a href="#" class="btn btn-primary mt-3 add-to-cart">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- face three: Fresh Balancing Toner -->
                <div class="col">
                    <div class="card h-100">
                        <img src="images/tonere.png" class="card-img-top" alt="Fresh Balancing Toner">
                        <div class="card-body">
                            <h5 class="card-title">Fresh Balancing Toner</h5>
                            <p class="card-text">The unique moisturizing, lactobacillus-fermented sake lees extract gives the skin a luxurious texture and deep moisture that lasts.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted">$28.00</span>
                                <a href="#" class="btn btn-primary mt-3 add-to-cart">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- face four: Shea butter ultra rich face cream -->
                <div class="col">
                    <div class="card h-100">
                        <img src="images/ultra.png" class="card-img-top" alt="Shea butter ultra rich face cream">
                        <div class="card-body">
                            <h5 class="card-title">Shea butter ultra rich face cream</h5>
                            <p class="card-text">This universal cream melts into your skin, offering instant comfort to dry and sensitive skin and leaves it nourished for up to 48 hours.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted">$63.00</span>
                                <a href="#" class="btn btn-primary mt-3 add-to-cart">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>                

                <!-- face five: Sculpting & nourishing set -->
                <div class="col">
                    <div class="card h-100">
                        <img src="images/norish.png" class="card-img-top" alt="Sculpting & nourishing set">
                        <div class="card-body">
                            <h5 class="card-title">Sculpting & nourishing set</h5>
                            <p class="card-text">Sculpting & Nourishing Set includes Edobio White Jade Gua Sha, Intensive Hydration Serum, and the mini size of Glowing Night Gel Mask, all of which work together to provide optimum skincare benefits.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted">$65.00</span>
                                <a href="#" class="btn btn-primary mt-3 add-to-cart">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- face six: Radiance Ritual Set -->
                <div class="col">
                    <div class="card h-100">
                        <img src="images/ritual.png" class="card-img-top" alt="Radiance Ritual Set">
                        <div class="card-body">
                            <h5 class="card-title">Radiance Ritual Set</h5>
                            <p class="card-text">A set for sun-kissed radiant skin. Suitable for oily, combination, dull and sensitive skin.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted">$45.00</span>
                                <a href="#" class="btn btn-primary mt-3 add-to-cart">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>  

        <section id="hands">
            <h2>Hands</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <!-- hand one: Rose hand cream -->
                <div class="col">
                    <div class="card h-100">
                        <img src="images/rose.png" class="card-img-top" alt="Rose hand cream">
                        <div class="card-body">
                            <h5 class="card-title">Rose hand cream</h5>
                            <p class="card-text">Infused with shea butter and vitamin E, giving you a rich, luxurious texture.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted">$10.00</span>
                                <a href="#" class="btn btn-primary mt-3 add-to-cart">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                        
                <!-- hand two: Shea butter hand cream -->
                <div class="col">
                    <div class="card h-100">
                        <img src="images/sheal.png" class="card-img-top" alt="Shea butter hand cream">
                        <div class="card-body">
                            <h5 class="card-title">Shea butter hand cream</h5>
                            <p class="card-text">A rich, nourishing moisturizer that deeply hydrates and soothes dry skin, leaving hands feeling soft and smooth.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted">$30.50</span>
                                <a href="#" class="btn btn-primary mt-3 add-to-cart">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- hand three: Almond delicious hands -->
                <div class="col">
                    <div class="card h-100">
                        <img src="images/almondl.png" class="card-img-top" alt="Almond delicious hands">
                        <div class="card-body">
                            <h5 class="card-title">Almond delicious hands</h5>
                            <p class="card-text">Enriched with almond milk and oil, this silky-smooth cream helps to nourish and soften the hands while enveloping them with the scent of fresh almond.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted">$18.00</span>
                                <a href="#" class="btn btn-primary mt-3 add-to-cart">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- hand four: Cherry blossom hand cream -->
                <div class="col">
                    <div class="card h-100">
                        <img src="images/cherryl.png" class="card-img-top" alt="Cherry blossom hand cream">
                        <div class="card-body">
                            <h5 class="card-title">Cherry blossom hand cream</h5>
                            <p class="card-text">This lightly textured formula is non-greasy and contains shea butter and cherry extract from the Luberon region of Provence, helps to smooth and moisturize the skin.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted">$20.00</span>
                                <a href="#" class="btn btn-primary mt-3 add-to-cart">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- hand five: Pomegranate Noir hand cream -->
                <div class="col">
                    <div class="card h-100">
                        <img src="images/noirp.png" class="card-img-top" alt="Pomegranate Noir hand cream">
                        <div class="card-body">
                            <h5 class="card-title">Pomegranate Noir hand cream</h5>
                            <p class="card-text">Elevate your daily routine with caring Pomegranate Noir Hand Cream. With hyaluronic acid and clary sage extract, the formula is easily absorbed, and protects and moisturises skin. Leave skin scented with this intense, enigmatic fragrance.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted">$70.00</span>
                                <a href="#" class="btn btn-primary mt-3 add-to-cart">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- hand six: English pear & freesia hand cream -->
                <div class="col">
                    <div class="card h-100">
                        <img src="images/epear.png" class="card-img-top" alt="English pear & freesia hand cream">
                        <div class="card-body">
                            <h5 class="card-title">English pear & freesia hand cream</h5>
                            <p class="card-text">Elevate your daily routine with caring English Pear & Freesia Hand Cream. With hyaluronic acid and clary sage extract, the formula is easily absorbed, and protects and moisturises skin. Leave skin scented with this golden, luscious fruity fragrance.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted">$35.00</span>
                                <a href="#" class="btn btn-primary mt-3 add-to-cart">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>  

        <section id="eyes">
            <h2>Eyes</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <!-- eye one: Hydrating eye cream -->
                <div class="col">
                    <div class="card h-100">
                        <img src="images/eyescream.png" class="card-img-top" alt="Hydrating eye cream">
                        <div class="card-body">
                            <h5 class="card-title">Hydrating eye cream</h5>
                            <p class="card-text">Hydrating eye cream is a all-in-one cream that deeply moisturizes, combating dryness, eye bags, dullness, and fine lines. Resulting in brighter and revitalized eyes.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted">$35.00</span>
                                <a href="#" class="btn btn-primary mt-3 add-to-cart">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- eye two: Absolue cream yeux -->
                <div class="col">
                    <div class="card h-100">
                        <img src="images/yeuxeye.png" class="card-img-top" alt="Absolue cream yeux">
                        <div class="card-body">
                            <h5 class="card-title">Absolue cream yeux</h5>
                            <p class="card-text">Made with an exclusive blend of Grand Rose Extracts, this rejuvenating eye cream targets the delicate skin around the eyes, one of the face's most expressive features.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted">$215.00</span>
                                <a href="#" class="btn btn-primary mt-3 add-to-cart">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- eye three: Creamy eye treatment with avocado -->
                <div class="col">
                    <div class="card h-100">
                        <img src="images/avocado.png" class="card-img-top" alt="Creamy eye treatment with avocado">
                        <div class="card-body">
                            <h5 class="card-title">Creamy eye treatment with avocado</h5>
                            <p class="card-text">A hydrating and nourishing avocado eye cream.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted">$62.00</span>
                                <a href="#" class="btn btn-primary mt-3 add-to-cart">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- eye four: Water bank blue hyaluronic -->
                <div class="col">
                    <div class="card h-100">
                        <img src="images/blue.png" class="card-img-top" alt="Water bank blue hyaluronic">
                        <div class="card-body">
                            <h5 class="card-title">Water bank blue hyaluronic</h5>
                            <p class="card-text">This eye cream firms the skin and relieves dark eye circles and puffiness through the repair and moisturizing effect of Blue Hyaluronic Acid, 1/2000 of the original size.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted">$59.00</span>
                                <a href="#" class="btn btn-primary mt-3 add-to-cart">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- eye five: Reset eye serum -->
                <div class="col">
                    <div class="card h-100">
                        <img src="images/reset.png" class="card-img-top" alt="Reset eye serum">
                        <div class="card-body">
                            <h5 class="card-title">Reset eye serum</h5>
                            <p class="card-text">Overnight Reset Eye Serum will help you to wake-up to well-rested eyes, as if you got extra hours of beauty sleep.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted">$95.00</span>
                                <a href="#" class="btn btn-primary mt-3 add-to-cart">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- eye six: Energising eye cream -->
                <div class="col">
                    <div class="card h-100">
                        <img src="images/forestmd.png" class="card-img-top" alt="Energising eye cream">
                        <div class="card-body">
                            <h5 class="card-title">Energising eye cream</h5>
                            <p class="card-text">This luxurious, super-light eye cream treats the skin around the eyes, energising it for a fresher, more rested look.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted">$80.00</span>
                                <a href="#" class="btn btn-primary mt-3 add-to-cart">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>  

        <button onclick="topFunction()" id="myBtn" title="Go to top">Back to Top</button>
        <?php include "inc/footer.inc.php"; ?>
        
        <script>
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
      } else {
        document.getElementById("myBtn").style.display = "none";
      }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      document.body.scrollTop = 0; // For Safari
      document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }
</script>
    </body>
</html>


<?php
//include "../../config.php";
require '../include.php';
session_start();
if(!isset($_SESSION['mail']) ) {
    $_SESSION['page2'] = $_SERVER['REQUEST_URI'];
    header('location:login/login.html');
}
$Titre="Contact";
require 'header.php';
?>



<!-- Mobile Menu End -->
<!-- Map Area Start -->
<div class="map-area">
    <div id="googleMap" style="width:100%;height:445px;"></div>
</div>
<!-- Map Area End -->
<!-- Address Information Area Start -->
<div class="address-info-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-4 hidden-sm">
                <div class="address-single">
                    <div class="all-adress-info">
                        <div class="icon">
                            <span><i class="fa fa-user-plus"></i></span>
                        </div>
                        <div class="info">
                            <h3>PHONE</h3>
                            <p>+(216)-71-342-462</p>
                            <p>+(216)-71-344-202</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="address-single">
                    <div class="all-adress-info">
                        <div class="icon">
                            <span><i class="fa fa-map-marker"></i></span>
                        </div>
                        <div class="info">
                            <h3>ADDRESS</h3>
                            <p>46-50,Rue des Slines</p>
                            <p>Le Passage, Tunis.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="address-single no-margin">
                    <div class="all-adress-info">
                        <div class="icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="info">
                            <h3>E-MAIL</h3>
                            <p>contact@centretunisdulivre.com</p>
                            <p>www.centretunisdulivre.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Address Information Area End -->
<!-- Contact Form Area Start -->
<div class="contact-form-area">
    <div class="container">
        <div class="about-title">
            <h3>LEAVE A MESSAGE</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="ajouterReclamation.php">

                    <div class="col-md-7">
                        <div class="contact-form-right">
                            <div class="input-message">
                                <textarea name="msg" id="message" required placeholder="Your Message"></textarea>
                                <p id="b4"></p>

                                <input class="btn btn-default" type="submit" value="SEND" name="submit" id="submit" onclick="test()" >


                            </div>

                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- Contact Form Area End -->
<!-- Footer Area Start -->
<?php require "footer.php"?>
<!-- Footer Area End -->
<!-- all js here -->
<!-- jquery latest version -->
<script src="js/vendor/jquery-1.12.0.min.js"></script>
<!-- bootstrap js -->
<script src="js/bootstrap.min.js"></script>
<!-- owl.carousel js -->
<script src="js/owl.carousel.min.js"></script>
<!-- jquery-ui js -->
<script src="js/jquery-ui.min.js"></script>
<!-- jquery Counterup js -->
<script src="js/jquery.counterup.min.js"></script>
<script src="js/waypoints.min.js"></script>
<!-- jquery countdown js -->
<script src="js/jquery.countdown.min.js"></script>
<!-- jquery countdown js -->
<script type="text/javascript" src="venobox/venobox.min.js"></script>
<!-- jquery Meanmenu js -->
<script src="js/jquery.meanmenu.js"></script>
<!-- wow js -->
<script src="js/wow.min.js"></script>
<script>
    new WOW().init();
</script>
<!-- scrollUp JS -->
<script src="js/jquery.scrollUp.min.js"></script>
<!-- plugins js -->
<script src="js/plugins.js"></script>
<!-- Nivo slider js -->
<script src="lib/js/jquery.nivo.slider.js" type="text/javascript"></script>
<script src="lib/home.js" type="text/javascript"></script>
<!-- Google Map js -->
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script>
    function initialize() {
        var mapOptions = {
            zoom: 16,
            scrollwheel: false,
            center: new google.maps.LatLng(23.763474, 90.431483)
        };
        var map = new google.maps.Map(document.getElementById('googleMap'),
            mapOptions);
        var marker = new google.maps.Marker({
            position: map.getCenter(),
            animation:google.maps.Animation.BOUNCE,
            icon: 'img/map-icon.png',
            map: map
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
<!-- main js -->
<script src="js/main.js"></script>
<script src="contact.js"></script>
</body>
</html>
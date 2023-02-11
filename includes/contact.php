<?php
if(isset($_POST['sendMessage'])){
$contactInsert = $os->contactInsert($_POST);
}
?>
<section id="page-indicators">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-left">
                <h3>Contact us</h3>
            </div>

            <div class="col-md-6">
                <div class="page-url text-right">
                    <ul>
                        <li><a href="index.php"><i class="fa fa-th"></i> Home</a> / <a>Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="contact" class="contact-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="headingWithcontrolbutton">
                    <div class="row">
                        <div class="col-sm-4">
                            <h3>Get In Touch With Us</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top:20px;">
            <div class="col-md-4">
                <h4>Our Office</h4>
                <ul class="contact-info">
                    <?php
$showAddress = $cat->showAddress();

if($showAddress){
$i = 0;
while($result = $showAddress->fetch_assoc()){
$i++;
?>
                    <li><i class="fa fa-map-marker"></i> <?php echo $result['address'];?></li>
                    <li><i class="fa fa-phone"></i> Contact: <?php echo $result['contact'];?></li>
                    <li><i class="fa fa-envelope"></i> Email: <?php echo $result['email'];?></li>
                    <?php } } ?>
                </ul>
            </div>
            <div class="col-md-8 form-horizontal">
                <?php 
if(isset($contactInsert)){
echo $contactInsert;
}
?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="col-sm-2 control-label">
                            First Name:
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="firstName" required />
                        </div>

                        <div class="col-sm-2 control-label">
                            Last Name:
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="lastName" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 control-label">
                            Email:
                        </div>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 control-label">
                            Contact:
                        </div>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="contact" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-2 control-label">
                            Message:
                        </div>
                        <div class="col-sm-10">
                            <textarea rows="8" cols="30" name="message" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <div class="col-md-12">
                            <input type="submit" name="sendMessage" value="Send Your Message" class="btn btn-default" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<section id="default">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="headingWithcontrolbutton">
                    <div class="row">
                        <div class="col-sm-4">
                            <h3>Our Location In Google Map</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <img src="images/map.jpg" class="img-responsive">
                <!--<div id="map"></div>-->
            </div>
        </div>
    </div>
</section>
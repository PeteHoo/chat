@include('header')
<?php
if($_POST)
{
    $to_email       = "imma.da.bad	@gmail.com"; //Recipient email, Replace with own email here
    $from_email     = 'noreply@your_domain.com'; //from mail, it is mandatory with some hosts and without it mail might endup in spam.
    
    //check if its an ajax request, exit if not
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        
        $output = json_encode(array( //create JSON data
            'type'=>'error', 
            'text' => 'Sorry Request must be Ajax POST'
        ));
        die($output); //exit script outputting json data
    } 
    
    //Sanitize input data using PHP filter_var().
    $user_name      = filter_var($_POST["user_name"], FILTER_SANITIZE_STRING);
    $user_email     = filter_var($_POST["user_email"], FILTER_SANITIZE_EMAIL);
	$subject        = filter_var($_POST["subject"], FILTER_SANITIZE_STRING);
    $message        = filter_var($_POST["msg"], FILTER_SANITIZE_STRING);
    
    //additional php validation
    if(strlen($user_name)<4){ // If length is less than 4 it will output JSON error.
        $output = json_encode(array('type'=>'error', 'text' => 'Name is too short or empty!'));
        die($output);
    }
    if(!filter_var($user_email, FILTER_VALIDATE_EMAIL)){ //email validation
        $output = json_encode(array('type'=>'error', 'text' => 'Please enter a valid email!'));
        die($output);
    }
    if(strlen($message)<3){ //check emtpy message
        $output = json_encode(array('type'=>'error', 'text' => 'Too short message! Please enter something.'));
        die($output);
    }
    
    //email body
    $message_body = $message."\r\n\r\n-".$user_name."\r\nEmail : ".$user_email ;
    
    //proceed with PHP email.
    $headers = 'From: '. $from_email .'' . "\r\n" .
    'Reply-To: '.$user_email.'' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    
    $send_mail = mail($to_email, $subject, $message_body, $headers);
    
    if(!$send_mail)
    {
        //If mail couldn't be sent output error. Check your PHP email configuration (if it ever happens)
        $output = json_encode(array('type'=>'error', 'text' => 'Could not send mail! Please check your PHP mail configuration.'));
        die($output);
    }else{
        $output = json_encode(array('type'=>'message', 'text' => 'Hi '.$user_name .' Thank you for your email'));
        die($output);
    }
}
?>
    <!-- /Section: intro -->

    <!-- /////////////////////////////////////////Content -->
    <div id="page-content">

        <!-----------------Content-------------------->
        <section class="box-content">
            <div class="container">
                <div class="row">

                    <div class="col-md-4 box-item">
                        <h3>Contact Info</h3>
                        <span>SED UT PERSPICIATIS UNDE OMNIS ISTE NATUS ERROR SIT VOLUPTATEM ACCUSANTIUM DOLOREMQUE LAUDANTIUM, TOTAM REM APERIAM.</span><br> <br>
                        <p>JL.Kemacetan timur no.23. block.Q3<br>
                            Jakarta-Indonesia</p>
                        <p>+6221 888 888 90 <br>
                            +6221 888 88891</p>
                        <p>info@yourdomain.com</p>
                    </div>
                    <div class="col-md-8">
                        <h3>Contact Form</h3>
                        <form id="contact_form"  class="wow fadeInUp" data-wow-delay=".1s" data-wow-duration="1s">
                            <div class="row">
                                <!-- Name -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name" required>
                                    </div>
                                </div>
                                <!-- Email -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Subject -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required />
                                    </div>
                                </div>
                            </div>
                            <!-- Message -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea style="height: 200px" class="form-control" name="message" id="message" rows="5" placeholder="Your Message" required></textarea>
                                    </div>
                                    <a type="submit" id="form-submit" class="btn btn-skin btn-block" id="submit_btn">Submit</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!--////////////////////////////////////Footer-->
@include('footer')
    <!-- Footer -->
    <div id="page-top"><a href="#page-top" class="btn btn-toTop"><i class="fa fa-angle-double-up"></i></a></div>

    <!-- JS -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/jquery.localScroll.min.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/SmoothScroll.js"></script>
    <script src="js/wow.min.js"></script>



    <!-- Definity JS -->
    <script src="js/main.js"></script>
<script>
    $('#form-submit').on('click',function () {
        $.ajax({
            url:'contact_submit',
            data:$('#contact_form').serialize(),
            success:function (data) {
                console.log(data);
            if(data.status==200){
              alert(data.msg);
               }else{
                alert(data.msg);
                location.href='login';
            }
            }
        })
    })
</script>
</div>
</body>
</html>

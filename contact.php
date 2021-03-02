<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="recipePhotos/headshot_removebg_preview_HlF_icon.ico">
    
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
    include 'navigation.php';
    $msg = '';
    $msgClass = '';

    //Check for submit
    if(filter_has_var(INPUT_POST, 'submit')){
        //Get form data
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);
        
        if(!empty($email) && !empty($name) && !empty($message)){
            //Check Email
            if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                $msg = 'Please fill in a valid email address';
                $msgClass = 'alertDanger';
            } else {
                $msg = 'Your form was successfully submitted';
                $msgClass = 'alertSuccess';

                $toEmail = 'stephan.iskander@gmail.com';
                $subject = 'PersonalWebsite Contact Request From '.$name;
                $body = '<h2>Contact Request</h2>
                    <h4>Name</h4><p>'.$name.'</p>
                    <h4>Email</h4><p>'.$email.'</p>
                    <h4>Message</h4><p>'.$message.'</p>
                ';

                //email headers
                $headers = "MIME-Version: 1.0"."\r\n";
                $headers .="Content-Type:text/html;charset=UTF-8"."\r\n";
                
                $headers .= "From: ".$name."<".$email.">"."\r\n";

                if(mail($toEmail, $subject, $body, $headers)){
                    $msg = 'Your form email was successfully submitted';
                    $msgClass = 'alertSuccess';
                } else {
                    $msg = 'Your email was not successful';
                    $msgClass = 'alertDanger';
                }
            }
        } else {
            $msg = 'Please fill in all fields';
            $msgClass = 'alertDanger';
        }
    
    }
?>  

<div id="contactPage">

    <div id="contactContainer">
        <h1>Contact Me!</h1>
        <hr>
        <?php if($msg != ''): ?>
            <div class="alert <?php echo $msgClass; ?>"><?php echo $msg ?></div>
        <?php endif; ?>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="formGroup">
                <label>Name: </label>
                <input type="text" name="name" class="form-control" value="<?php echo isset($_POST['name']) ? $name : ''; ?>" placeholder="Your Name..."/>
            </div>
            <div class="formGroup">
                <label>Email: </label>
                <input type="text" name="email" class="form-control" value="<?php echo isset($_POST['email']) ? $email : ''; ?>" placeholder="Your Email..."/>
            </div>
            <div class="formGroup">
                <label>Message: </label>
                <textarea name="message" class="form-control" placeholder="Your Message..."><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>
            </div>
            <br>
            <input type="submit" name="submit" class="" /></button>
            
        
        </form>
    </div>
    

</div>



</body>
<script src="app.js"></script>

<?php
$cform = TRUE;
    include 'footer.php';
?>
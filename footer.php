<footer>
    <div class="fDisplay">
        <?php 
            //Conditional footer dependent on if user is on the contact page
            if ($cform == TRUE){
                echo '<p>Designed By: Stephan Iskander</p>';
            }
            else{
                echo '<a href="contact.php">Contact Me</a>';
            }
        ?>
    </div>
</footer>


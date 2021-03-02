<!DOCTYPE html>
<html>

<head>
    <title>Welcome</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="recipePhotos/headshot_removebg_preview_HlF_icon.ico">


</head>


<body>
   
    <?php
        include 'navigation.php'
    ?>
    

    <div id="landing-image">
        <h1>Stephaniskander.org</h1>
        <p>By: Stephan Iskander</p>
    </div>

    <div class="welcome-area">
        <div class="welcome-text">
            <h1>Welcome and Thanks for Visiting!</h1>
            <br>
            <h3>Whats the point of this site?</h3>
            <ol>
                <li>Build on and practice foundational <abbr title="HTML5/CSS/JavaScript/PHP"><strong>WebDev Skills.</strong></abbr></li>
                <li>Provide myself, family and friends with my 'go-to' <strong>recipes.</strong></li>
                <li>Continously add my 'big-impact' interests to the website:
                    <ul style="list-style-type:disc">
                        <li>My favourite charities</li>
                        <li>Documenting and writing about my hobbies (BJJ/MMA, Music, Scuba Diving, Snowboarding and Travel)</li>
                        <li>Collection of my favourite books and articles</li>
                    </ul>
                </li>

                <li>I will use this website as a public biography/journal for when I get old, to look back on...</li>
            </ol>
            <br>
            <h3>So where do I go from here?</h3>
                
                    <a href="recipePreviewPage.php">Check out my ever growing list of recipes!</a>
                    <a href="recipes.php?index=1">Maybe your in the mood for some lebanese style garlic sauce? 🤔</a>
                    <a href="contact.php">Send me some recipes or feedback on the website!</a>
               
        </div>
    </div>

    <?php
        $cform = FALSE;
        include 'footer.php';
    ?>
    
    
</body>
<script src="app.js"></script>
</html>
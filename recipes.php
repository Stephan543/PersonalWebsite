<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="headshot_removebg_preview_HlF_icon.ico">
    
    <link rel="stylesheet" href="style.css">
</head>

<body>
    
<?php
    include 'navigation.php';
    
    $recipeFile = file_get_contents('recipes.json');
    $recipesArray = json_decode($recipeFile,true);
    $recipes = $recipesArray['recipes'];
    $index = $_GET['index'];
    $selectedRecipe = $recipes[$index];
    $recipeTitle = $selectedRecipe['name'];
    $recipePicture = $selectedRecipe['photoHeader'];

    $instructions = $selectedRecipe['instructions'];

?>


<div id="recipePage">
 
    <div class="imgHeader">
        <img src="<?php echo $recipePicture ?>" alt="">
    </div>
    <div class="recipeTitle">
        <h2><?php echo $recipeTitle ?></h2>
    </div>
    <div id="servingInfo"></div>

    <div id="ingredients">
        <h2>Ingredients:</h2>
        <ol></ol>
    </div>

    <div id="instructions">
        <h1>Instructions:</h1>
        <ol>
        <?php foreach($instructions as $i): ?>
            <li><?php echo $i; ?></li>
        <?php endforeach; ?>
        </ol>

    </div>

</div>

<?php
    $cform = FALSE;
    include 'footer.php'
?>
</body>
<script>
    var jIndex = <?php echo $index ?>; //Passing php page to JS var for app
</script>
<script src="app.js"></script>



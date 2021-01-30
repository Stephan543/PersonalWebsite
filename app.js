const navSlide = () => {
    const button = document.querySelector('.button');
    const nav = document.querySelector('.navLinks');
    const navLinks = document.querySelectorAll('.navLinks li'); //It is at this point I realize I should not use camel back in HTML/CSS


    //toggle view
    nav.classList.toggle('navActive');

    //Button animation
    button.classList.toggle('toggle');
    
    //animation delay for links
    navLinks.forEach((link,index) =>{
        if(link.style.animation){ //function to handle animation after menu open
            link.style.animation = ``;
        } else{
            link.style.animation = `navLinkFade 0.5s ease forwards ${index / 5 + 0.5}s`;
        }    
    });
}


//XMLhttp Object Request, ref my personal JSON Recipe database
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200){
        var response = JSON.parse(xhttp.responseText);
        var recipes = response.recipes;
        var blurb = document.getElementById("recipePreviewBlurb");
        var feed = document.getElementById("recipeFeed");

        //Function that creates each recipe card for recipePreview Page
        function createPreviewLiteral(x){
            var out=``;
            //for loop to pass through all the elements in the JSON database
            for (i=0; i < x; i++){  
                out += `
                <a href="recipes.php?index=${i}">
                <div id="recipePreview">
                    <img class="thumbnail" src="${recipes[i].photoThumbnail}">
                    <div class="recipePreviewText">
                        <h2>${recipes[i].name} </h2>
                        <p>${recipes[i].description}</p>
                    </div>
                </div>
                </a>
                `;
            }
            return out;
        }

        var path = window.location.pathname; //getting the window path location
        var page = path.split("/").pop(); //Spliting up the paths by the / operatior, pop off the end of the array and store it
        
        if(page == 'recipePreviewPage.php'){
            blurb.innerHTML = `
                <h1>There are only ${recipes.length} recipes at the moment...
                <br>
                I will add and update, so send me your favourites!</h1>
                `; // Recipe Feed Header - done in JS that way I can update the database count in the browser

            // Passing the function to the html feel for the length of the database
            feed.innerHTML =  `
            ${createPreviewLiteral(recipes.length)} 
            `;
        };
        


        function changeQuantity(defaultServing, newServing, iQuantity){
            multiplier = newServing/defaultServing;
            return iquantity * multiplier
        }

        //Main Recipe Page Template Literal
        if(page == 'recipes.php'){
            var currentRecipe = recipes[jIndex];
            defaultServing = currentRecipe.serving;
            var ingredients = currentRecipe.ingredients;
            document.getElementById('servingInfo').innerHTML = `
            <h2>Adjustbale Info:</h2>
            
            <p><strong>Quantity: </strong><input type="number" placeholder="${defaultServing.quantity}"></p>
            <p>${defaultServing.size + ' ' + defaultServing.unit + ' ' + defaultServing.type}</p>
            `;

            const quantityInput = document.querySelector('p input');
            var ingredientsList = document.querySelector('#ingredients > ol');
            
            function populateIngredients(x){
                var out=''
                 
                for(i=0; i < ingredients.length; i++){
                    var ingredientsIndex = ingredients[i];
                    var quantity = (x/defaultServing.quantity)*ingredientsIndex.quantity;
                    
                    out += `
                    <li>${ingredientsIndex.name + '     (' + quantity.toFixed(2) + ' ' + ingredientsIndex.unit})</li>
                    ` ;
                }
                return out;
            
            }
            
            ingredientsList.innerHTML = populateIngredients(defaultServing.quantity);
            
            function updateIndredients(){
                const newQuantity = parseFloat(quantityInput.value);
                ingredientsList.innerHTML = populateIngredients(newQuantity);
            }

            quantityInput.addEventListener('input', updateIndredients);

            //console.log(recipes[jIndex]);
            
            //loop through recipe ingredients
            for(i=0; i < currentRecipe.ingredients.length; i++){
                var iQuantity = currentRecipe.ingredients[i].quantity;
                
            
            };
        
            // document.getElementById('recipePage').innerHTML = recipes[jIndex].ingredients;

        };
        
    }
};
xhttp.open("GET","recipes.json", true);
xhttp.send();
    



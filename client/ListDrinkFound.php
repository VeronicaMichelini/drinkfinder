                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         <?php
$width = 180;
$height = 180;
if(isset($_GET["name"]))
{
    echo "<b>".$_GET["name"]."</b>"; 
    $url = "https://drinkfinder.herokuapp.com/ws/GetDrink.php?name=".$_GET["name"];
   
    
    $pagina = file_get_contents($url);
		
		// json_decode interpreta il file json
		// gli passo come parametri la pagina (in formato json) e il valore booleano true
		// che sta ad indicare che l'oggetto restituito sar� convertito in un array associativo
		// assegno alla variabile json_output il risultato della funzione
		$data = json_decode($pagina,true);
 
		echo "<br>";
    if($data["status"]>=200 && $data["status"]<300) 
    {
        $data = $data["data"];
        for ($i=0; 
        $i < count($data["drinkName"]); 
        $i++) 
        {
        	// stampa del nome del cocktail
            echo "<b>Drink:</b> ".$data["drinkName"][$i];
            echo "<br>";
            
            //stampa dell'immagine del cocktail
            if(isset($data["drinkImage"][$i]) && $data["drinkImage"][$i] != "null"){
            	$img = $data["drinkImage"][$i];
            	echo "<img src=\"$img\" width=\"$width\" height=\"$height\"><br><br>";
            }
            else
                echo "<img src= .\default.jpg>";
            echo "<br>";

            // stampa della categoria del cocktail
            if(isset($data["drinkCategory"][$i]) && $data["drinkCategory"][$i] != "null" )
                echo "<b>Category:</b> ".$data["drinkCategory"][$i];
            else
                echo "Cagtegory: not present";
            echo "<br>";
            
            // stampa se cocktail � alcolico oppure no
            if(isset($data["drinkAlcoholic"][$i]) && $data["drinkAlcoholic"][$i] != "null" )
                echo "<b>Alcholic:</b> ".$data["drinkAlcoholic"][$i];
            else
                echo "Alcholic: not present";
            echo "<br>";

           // stampa se cocktail � dolce oppure no
            if(isset($data["drinkGlass"][$i]) && $data["drinkGlass"][$i] != "null" )
                echo "<b>Glass:</b> ".$data["drinkGlass"][$i];
            else
                echo "Glass: not present";
            echo "<br>";

            // stampa della ricetta del cocktail
            if(isset($data["drinkInstructions"][$i]) && $data["drinkInstructions"][$i] != "null" )
                echo "<b>Instructions:</b> ".$data["drinkInstructions"][$i];
            else
                echo "Instructions: not present";
            echo "<br>";
            
            // stampa degli ingredienti del cocktail
            $ingredients = "";
            if(isset($data["drinkIngredient1"][$i]) && $data["drinkIngredient1"][$i] != "null" )
               $ingredients = $ingredients.$data["drinkIngredient1"][$i];
           	if(isset($data["drinkIngredient2"][$i]) && $data["drinkIngredient2"][$i] != "null" )
               $ingredients = $ingredients.", ".$data["drinkIngredient2"][$i];
           	if(isset($data["drinkIngredient3"][$i]) && $data["drinkIngredient3"][$i] != "null" )
               $ingredients = $ingredients.", ".$data["drinkIngredient3"][$i];
           	if(isset($data["drinkIngredient4"][$i]) && $data["drinkIngredient4"][$i] != "null" )
               $ingredients = $ingredients.", ".$data["drinkIngredient4"][$i];
           
           echo "<b>Ingredients:</b> ".$ingredients;
           echo "<br>";
           
           // stampa delle dosi del cocktail
           $measures = "";
			if(isset($data["drinkMeasure1"][$i]) && $data["drinkMeasure1"][$i] != "null" )
				$measures = $measures.$data["drinkMeasure1"][$i];
			if(isset($data["drinkMeasure2"][$i]) && $data["drinkMeasure2"][$i] != "null" )
				$measures = $measures.", ".$data["drinkMeasure2"][$i];
			if(isset($data["drinkMeasure3"][$i]) && $data["drinkMeasure3"][$i] != "null" )
				$measures = $measures.", ".$data["drinkMeasure3"][$i];
			if(isset($data["drinkMeasure4"][$i]) && $data["drinkMeasure4"][$i] != "null" )
				$measures = $measures.", ".$data["drinkMeasure4"][$i];
            
			echo "<b>Ingredients:</b> ".$measures;
			echo "<br>";
			
            echo "<br>";
            //echo "<br>";
            //echo "<br>";
            echo "<hr>";
        }
    }
}

?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         <?php
if(isset($_GET["name"]))
{
    echo "<strong>What we found for: </strong>".$_GET["name"]; 
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
            echo "Drink: ".$data["drinkName"][$i];
            echo "<br>";

            if(isset($data["drinkImage"][$i]) && $data["drinkImage"][$i] != "null")
            	echo "<img src=".$data["drinkImage"][$i].">";
            else
                echo "<img src= .\default.jpg>";
            echo "<br>";

            if(isset($data["drinkCategory"][$i]) && $data["drinkCategory"][$i] != "null" )
                echo "Category: ".$data["drinkCategory"][$i];
            else
                echo "Cagtegory: ND";
            echo "<br>";
            
            if(isset($data["drinkAlcoholic"][$i]) && $data["drinkAlcoholic"][$i] != "null" )
                echo "Alcholic: ".$data["drinkAlcoholic"][$i];
            else
                echo "Alcholic: ND";
            echo "<br>";

            if(isset($data["drinkGlass"][$i]) && $data["drinkGlass"][$i] != "null" )
                echo "Glass: ".$data["drinkGlass"][$i];
            else
                echo "Glass: ND";
            echo "<br>";

            if(isset($data["drinkInstructions"][$i]) && $data["drinkInstructions"][$i] != "null" )
                echo "Instructions: ".$data["drinkInstructions"][$i];
            else
                echo "Instructions: ND";
            echo "<br>";
            $ingredients = "";
            if(isset($data["drinkIngredient1"][$i]) && $data["drinkIngredient1"][$i] != "null" )
               $ingredients = $ingredients.$data["drinkIngredient1"][$i];
           if(isset($data["drinkIngredient2"][$i]) && $data["drinkIngredient2"][$i] != "null" )
               $ingredients = $ingredients.", ".$data["drinkIngredient2"][$i];
           if(isset($data["drinkIngredient3"][$i]) && $data["drinkIngredient3"][$i] != "null" )
               $ingredients = $ingredients.", ".$data["drinkIngredient3"][$i];
           if(isset($data["drinkIngredient4"][$i]) && $data["drinkIngredient4"][$i] != "null" )
               $ingredients = $ingredients.", ".$data["drinkIngredient4"][$i];
           
           echo "Ingredients: ".$ingredients;
            echo "<br>";
            
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<hr>";
        }
    }
}
?>
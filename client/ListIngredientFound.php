                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         <?php
$width = 120;
$height = 120;
if(isset($_GET["name"]))
{
    echo "<b>".$_GET["name"]."</b>"; 
    $url = "https://drinkfinder.herokuapp.com/ws/GetIngredient.php?name=".$_GET["name"];
   
    
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
        $i < count($data["ingredientName"]); 
        $i++) 
        {
        	// stampa del nome del cocktail
            echo "<b>Ingredient:</b> ".$data["ingredientName"][$i];
            echo "<br>";
            
            //stampa dell'immagine del cocktail
            if(isset($data["ingredientImage"][$i]) && $data["ingredientImage"][$i] != "null"){
            	$img = $data["ingredientImage"][$i];
            	echo "<img src=\"$img\" width=\"$width\" height=\"$height\"><br><br>";
            }
            else
                echo "<img src= .\default.jpg>";
            echo "<br>";

        }
    }
}
?>
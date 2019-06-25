<?php
// includo il file contenente le funzioni e il file html
require ("GetData.php");
header("Content-Type:application/json");
//dichiarazione e inizializzazione variabili
$redirect_page = "";
$output = "";

// controllo se è stato inserito un titolo nell'apposito spazio
// acquisisco il titolo con il metodo GET in modo da poterlo accodare all'url e visualizzarlo
if(isset($_GET['name']))
{
	// assegno alla variabile title il titolo inserito dall'utente 
	$name = $_GET['name'];
	
	if(!empty($name))
	{
		$stringa_decodificata = urlencode($name);
		
		// accodo il nome del cocktail inseriro all''url
		$url = 'https://www.thecocktaildb.com/api/json/v1/1/search.php?s='.$stringa_decodificata;
		
		$data = getData($url);
		
		if($data["drinks"] == null || count($data["drinks"]) == 0 )
		{
			// non trovato : codice di stato -> 404
			deliver_response(204,"Assente",NULL);
		}else
		{	
			// richiamo alla funzione get_info
		$info = get_drinks($data);
			// trovato : codice di stato -> 200
			deliver_response(200,"Presente",$info);
		}
    }else
    {
    	// errore richiesta : codice di stato -> 400
    	deliver_response(400,"Rischiesta non valida",NULL);
    }
    
}

// funzione per estrarre le informazioni. le informazioni che verranno visualizzate sono:
// nome, categoria, alcolino/analcolico, dolce/amaro, ricetta
// ingrediente1 , 2 , 3 , 4 e quantità1 ,2, 3, 4
function get_drinks($output)
{
	// dichiarazione e inizializzazione delle variabili
//	$width = 150;
	//$height = 150;
	
	// stampa dell'immagine relativa al cocktail ricercato
	//$img = $output["drinks"][0]['strDrinkThumb'];
	//echo "<img src=\"$img\" width=\"$width\" height=\"$height\"><br><br>";
	
	$info = array('drinkName' => [],
		'drinkImage' =>[],
					'drinkCategory' => [],
					'drinkAlcoholic' => [],
					'drinkGlass' => [],
					'drinkInstructions' => [],
					'drinkIngredient1' => [],
					'drinkIngredient2' => [],
					'drinkIngredient3' => [],
					'drinkIngredient4' => [],
					'drinkMeasure1' =>  [],
					'drinkMeasure2' =>  [],
					'drinkMeasure3' =>  [],
					'drinkMeasure4' =>  []
					);
	
	for ($i = 0; 
		 $i < count($output["drinks"]) ; 
		 $i++)
	{
		
		
		// se strDrink di drinks[i] è presente	
		if(!empty($output["drinks"][$i]["strDrink"]))
			// assegno il suo valore all'array strDrink
			$info['drinkName'][$i] = $output["drinks"][$i]["strDrink"];
		else
			// altrimenti gli assegno la stringa null
			$info['drinkName'][$i] = "null";
			
			// se strDrink di drinks[i] è presente	
		if(!empty($output["drinks"][$i]["strDrinkThumb"]))
			// assegno il suo valore all'array strDrink
			$info['drinkImage'][$i] = $output["drinks"][$i]["strDrinkThumb"];
		else
			// altrimenti gli assegno la stringa null
			$info['drinkImage'][$i] = "null";

		// se strCategory di drinks[i] è presente	
		if(!empty($output["drinks"][$i]["strCategory"]))
			// assegno il suo valore all'array strCategory
			$info['drinkCategory'][$i] = $output["drinks"][$i]["strCategory"];
		else
			// altrimenti gli assegno la stringa null
			$info['drinkCategory'][$i] = "null";
			
		// se strAlcoholic di drinks[i] è presente		
		if(!empty($output["drinks"][$i]["strAlcoholic"]))
			// assegno il suo valore/i suoi valori all'array strAlcoholic
			$info['drinkAlcoholic'][$i] = $output["drinks"][$i]["strAlcoholic"];
		else
			// altrimenti gli assegno la stringa null
			$info['drinkAlcoholic'][$i] = "null";	
			
		// se strGlass di drinks[i] è presente	
		if(!empty($output["drinks"][$i]["strGlass"]))
			// assegno il suo valore/i suoi valori all'array strGlass
			$info['drinkGlass'][$i] = $output["drinks"][$i]["strGlass"];
		else
			// altrimenti gli assegno la stringa null
			$info['drinkGlass'][$i] = "null";	
			
		// se strInstructions di drinks[i] è presente
		if(!empty($output["drinks"][$i]["strInstructions"]))
			// assegno il suo valore all'array strInstructions
			$info['drinkInstructions'][$i] = $output["drinks"][$i]["strInstructions"];
		else
			// altrimenti gli assegno la stringa null
			$info['drinkInstructions'][$i] = "null";
			
		// se nome strIngredient1 di drinks[i] è presente	
		if(!empty($output["drinks"][$i]["strIngredient1"]))
			// assegno il suo valore/i suoi valori all'array strIngredient1
			$info['drinkIngredient1'][$i] = $output["drinks"][$i]["strIngredient1"];
		else
			// altrimenti gli assegno la stringa null
			$info['drinkIngredient1'][$i] = "null";
			
		// se nome strIngredient2 di drinks[i] è presente	
		if(!empty($output["drinks"][$i]["strIngredient2"]))
			// assegno il suo valore/i suoi valori all'array strIngredient2
			$info['drinkIngredient2'][$i] = $output["drinks"][$i]["strIngredient2"];
		else
			// altrimenti gli assegno la stringa null
			$info['drinkIngredient2'][$i] = "null";
			
		// se nome strIngredient3 di drinks[i] è presente	
		if(!empty($output["drinks"][$i]["strIngredient3"]))
			// assegno il suo valore/i suoi valori all'array strIngredient3
			$info['drinkIngredient3'][$i] = $output["drinks"][$i]["strIngredient3"];
		else
			// altrimenti gli assegno la stringa null
			$info['drinkIngredient3'][$i] = "null";
			
		// se nome strIngredient4 di drinks[i] è presente	
		if(!empty($output["drinks"][$i]["strIngredient4"]))
			// assegno il suo valore/i suoi valori all'array strIngredient4
			$info['drinkIngredient4'][$i] = $output["drinks"][$i]["strIngredient4"];
		else
			// altrimenti gli assegno la stringa null
			$info['drinkIngredient4'][$i] = "null";
			
		// se nome strMeasure1 di drinks[i] è presente	
		if(!empty($output["drinks"][$i]["strMeasure1"]))
			// assegno il suo valore/i suoi valori all'array strMeasure1
			$info['drinkMeasure1'][$i] = $output["drinks"][$i]["strMeasure1"];
		else
			// altrimenti gli assegno la stringa null
			$info['drinkMeasure1'][$i] = "null";
			
		// se nome strMeasure2 di drinks[i] è presente	
		if(!empty($output["drinks"][$i]["strMeasure2"]))
			// assegno il suo valore/i suoi valori all'array strMeasure2
			$info['drinkMeasure2'][$i] = $output["drinks"][$i]["strMeasure2"];
		else
			// altrimenti gli assegno la stringa null
			$info['drinkMeasure2'][$i] = "null";
			
		// se nome strMeasure3 di drinks[i] è presente	
		if(!empty($output["drinks"][$i]["strMeasure3"]))
			// assegno il suo valore/i suoi valori all'array strMeasure3
			$info['drinkMeasure3'][$i] = $output["drinks"][$i]["strMeasure3"];
		else
			// altrimenti gli assegno la stringa null
			$info['drinkMeasure3'][$i] = "null";
			
		// se nome strMeasure4 di drinks[i] è presente	
		if(!empty($output["drinks"][$i]["strMeasure4"]))
			// assegno il suo valore/i suoi valori all'array strMeasure4
			$info['drinkMeasure4'][$i] = $output["drinks"][$i]["strMeasure4"];
		else
			// altrimenti gli assegno la stringa null
			$info['drinkMeasure4'][$i] = "null";
			
	}
		// ritorno l'array info
		return($info);		
}
?>
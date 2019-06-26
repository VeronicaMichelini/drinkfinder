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
		$url = 'https://www.thecocktaildb.com/api/json/v1/1/filter.php?i='.$stringa_decodificata;
		
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

// funzione per estrarre le informazioni
// le informazioni che verranno visualizzate sono: nome e immagine
function get_drinks($output)
{
	// dichiarazione e inizializzazione delle variabili
//	$width = 150;
	//$height = 150;
	
	// stampa dell'immagine relativa al cocktail ricercato
	//$img = $output["drinks"][0]['strDrinkThumb'];
	//echo "<img src=\"$img\" width=\"$width\" height=\"$height\"><br><br>";
	
	$info = array('ingredientName' => [],
					'ingredientImage' =>[]
					);
	
	for ($i = 0; 
		 $i < count($output["drinks"]) ; 
		 $i++)
	{

		// se strDrink di drinks[i] è presente	
		if(!empty($output["drinks"][$i]["strDrink"]))
			// assegno il suo valore all'array strDrink
			$info['ingredientName'][$i] = $output["drinks"][$i]["strDrink"];
		else
			// altrimenti gli assegno la stringa null
			$info['ingredientName'][$i] = "null";
			
			// se strDrink di drinks[i] è presente	
		if(!empty($output["drinks"][$i]["strDrinkThumb"]))
			// assegno il suo valore all'array strDrink
			$info['ingredientImage'][$i] = $output["drinks"][$i]["strDrinkThumb"];
		else
			// altrimenti gli assegno la stringa null
			$info['ingredientImage'][$i] = "null";

	}
		// ritorno l'array info
		return($info);		
}
?>
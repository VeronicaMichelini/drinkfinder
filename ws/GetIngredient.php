<?php
require ("GetData.php");
header("Content-Type:application/json");

//dichiarazione ed inizializzazione variabili locali
$output = "";

// controllo se � stato inserito un titolo nell'apposito spazio
// acquisisco il titolo con il metodo GET in modo da poterlo accodare all'url e visualizzarlo
if(isset($_GET['name']))
{
	// assegno alla variabile name il nome dell'ingrediente che � stato inserito dall'utente 
	$name = $_GET['name'];
	
	// se nome non � vuoto
	if(!empty($name))
	{
		// trasformo la stringa inserita dall'utente in url
    	// se il drink � composto da due nomi questi vengono uniti con il + nel mezzo
		$stringa_decodificata = urlencode($name);
		
		// accodo il nome dell'ingrediente inseriro all'url
		$url = 'https://www.thecocktaildb.com/api/json/v1/1/filter.php?i='.$stringa_decodificata;
		
		// richiamo la funzione getData
		$data = getData($url);
		
		// se non � presente nessun drink
		if($data["drinks"] == null || 
				count($data["drinks"]) == 0 )
		{
			// non trovato : codice di stato -> 204
			deliver_response(204,"Assente",NULL);
		}else
		{	
			// richiamo alla funzione get_info
		$info = get_drinks($data);
			// trovato : codice di stato -> 200
			deliver_response(200,"Presente",$info);
		}
    }else
    	// errore richiesta : codice di stato -> 400
    	deliver_response(400,"Rischiesta non valida",NULL);
}

// funzione per estrarre le informazioni
// le informazioni che verranno visualizzate sono: nome e immagine
function get_drinks($output)
{
	$info = array('drinkName' => [],
					'drinkImage' =>[]
					);
	
	for ($i = 0; 
		 $i < count($output["drinks"]) ; 
		 $i++)
	{

		// se strDrink di drinks[i] � presente	
		if(!empty($output["drinks"][$i]["strDrink"]))
			// assegno il suo valore all'array strDrink
			$info['drinkName'][$i] = $output["drinks"][$i]["strDrink"];
		else
			// altrimenti gli assegno la stringa null
			$info['drinkName'][$i] = "null";
			
			// se strDrink di drinks[i] � presente	
		if(!empty($output["drinks"][$i]["strDrinkThumb"]))
			// assegno il suo valore all'array strDrink
			$info['drinkImage'][$i] = $output["drinks"][$i]["strDrinkThumb"];
		else
			// altrimenti gli assegno la stringa null
			$info['drinkImage'][$i] = "null";
	}
	// ritorno l'array info
	return($info);		
}
?>
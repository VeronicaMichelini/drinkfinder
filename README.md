# drinkfinder
Veronica Michelini 286179
# Descrizione
Creazione di un web service in grado di ricercare una lista di drink dato un nome oppure un ingrediente.
Nella ricerca attraverso il nome verranno mostrati come risultato : il nome , l'immagine, la categoria, le caratteristiche, la ricetta, gli ingredienti e le dosi di questi.
Mentre la ricerca attraverso un ingrediente darà come risultato il nome del cocktail contenente quell'ingrediente e la sua imagine.
# Architettura
Il codice è scritto in php, e contiene anche delle piccole parti in HTML per la parte grafica. Le informazioni vengono acquisite da un API di database di cocktail. GitHub è stato collegato ad heroku, per gestire il webservice direttamente online.
All'interno della repository client si trovano i file : index.php , ListDrinkFound.php e ListIngredientFound.php.
All'interno della repository ws si trovano i file : GetData.php, GetDrink.php e GetIngredient.php.
# index.php
Il file è scritto interamente in HTML ed è la pagina iniziale dove poter inserire il nome del cocktail da cercare, oppure il nome dell'ingrediente. Nel primo caso verrà utilizzato il file ListDrinkFound.php e nel secondo caso il file ListIngredientFound.php.
# ListDrinkFound.php 
Il file è scritto in php; All'interno viene controllato se è stato inserito un nome nel campo apposito, per effettuare la ricerca tramite nome del drink; se il controllo va a buon fine il nome viene accodato all'url https://drinkfinder.herokuapp.com/ws/GetDrink.php?name= , il quale verrà usato come parametro per la funzione file_get_contents che restituirà tutti i drink con il nome indicato e le relative informazioni che mi interessa mostrare come risultato, in formato JSON.
I risultati vengono decodificati e convertiti in un array associativo, attraverso la funzione json_decode e infine stampati a video.
# ListIngredientFound.php
Il file è scritto in php; All'interno viene controllato se è stato inserito un nome nel campo apposito, per effettuare la ricerca tramite nome del drink; se il controllo va a buon fine il nome viene accodato all'url https://drinkfinder.herokuapp.com/ws/GetIngredient.php?name=, il quale verrà usato come parametro per la funzione file_get_contents che restituirà tutti i drink con il nome dell'ingrediente indicato e le relative informazioni che mi interessa mostrare come risultato, in formato JSON.
I risultati vengono decodificati e convertiti in un array associativo, attraverso la funzione json_decode e infine stampati a video.
# GetData.php
Il file è scritto in php e contiene due funzioni : 
- deliver_response : ha come parametri status (200, 204 oppure 400), status_message (rispettivamente a status : Presente, Assente, Errore richiesta non valida) e data (informazioni trovate). Restituesce l' array di risposta
- getData : Ha come parametro l'url che a seconda della ricerca sarà : https://www.thecocktaildb.com/api/json/v1/1/search.php?s= oppure https://www.thecocktaildb.com/api/json/v1/1/filter.php?i= , legge il file di risposta JSON del link , decodifica e converte il risultato in un array associativo e lo restituisce.
# GetDrink.php
Il file è scritto in php; Accoda all'url https://www.thecocktaildb.com/api/json/v1/1/search.php?s= il nome del drink che l'utente vuole cercare, lo passa alla funzione getData spiegata sopra e controlla il risultato:
- se la lista dei drink trovati è vuota, la funzione deliver_response viene richiamata con i parametri 204, assente e NULL.
- se nella lista dei drink trovati è presente almeno un cocktail, la funzione deliver_response viene richiamata con i parametri 200, presente e le info trovate.
- se invece il campo nome è stato lasciato vuoto, la funzione deliver_response viene richiamata con i parametri 400, errore e NULL
Contiene poi la funzione get_drinks che ha come parametro il risultato completo della ricerca dei cocktail e restituisce solo una parte di tutte le informazioni.
# GetIngredient.php
Il file è scritto in php; Accoda all'url https://www.thecocktaildb.com/api/json/v1/1/filter.php?i= il nome dell'ingrediente che l'utente vuole cercare, lo passa alla funzione getData e controlla il risultato:
- se la lista dei drink trovati è vuota, la funzione deliver_response viene richiamata con i parametri 204, assente e NULL.
- se nella lista dei drink trovati è presente almeno un cocktail, la funzione deliver_response viene richiamata con i parametri 200, presente e le info trovate.
- se invece il campo nome è stato lasciato vuoto, la funzione deliver_response viene richiamata con i parametri 400, errore e NULL
Contiene poi la funzione get_drinks che ha come parametro il risultato completo della ricerca dei cocktail e restituisce solo una parte di tutte le informazioni.
# Comunicazioni
Quando si inserisce il nome nel campo del cocktail o dell'ingrediente la richiesta alla API viene effettuata dalla funzioni getData che si trova all'interno del file getData.php, i rusultati vengono poi selezionati dalla funzione get_drinks che si trova all'interno del file getDrink.php e stampati da ListDrinkFound.php



# drinkfinder
Veronica Michelini 286179
# Descrizione
Creazione di un web service in grado di ricercare una lista di drink dato un nome oppure un ingrediente.
Nella ricerca attraverso il nome verranno mostrati come risultato : il nome , l'immagine, la categoria, le caratteristiche, la ricetta, gli ingredienti e le dosi di questi.
Mentre la ricerca attraverso un ingrediente darà come risultato il nome del cocktail contenente quell'ingrediente e la sua imagine.
# Architettura
Il codice è scritto in php, e contiene anche delle piccole parti in HTML per la parte grafica. Le informazioni vengono acquisite da un API di database di cocktail. GitHub è stato collegato ad heroku, per gestire il webservice direttamente online.
All'interno della repository client si trovano i file : index.php , ListDrinkFound.php e ListIngredientFound.php
# index.php
Il file è scritto interamente in HTML ed è la pagina iniziale dove poter inserire il nome del cocktail da cercare, oppure il nome dell'ingrediente. Nel primo caso verrà utilizzato il file ListDrinkFound.php e nel secondo caso il file ListIngredientFound.php.
# ListDrinkFound.php 
Il file è scritto in php; All'interno viene controllato se è stato inserito un nome nel campo apposito, per effettuare la ricerca tramite nome del drink; se il controllo va a buon fine il nome viene accodato all'url https://drinkfinder.herokuapp.com/ws/GetDrink.php?name= , il quale verrà usato come parametro per la funzione file_get_contents che restituirà tutti i drink con il nome indicato e le relative informazioni che mi interessa mostrare come risultato, in formato JSON.
I risultati vengono decodificati e convertiti in un array associativo, attraverso la funzione json_decode e infine stampati a video.
# ListIngredientFound.php
Il file è scritto in php; All'interno viene controllato se è stato inserito un nome nel campo apposito, per effettuare la ricerca tramite nome del drink; se il controllo va a buon fine il nome viene accodato all'url https://drinkfinder.herokuapp.com/ws/GetIngredient.php?name=, il quale verrà usato come parametro per la funzione file_get_contents che restituirà tutti i drink con il nome dell'ingrediente indicato e le relative informazioni che mi interessa mostrare come risultato, in formato JSON.
I risultati vengono decodificati e convertiti in un array associativo, attraverso la funzione json_decode e infine stampati a video.


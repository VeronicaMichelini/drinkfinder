<?php
if(isset($_GET["name"]))
{
    echo "<strong>What we found for: </strong>".$_GET["name"]; 
    $url = "https://drinkfinder.herokuapp.com/ws/GetDrink.php?name=".$_GET["name"];
   
    
}
?>
<br>
<br>
<br>
<?php

    $data = json_decode($data, true);
    if($data["status"]>=200 && $data["status"]<300) 
    {
        $data = $data["data"];
        for ($i=0; 
        $i < count($data["title"]); 
        $i++) 
        {
            echo "Title: ".$data["title"][$i];
            echo "<br>";

            if(isset($data["imageLinks"][$i]["thumbnail"]) && $data["imageLinks"][$i]["thumbnail"] != "ND")
                echo "<img src=".$data["imageLinks"][$i]["thumbnail"]."/>";
            else
                echo "<img src= .\bookimgnotfound.jpg>";
            echo "<br>";

            if(isset($data["authors"][$i]) && $data["authors"][$i] != "ND" )
                echo "Authors: ".implode(' , ', $data["authors"][$i]);
            else
                echo "Authors: ND";
            echo "<br>";

            if(isset($data["description"][$i]) && $data["description"][$i] != "ND")
                echo "Description: ".$data["description"][$i];
            else
                echo "Description: ND";
            echo "<br>";

            if(isset($data["industryIdentifiers"][$i][0]["type"]) && isset($data["industryIdentifiers"][$i][0]["identifier"]))
                echo $data["industryIdentifiers"][$i][0]["type"].":  ".$data["industryIdentifiers"][$i][0]["identifier"];
            else
                echo "IndustryID: ND";
            echo "<br>";

            if(isset($data["language"]) && $data["language"] != "ND")
                echo "Language: ".$data["language"][$i];
            else
                echo "Language: ND";

            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<hr>";
        }
    }
?>
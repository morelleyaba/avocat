 <?php

//fetch.php;

$connect = new PDO("mysql:host=localhost; dbname=avocat", "root", "");

if(isset($_POST['query']))
{
 $query = "
 SELECT DISTINCT preocupation FROM avocatrapide 
 WHERE preocupation LIKE '%".trim($_POST["query"])."%'
 ";

 $statement = $connect->prepare($query);

 $statement->execute();

 $result = $statement->fetchAll();

 $output = '';

// les sugestions generer par la recherche de l'user
 foreach($result as $row)
 {
  $output .= '
  <li class="list-group-item contsearch">
   <a href="javascript:void(0)" class="gsearch" style="color:#333;text-decoration:none;">'.$row["preocupation"].'</a>
  </li>
  ';
 }

 echo $output;
}
// ******
if(isset($_POST['preocupation']))
{
 $query = "
 SELECT * FROM avocatrapide 
 WHERE preocupation = '".trim($_POST["preocupation"])."' 
 LIMIT 1
 ";

 $statement = $connect->prepare($query);

 $statement->execute();

 $result = $statement->fetchAll();

// affichage des informations
$output = '';
 foreach($result as $row)
 {
  $output .= '
  <h5>
    Tout savoir sur le theme  <strong style="color:#34495e">'.$row["preocupation"].'</strong> : 

<br></h5>
<h6>'.$row["lois"].'</h6>

<br>
<br>

   <button class="btn btn-primary">je suis satisfait</button> 
 
   <a href="client.php"><button  class="btn btn-primary">prendre un RDV </button> </a> 
  ' ;
 }
 $output .= '</p>';
 

 echo $output;
}

?>
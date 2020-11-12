 

<?php include("inc/header.php") ?>
<body style="background-image:url('img/droit.jpg');opacity: 0.93">

<?php include("admin.php") ?>

<aside style=" padding-left:300px; padding-top: 5%" >
  <a href="admin.php">admin</a>
         <form action="" method="POST" id="form-search">
          
         	<div class="row">

		<SELECT name="date_search" size="1" id="date_search" >
<OPTION>choisir une option 
	<OPTION>N
<OPTION>RDV Manqués
	<OPTION>RDV Programmés
<OPTION>RDV Reuissis
</SELECT>

 
				<button type="submit" class=" btn btn-primary" id="mysubmit"  name="search" value="search">search </button>

				</div>
				<div id="message"></div>
				</form>
				<div id="tableau"></div>
				
</aside>
 <!--  -->
 <?php 
 $conn = new PDO("mysql:host=localhost; dbname=avocat", "root", "");
 $N = 'N';
     $exep="";
     $sql="SELECT * FROM client WHERE statut = '{$N}' ";
    $query=$conn->query($sql);  
    $result=$query->fetchAll();
    $count = 1;
  ?>
  <section class="container" style="background-color: white">
  <h2 style="text-align: center; color: #34495e; margin-top: 3%;">Nouveaux Rendez-Vous Enregistrés</h2>
  <br>
<div class="container" style="margin-left: 100px; margin-right:100px;">
    <div class="table-responsive">
            <table class="table movie-table">
                  <thead>
                  <tr class= "movie-table-head">
                      <th>N°</th>
                      <th>Nom du client</th>
                      <th>raison</th>
                      
                      <th colspan="2">Action</th>   
                  </tr>
              </thead>   
              <tbody>
               
               <?php foreach ($result as $row): ?>   
                <!--row-->
                <tr>
                    <th><?=$count++?></th>
                    <td><?= $row['nom']?></td>
                <td><?= $row['raison']?></td>
                
                      <td>
                        
              <button class="btn btn-primary"><a href="create_rdv.php?rdv=<?php echo $row['id_ar']?>" style="text-decoration: none; color: white;" >programmer un rdv</a></button>


                      </td>                                       
                </tr>
            <?php endforeach ?>
            
              </tbody>
            </table>
            </div>
</div>
</section>
<br><br>

     
<?php include("inc/footer.php") ?>
  <?php
    if(isLogged() == 1){
        header("Location:index.php?page=membres");
    }
?>

<h2 class="header">Debuter un Tchat</h2>

<?php
// ****nouvelle fonction crée
 function synthese($id_ar, $email, $code_rdv){
        global $db;
        $r = array(
            'id_ar'=>$id_ar,
            'email'=>$email,
            'code_rdv'=>$code_rdv
        );
        $sql = 'SELECT * FROM client WHERE id_ar = :id_ar && email = :email && code_rdv = :code_rdv';
        $req = $db->prepare($sql);
        $req->execute($r);
        $free = $req->rowCount($sql);

        return $free;
    }


// ****

    if(isset($_POST['submit'])){
        $email = htmlspecialchars(trim($_POST['email']));
        $code_rdv = (htmlspecialchars(trim($_POST['code_rdv'])));

        if(user_exist($email,$code_rdv) == 1){
            // *****
    $sql = "SELECT id_ar FROM client WHERE email='{$email}' AND code_rdv='{$code_rdv}'";
    $req = $db->query($sql);
        $e=$req->fetch();
        $id_ar = $e['id_ar'];

        if (synthese($id_ar, $email, $code_rdv) == 1) {

            $_SESSION['tchat'] = $id_ar;
            $_SESSION['email'] = $email;
            $_SESSION['code_rdv'] = $code_rdv;

            header("Location:index.php?page=membres");
            
        }else{
            $error_user_not_found = "nouvel ajout";
        }

    // ******

            
        }else{
            $error_user_not_found = "L'adresse email ou Code du rendez-vous est incorrect";
        }


    }
 
?>

<body style="background-image:url('../img/Tchat.jpg');opacity: 0.98">
<div style="margin-right: 20%;margin-left: 15%;margin-top: 5%;background-color: white">
<form method="post" id="logForm">

    <div class="field">
        <label class="field-label" for="email">Votre adresse email</label>
        <input class="field-input" type="email" name="email" id="email"/>
    </div>

    <div class="field">
        <label class="field-label" for="code_rdv">Votre code de rdv</label>
        <input class="field-input" type="text" name="code_rdv" id="password
        "/>
    </div>
    <p class="error"><?php echo (isset($error_user_not_found)) ? $error_user_not_found : ''; ?></p>
    <button type="submit" name="submit">Se connecter</button>

</form>
</div>
</body>
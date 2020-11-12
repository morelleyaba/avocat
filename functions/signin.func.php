  <?php

    function user_exist($email,$code_rdv){
        global $db;
        $u = array(
            'email'=>$email,
            'code_rdv'=>$code_rdv
        );
        $sql = "SELECT * FROM client WHERE email=:email && code_rdv=:code_rdv";
        $req = $db->prepare($sql);
        $req->execute($u);
        $exist = $req->rowCount($sql);
        return $exist;
          
    }

     
     
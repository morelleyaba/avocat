 <?php
    function user_exist(){
        global $db;
        $e = array('user' => $_GET['user'], 'session'=>$_SESSION['tchat']);
        $sql = "SELECT * FROM client WHERE id_ar =:user AND id_ar != :session";
        $req = $db->prepare($sql);
        $req->execute($e);
        $exist = $req->rowCount($sql);
        return $exist;
    }

    function get_user(){
        global $db;
        $req = $db->query("SELECT * FROM client WHERE id_ar = '{$_SESSION['user']}'");
        $user = array();
        while($row = $req->fetchObject()){
            $user[] = $row;
        }
        return $user;

    }
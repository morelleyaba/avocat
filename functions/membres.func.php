 <?php

    function get_membres(){
        global $db;
        $req = $db->query("SELECT * FROM client");
        $results = array();
        while($rows = $req->fetchObject()){
            $results[] = $rows;
        }
        return $results;
    }
<?php
require_once PROJECT_ROOT_PATH . "/Model/Database.php";
 
class UserModel extends Database
{
    public function getClients($limit)
    {
        return $this->select("SELECT * FROM clients ORDER BY user_id ASC LIMIT ?", ["i", $limit]);
    }

    public function getCommandes($limit)
    {
        return $this->select("SELECT * FROM commandes, commandes_detail ORDER BY user_id ASC LIMIT ?", ["i", $limit]);
    }
}
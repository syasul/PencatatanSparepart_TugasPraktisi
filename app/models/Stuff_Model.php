<?php 

class StuffModel{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllData() {
        $this->db->query("SELECT * FROM data");
        return $this->db->resultSet();
      }
    
      public function getDataById($id) {
        $this->db->query("SELECT * FROM data WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
      }
    
      public function addData($data) {
        $this->db->query("INSERT INTO data (name, email) VALUES (:name, :email)");
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        return $this->db->execute();
      }
    
      public function updateData($id, $data) {
        $this->db->query("UPDATE data SET name = :name, email = :email WHERE id = :id");
        $this->db->bind(':id', $id);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        return $this->db->execute();
      }
    
      public function deleteData($id) {
        $this->db->query("DELETE FROM data WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
      }
    
    
}

?>
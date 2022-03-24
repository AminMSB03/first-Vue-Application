<?php 
class Posts
{
    private $serverName = "localhost";
    private $username = "Amine";
    private $password = "teste123";
    protected $conn;
    public function __construct()
    {
        $this->conn = new PDO("mysql:host=$this->serverName;dbname=pizzas", $this->username, $this->password);
    }
    

    public function getAllPizzas()
    {
        $query = "SELECT * FROM pizza ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getPizzaById($id)
    {
        $query = "SELECT * FROM pizza WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
    public function createPizza($createdBy,$date ,$elements)
    {
        $query = "INSERT INTO pizza SET createdBy = :createdBy, date = :date, elements = :elements";

        $stmt= $this->conn->prepare($query);

        $createdBy = htmlspecialchars(strip_tags($createdBy));
        $date = htmlspecialchars(strip_tags($date));
        $elements = htmlspecialchars(strip_tags($elements));

        $stmt->bindParam(':createdBy',$createdBy);
        $stmt->bindParam(':date',$date);
        $stmt->bindParam(':elements',$elements);


        return $stmt->execute()? $this->conn->lastInsertId() : false;
        

    }
    public function updatePizza($createdBy,$date ,$elements,$id)
    {
        $query = "UPDATE pizza SET createdBy = :createdBy, date = :date, elements = :elements WHERE id = :id";

        $stmt= $this->conn->prepare($query);

        $createdBy = htmlspecialchars(strip_tags($createdBy));
        $cid = htmlspecialchars(strip_tags($id));
        $date = htmlspecialchars(strip_tags($date));
        $elements = htmlspecialchars(strip_tags($elements));

        $stmt->bindParam(':createdBy',$createdBy);
        $stmt->bindParam(':date',$date);
        $stmt->bindParam(':elements',$elements);
        $stmt->bindParam(':id',$id);                    


        return $stmt->execute();
        

    }
    public function deletePizza($id)
    {
        $query = "DELETE FROM pizza WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        $id = htmlspecialchars(strip_tags($id));
        $stmt->bindParam(1, $id);

        return $stmt->execute();


    }

}
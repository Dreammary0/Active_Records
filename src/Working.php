<?php
namespace App;
use PDO;

class Working 
{
    private $id;
    private $name;
    private $tale;
    private $price;
    private $connection;

    public function __construct(){
        $this->connection = new PDO
        ('mysql:host=localhost;dbname=testDB;charset=utf8', 'root', '00012278');
    }
    
    public function show(){
        $sql = 'select * from coffee';
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $this->connection->query($sql);
    
        return $result;
    }

    public function save(){
        $data = array( 'id'=>$this->id, 'name' => $this->name, 'tale'=>$this->tale,
        'price'=>$this->price); 
        $query = $this->connection->prepare("insert into coffee (id, name, tale, price) 
        values (:id, :name, :tale, :price)");
        $query->execute($data);
    }


    public function poisk($ID){
        $sql = "SELECT * FROM coffee WHERE id=$ID";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $this->connection->query($sql);
        $test = $stmt->fetch();
        if ($test)
        {return $result;}
        
        else{echo ("<b>Кофе не найден, проверьте правильность ID</b>");}
    }
    
       public function poiskPrice($price){
        $sql = "SELECT * FROM coffee WHERE price < $price";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $this->connection->query($sql);
        $test = $stmt->fetch();
        if ($test)
        {return $result;}
        
        else{echo ("<b>Поищи на Azon, там может быть дешевле</b>");}
    } 
    
    
    public function del($delID)
    {
        $sql = "DELETE FROM coffee WHERE id=$delID";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();

    }
    
    public function getID()         {return $this->id;}
    public function setID($id)      {$this->id = $id;}
    public function getName()       {return $this->name;}
    public function setName($name)  {$this->name = $name;}
    public function getTale()       {return $this->tale;}
    public function setTale($tale)  {$this->tale = $tale;}
    public function getPrice()      {return $this->price;}
    public function setPrice($price){$this->price = $price;}
}
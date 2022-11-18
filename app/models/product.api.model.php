<?php
class ProductsModel{

    private $db;
    public function __construct(){
        
        $this->db =$this->getDB();
    }
    private function getDB() {
        
        $db = new PDO('mysql:host=localhost;'.'dbname=db_tpe;charset=utf8', 'root', '');
        return $db;
    }




   public function getAll($filterName,$limit ,$offset) {
    $request = "SELECT * FROM products";


    if(isset($filterName)){ 
        $request .= " WHERE name LIKE '%$filterName%'"; 
    }
   

   
    
    if(isset($limit)){
        $request .= " LIMIT $limit OFFSET $offset";
    }
    
     $query = $this->db->prepare($request);
     $query->execute();
     $products = $query->fetchAll(PDO::FETCH_OBJ); 
        
     return $products;
    }



    public function get ($id_products) {
        $query = $this->db->prepare("SELECT * FROM products WHERE id_products =?;");
        $query->execute([$id_products]);
        $id_products = $query->fetch(PDO::FETCH_OBJ);
        
        return $id_products;
    }
   
    public function insert($name, $price, $color, $size, $description, $category) {
        $query = $this->db->prepare("INSERT INTO products (name, price, color, size, description, id_category) VALUES (?, ?, ?, ?, ?, ?)");
        $query->execute([$name, $price, $color, $size, $description, $category]);

        return $this->db->lastInsertId();
        
    }
   
    public function delete($id_products) {
        $query =$this->db->prepare('DELETE FROM products WHERE id_products = ?');
        $query->execute([$id_products]);
    }
    
    public function update($name, $price, $color, $size, $description, $category,$id_products){
        $query = $this->db->prepare("UPDATE products SET  name = ?, price = ?, color = ?, size = ?, description = ?, id_category = ?
        WHERE id_products = ?");
        
        try{
            $query->execute(array($name, $price, $color, $size, $description, $category, $id_products)); 
        }
        catch(PDOException $e){
        }


    }
    

    public function productOrden($criterio,$orden){
        $request = "SELECT * FROM products";
        if ((isset($criterio))&&(isset($orden))){
                $request .= " ORDER BY $criterio $orden";            
             }
        $query = $this->db->prepare($request);
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }
    
    
    

  


    
}
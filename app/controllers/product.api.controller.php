<?php
require_once './app/models/product.api.model.php';
require_once './app/views/product.api.view.php';




class ProductApiController {
    private $model;
    private $view;

    private $data;
    public function __construct() {
      $this->model = new ProductsModel();
      $this->view = new ProductAPIView();

       // lee el body del request
       $this->data = file_get_contents("php://input");
    }
    function getData(){ 
        return json_decode($this->data); 
    }  

  

    public function getProducts($params = null) {
        $products= $this->model->getAll();
        $this->view->response($products);
    }

    public function getProduct($params = null) {
        // obtengo el id del arreglo de params
        $id = $params[':ID'];
        $product = $this->model->get($id);

        // si no existe devuelvo 404
        if ($product)
            $this->view->response($product);
        else 
            $this->view->response("El producto con el id=$id no existe", 404);
    }
    public function deleteProduct($params = null) {
        $id = $params[':ID'];

        $product = $this->model->get($id);
        if ($product) {
            $this->model->delete($id);
            $this->view->response($product);
        } else 
            $this->view->response("El producto con el id=$id no existe", 404);
    }
    public function insertProduct() {
        // devuelve el objeto JSON enviado por POST     
         $body = $this->getData();
         if (empty($body->name) || empty($body->price) || empty($body->color) || empty($body->size)|| empty($body->description)|| empty($body->id_category)){
         $this->view->response("Complete los datos", 400);
         }else{
        
         $name = $body->name;
         $price = $body->price;
         $color = $body->color;
         $description = $body->description;
         $size = $body->size;
         $category = $body->id_category;
         

        $id = $this->model->insert($name, $price, $color, $size, $description, $category);
        $product = $this->model->get($id);
        $this->view->response($product, 201);

         }
         
    }
 
function updateProduct($params = null) {

        $id = $params[':ID'];
        $product = $this->getData();
        $productById = $this->model->get($id);
       

        //$productsAndCategories = $this->model->getAll();
        if (empty($product->name) || empty($product->price) || empty($product->color) || empty($product->size)|| empty($product->description)|| empty($product->id_category))
        {
            $this->view->response("Complete los datos", 400);
        }
        else {
            
            $name = $product->name;
            $price= $product->price;
            $color= $product->color;
            $size= $product->size;
            $description = $product->description;
            $category = $product->id_category;
            
            
            if($productById) {
                $this->model->update($name, $price, $color, $size, $description, $category, $id );
                $updateProduct = $this->model->get($id); //esto es para traerme de la db el producto actualizado
                $this->view->response("Producto id = $id actualizado con éxito", 200); // $productById si quiero verver el producto actualizado
                $this->view->response($updateProduct, 200);
            }
            else {
                $this->view->response("El producto con el id=$id no existe", 404);
            }
         }
        
    }


}
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
            $this->view->response("La tarea con el id=$id no existe", 404);
    }
    public function deleteProduct($params = null) {
        $id = $params[':ID'];

        $product = $this->model->get($id);
        if ($product) {
            $this->model->delete($id);
            $this->view->response($product);
        } else 
            $this->view->response("La tarea con el id=$id no existe", 404);
    }
    public function addTask($params = []) {
        // devuelve el objeto JSON enviado por POST     
         $body = $this->getData();
 
         // inserta la tarea
         $titulo = $body->titulo;
         $descripcion = $body->descripcion;
         $product = $this->model->saveProduct($name, $price, $color, $size, $description, $category, $id_products);
    }
 
function updateProduct($params = null) {

        $id = $params[':ID'];
        $product = $this->getData();
        $productById = $this->model->getData($id);
        //$productsAndCategories = $this->model->getAll();
        if (empty($product->name) || empty($product->price) || empty($product->color) || empty($product->size)|| empty($product->description)|| empty($product->id_category))//$name, $price, $color, $size, $description, $category,$id_products 
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
                $this->model->update($id, $brand, $newModel, $description, $category);
                $updateProduct = $this->model->getData($id); //esto es para traerme de la db el producto actualizado
                $this->view->response("Producto id = $id actualizado con éxito", 200); // $productById si quiero verver el producto actualizado
                $this->view->response($updateProduct, 200);
            }
            else {
                $this->view->response("La tarea con el id=$id no existe", 404);
            }
        }
        
    }


}
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
        
    
        
    
        //filtrar
        if (isset($_GET['filtername']) ){        
            $filterName= mb_strtolower($_GET['filtername']);               
        }
        else{
            $filterName = null;
        }


        // criterio y orden
        if(isset($_GET['sort']) && isset($_GET['orden']) /*(&& !empty($_GET['sort']) && !empty($_GET['orden'])*/){
            $criterio = $_GET['sort'];
            $orden =  $_GET['orden'];
        
        }
        else {
                $criterio = null;
                $orden = null;
        }
       
        //paginar
        
        if (isset($_GET['page']) && (isset($_GET['limit']))){            
            $page = intval($_GET['page']); //INTVAL LO CONVIERTE A ENTERO
            $limit = intval($_GET['limit']);               
            $offset = ($page -1) * $limit;            
        }
        else {
            $offset= null;
            $limit=null;
        }
        $products = $this->model->getAll($filterName,$criterio, $orden,$limit, $offset);
        $this->view->response($products);
        
        /*
            $page = 1;
            $count = intval($this->model->GetCount()->count);
            $maxpage = ceil($count / $size);
            if (isset($_GET["page"])) {
                if (is_numeric($_GET["page"]) && intval($_GET["page"]) >= 1 && intval($_GET["page"]) <= $maxpage) {

                    $page = $_GET["page"];
                } else {
                    $this->status = 400;
                    $this->error->code = "InvalidPage";
                    $this->error->detail = "Pagina No Valida";
                    $this->error->params = new stdClass();
                    $this->error->params->maxpage = $maxpage;
                }
            }
        
        */
       
        
        
        /*
        
            $products = $this->model->getAllProducts();
            $this->view->response($products, 200);
        
        }
        else{
            $this->view->response("No es posible el filtrado y ordenamiento", 404);
            return;
        }
        if($products == true){
            return $this->view->response($products, 200);
        }else{
            return $this->view->response(null, 404);
        }

        */
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
        $this->view->response("Producto id = $id inserto con éxito", 200);
        $this->view->response($product, 201);

         }
         
    }
 
function updateProduct($params = null) {

        $id = $params[':ID'];
        $product = $this->getData();
        $productById = $this->model->get($id);

        if($productById){
            if (empty($product->name) || empty($product->price) || empty($product->color) || empty($product->size)|| empty($product->description)|| empty($product->id_category))
            {
                $this->view->response("Complete los datos", 400);
            }else{
                $name = $product->name;
                $price= $product->price;
                $color= $product->color;
                $size= $product->size;
                $description = $product->description;
                $category = $product->id_category;

                $this->model->update($name, $price, $color, $size, $description, $category, $id );
                $updateProduct = $this->model->get($id); //esto es para traerme de la db el producto actualizado
                $this->view->response("Producto id = $id actualizado con éxito", 200); // $productById si quiero verver el producto actualizado
                $this->view->response($updateProduct, 200);

            }

        } else {
            $this->view->response("El producto con el id=$id no existe", 404);
        }

    

         //$productsAndCategories = $this->model->getAll();
        
            
           
          
        
    }
    /*

    /products?sort=&orden=

    if(isset($_GET['sortBy']) && isset($_GET['orden']) && !empty($_GET['sortBy']) && !empty($_GET['orden'])){
        $comentariosOrdenados = $this->model->obtenerComentariosOrdenados($_GET['sortBy'],$_GET['orden'],$id);
            return $this->view->response($comentariosOrdenados,200); 
        
    }else if (isset($_GET['filterByPuntaje']) && !empty($_GET['filterByPuntaje'])){
        $comentariosFiltrados = $this->model->obtenerComentariosFiltrados($id,$_GET['filterByPuntaje

*/


}
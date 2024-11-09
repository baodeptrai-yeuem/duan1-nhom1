<?php
require_once 'model/productModel.php';
class productController{
    public $productModel;
    function __construct(){
        $this->productModel=new productModel();
    }
    //danh mục sản phẩm
    function list()
    {
        $category = $this->productModel->allCTGR();
        require_once 'views/DM.php';
    }

    function insert()
    
    {
       
        
        require_once 'views/insertDM.php';
        if (isset($_POST['btn_insertCTGR'])) {
            $CTGRname = $_POST['cate_name'];
            if ($this->productModel->insertCTGR($CTGRname)) {
                header('location: ?act=category');
            } else {
                echo 'insert fail';
            }
        }
    }

    function deleteCTGR($id)
    {
        if ($this->productModel->deleteCTGR($id)) {
            header('location:index.php?act=category');
        } else {
            echo 'xóa không được mục sản phẩm này';
        }
    }

    function updateCTGR($id)
    {
        $oneCTGR = $this->productModel->findCTGR($id);
        require_once 'views/updateDM.php';
        if (isset($_POST['btn_updateCTGR'])) {
            $id = $_POST['id'];
            $nameCTGR = $_POST['cate_name'];
            if ($this->productModel->updateCTGR($id, $nameCTGR)) {
                header('location:?act=category');

            } else {
                echo "lỗi";
            }
        }
    }



    //
    // sản phẩm

    function listProduct(){
        $allProduct=$this->productModel->getAllProduct();
        require_once 'views/listSP.php';
    }

    function deleteProduct($id){
        $check = $this->productModel->deleteProduct($id);
        if($check){
            header("Location: ?act=listSP");
        } else {
            echo "Lỗi";
        }
    }

    function updateProduct($id){
        $oneProduct = $this->productModel->findProductById($id);
        $cateProduct = $this->productModel->cateProduct();
        $cateName = $this->productModel->cateName($oneProduct['id_cate']);
        require_once 'views/updateSP.php';
    
        if(isset($_POST['btn_update'])){
            $oneProduct = $this->productModel->findProductById($id);
            $cateProduct = $this->productModel->cateProduct();
            $cateName = $this->productModel->cateName($oneProduct['id_cate']);
            $id = $_POST['id'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $detail = $_POST['description'];
            $quantity = $_POST['quantity'];
            $view = $_POST['view'];
            $cate_id = $_POST['cate'];
    
            if(empty($_FILES['img']['name'])){
                $img = "";
            } else {
                $img = $_FILES['img']['name'];
                $tmp = $_FILES['img']['tmp_name'];
                move_uploaded_file($tmp, '../assets/img/'.$img);
            }
    
            if($this->productModel->updateProduct($id, $name, $img, $price, $detail, $quantity, $view, $cate_id)){
                header("location:?act=listSP");
            } else {
                echo "Lỗi";
            }
        }
    }

    function insertProduct(){
        $listCateName = $this->productModel->listCateName();
        require_once 'views/insertSP.php';
        
        if(isset($_POST['btn_insert'])){
            $name = $_POST['name'];
            $price = $_POST['price'];
            $description = $_POST['description']; 
            $quantity = $_POST['quantity'];
            $view = $_POST['view']; 
            $cate_id = $_POST['cate'];
            
 
            if(empty($_FILES['img']['name'])){
                $img = "";
            } else {
                $img = $_FILES['img']['name'];
                $tmp = $_FILES['img']['tmp_name'];
                move_uploaded_file($tmp, '../assets/img/'.$img);
            }
    
 
            if($this->productModel->insertProduct($name, $img, $price, $description, $quantity, $view, $cate_id)){
                header("location:?act=listSP");
            } else {
                echo "Lỗi khi thêm sản phẩm"; 
            }
        }
    }
    

    


    //


}
?>
<?php
class productModel{
    public $conn;
    function __construct(){
        $this->conn=connectDB();
    }
//danh mục sản phẩm
function allCTGR(){
    $sql = "SELECT * FROM danhmuc";
    return $this->conn->query($sql);
}

function insertCTGR($CTGRname)
{
    $sql = "INSERT INTO danhmuc VALUES(null,'$CTGRname')";
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute();
}

function deleteCTGR($id){
    $sql = "DELETE FROM danhmuc where id_danhmuc ='$id'";
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute();
}

function findCTGR($id)
{
    $sql = "SELECT * FROM danhmuc WHERE id_danhmuc = $id";
    return $this->conn->query($sql)->fetch();
}

function updateCTGR($id, $nameCTGR){
    $sql = "UPDATE danhmuc set ten_danhmuc = '$nameCTGR' where id_danhmuc = '$id'";
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute();
}

function listCateName(){
    return $this->conn->query("SELECT * FROM danhmuc")->fetchAll();
}
function productname(){
    return $this->conn->query("SELECT * FROM danhmuc")->fetchAll();
}

function cateProduct(){
    $sql="select * from danhmuc";
    return $this->conn->query($sql)->fetchAll();
}

function cateName($id){
    $sql="select * from danhmuc where id_danhmuc=$id";
    return $this->conn->query($sql)->fetch();
}
//

//sản phẩm


function getAllProduct(){
    $sql="select * from sanpham join danhmuc on sanpham.id_cate=danhmuc.id_danhmuc ";
    return $this->conn->query($sql)->fetchAll();    
}


function findProductById($id){
    $sql="select * from sanpham where id_sanpham=$id";
    return $this->conn->query($sql)->fetch(); 
 }
 function deleteProduct($id){
    $sql = "DELETE FROM sanpham WHERE id_sanpham = $id";
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute();
}
function updateProduct($id, $name, $img, $price, $description, $quantity, $view, $cate_id) {
    if(empty($img)) {
        $sql = "UPDATE sanpham SET name='$name', price=$price, description='$description', quantity=$quantity, view=$view, id_cate=$cate_id WHERE id_sanpham=$id";
    } else {
        $sql = "UPDATE sanpham SET name='$name', image='$img', price=$price, description='$description', quantity=$quantity, view=$view, id_cate=$cate_id WHERE id_sanpham=$id";
    }
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute();
}


function insertProduct($name, $img, $price, $description, $quantity, $view, $cate_id) {
    $sql = "INSERT INTO sanpham (name, image, price, description, quantity, view, id_cate) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute([$name, $img, $price, $description, $quantity, $view, $cate_id]);
}

}
?>
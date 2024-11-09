
<?php
session_start();
ob_start();
require_once '../commons/database.php';
require_once 'controller/trangchu.php';
require_once 'controller/productController.php';
require_once 'model/productModel.php';

$act = $_GET['act'] ?? '/';
match ($act) {
    '/'             => (new dashboardController())->dashboard(),
    'category'          => (new productController())->list(),
    'insertDM'      => (new productController())-> insert(),
    'deleteDM'      => (new productController())->deleteCTGR($_GET["id"]),
    'updateDM'      => (new productController())->updateCTGR($_GET["id"]),


    'listSP'   => (new productController())->listProduct(),
    'deleteSP' => (new productController())->deleteProduct($_GET['id']),
    'updateSP' => (new productController())->updateProduct($_GET['id']),
    'insertproduct' => (new productController())->insertProduct(),
    'timkiem' =>  (new productController())->searchProduct(),
    default         => handleDefault($act),


};

function handleDefault($act) {
    echo "Action '$act' is not recognized.";
}
?>

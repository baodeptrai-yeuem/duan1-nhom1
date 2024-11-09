<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    </style>
</head>
<body>
    <?php require_once 'khung/header.php'; ?>
    <div class="wrapper">
        <h2>Sửa sản phẩm mới</h2>
        <form action="" method="post" enctype="multipart/form-data" class="insert">
            <input type="hidden" name="id" value="<?= $oneProduct['id_sanpham'] ?>" name="" id="">
            <p>Tên sản phẩm</p><input type="text" name="name" id="" value="<?= $oneProduct['name'] ?>">
            <p>Ảnh sản phẩm</p>
            <img src="../assets/img/<?= $oneProduct['image'] ?>" alt="">
            <input type="file" name="img" id="">
            <p>Giá sản phẩm</p><input type="text" name="price" id="" value="<?= $oneProduct['price'] ?>">
            <p>Chi tiết sản phẩm</p><input type="text" name="description" id="" value="<?= $oneProduct['description'] ?>">
            <p>Số lượng</p><input type="text" name="quantity" id="" value="<?= $oneProduct['quantity'] ?>">
            <p>Lượt xem</p><input type="text" name="view" id="" value="<?= $oneProduct['view'] ?>">
            <p>Danh mục sản phẩm</p>
            <select name="cate" id="">
            <option value="<?= $oneProduct['id_cate'] ?>"><?=$cateName["ten_danhmuc"]?></option>
                <?php foreach ($cateProduct as $value){
                   
                    if($oneProduct["id_cate"] == $value["id_danhmuc"]){
                         
                        continue;
                    } else {
                        echo "<option value='".$value["id_danhmuc"]."'>".$value["ten_danhmuc"]."</option>";
                    }
                    ?>
                    <?php } ?>

                            
            </select> <br>
             <br>
            <input type="submit" name="btn_update" value="Sửa sản phẩm" class="btn" id="">
        </form>
    </div>
    <?php require_once 'khung/footer.php'; ?>
</body>
</html>
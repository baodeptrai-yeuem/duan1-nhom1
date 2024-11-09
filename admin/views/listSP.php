<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Sản phẩm</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .product img {
            max-width: 100px;
            height: auto;
        }
        .product th, .product td {
            vertical-align: middle; /* Căn giữa theo chiều dọc */
        }
        .product th, .product td {
            text-align: center; /* Căn giữa theo chiều ngang */
        }
        .product tbody tr {
            margin-bottom: 20px; /* Thêm khoảng cách dưới mỗi hàng */
        }
        .product tbody tr:not(:last-child) {
            border-bottom: 2px solid #dee2e6; /* Thêm đường kẻ dưới mỗi hàng trừ hàng cuối cùng */
        }


    </style>
</head>
<body>
    <div class="theanh">
        <?php require_once 'khung/header.php'; ?>
        
        <div class="text-right mb-3">
            <a href="?act=insertproduct" class="btn btn-primary">Thêm sản phẩm</a>
        </div>
        
        <table class="table table-bordered table-striped product">
            <thead class="thead-dark">
                <tr>
                    <th>Mã Sp</th>
                    <th>Tên sp</th>
                    <th>Ảnh sp</th>
                    <th>Giá sp</th>
                    <th>Chi tiết sp</th>
                    <th>Số lượng</th>
                    <th>Lượt xem</th>
                    <th>Danh mục sp</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($allProduct as $key => $rows): ?>
                <tr>
                    <td><?= $rows['id_sanpham'] ?></td>
                    <td><?= $rows['name'] ?></td>
                    <td><img src="../assets/img/<?= $rows['image'] ?>" alt=""></td>
                    <td><?= $rows['price']?></td>
                    <td><?= $rows['description'] ?></td>
                    <td><?= $rows['quantity'] ?></td>
                    <td><?= $rows['view'] ?></td>
                    <td><?= $rows['ten_danhmuc'] ?></td>
                    <td><a href="?act=updateSP&id=<?= $rows['id_sanpham'] ?>" class="btn btn-warning">Sửa</a></td>
                    <td>
                        <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="?act=deleteSP&id=<?= $rows['id_sanpham']?>" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <?php require_once 'khung/footer.php'; ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

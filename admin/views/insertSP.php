<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm mới</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
        }
        .container {
            margin-top: 50px;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: 
        }
        h2 {
            margin-bottom: 30px;
            color: #343a40;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .error-message {
            color: red;
            font-size: 0.875em;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <?php require_once 'khung/header.php'?>
    <div class="container">
        <h2 class="text-center">Thêm sản phẩm mới</h2>
        <form action="" method="post" enctype="multipart/form-data" class="insert" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="name">Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" id="name">
                <span class="error-message" id="name-error"></span>
            </div>
            <div class="form-group">
                <label for="img">Ảnh sản phẩm</label>
                <input type="file" name="img" class="form-control-file" id="img">
                <span class="error-message" id="img-error"></span>
            </div>
            <div class="form-group">
                <label for="price">Giá sản phẩm</label>
                <input type="text" name="price" class="form-control" id="price">
                <span class="error-message" id="price-error"></span>
            </div>
            <div class="form-group">
                <label for="description">Chi tiết sản phẩm</label>
                <input type="text" name="description" class="form-control" id="description">
                <span class="error-message" id="description-error"></span>
            </div>
            <div class="form-group">
                <label for="quantity">Số lượng</label>
                <input type="text" name="quantity" class="form-control" id="quantity">
                <span class="error-message" id="quantity-error"></span>
            </div>
            <div class="form-group">
                <label for="view">Lượt xem</label>
                <input type="text" name="view" class="form-control" id="view">
                <span class="error-message" id="view-error"></span>
            </div>
            <div class="form-group">
                <label for="cate">Danh mục sản phẩm</label>
                <select name="cate" class="form-control" id="cate">
                    <?php foreach($listCateName as $value): ?>
                        <option value="<?= $value['id_danhmuc']?>"><?= $value['ten_danhmuc']?></option>
                    <?php endforeach?>
                </select>
                <span class="error-message" id="cate-error"></span>
            </div>
            <button type="submit" name="btn_insert" class="btn btn-primary btn-block">Thêm sản phẩm</button>
        </form>
    </div>
    <?php require_once 'khung/footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function validateForm() {
            let isValid = true;

            // Clear previous error messages
            document.querySelectorAll('.error-message').forEach(el => el.textContent = '');

            const name = document.getElementById("name").value.trim();
            const price = document.getElementById("price").value.trim();
            const description = document.getElementById("description").value.trim();
            const quantity = document.getElementById("quantity").value.trim();
            const view = document.getElementById("view").value.trim();
            const img = document.getElementById("img").value.trim();
            const cate = document.getElementById("cate").value.trim();

            if (!name) {
                document.getElementById("name-error").textContent = "Vui lòng nhập tên sản phẩm.";
                isValid = false;
            }
            if (!price || isNaN(price) || price <= 0) {
                document.getElementById("price-error").textContent = "Giá sản phẩm phải là số dương.";
                isValid = false;
            }
            if (!description) {
                document.getElementById("description-error").textContent = "Vui lòng nhập chi tiết sản phẩm.";
                isValid = false;
            }
            if (!quantity || isNaN(quantity) || quantity <= 0) {
                document.getElementById("quantity-error").textContent = "Số lượng phải là số dương.";
                isValid = false;
            }
            if (!view || isNaN(view) || view < 0) {
                document.getElementById("view-error").textContent = "Lượt xem phải là số không âm.";
                isValid = false;
            }
            if (!cate) {
                document.getElementById("cate-error").textContent = "Vui lòng chọn danh mục sản phẩm.";
                isValid = false;
            }

            return isValid;
        }
    </script>
</body>
</html>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Danh sách sản phẩm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">
      <h3 class="mb-0">Danh sách sản phẩm</h3>
      <a class="btn btn-primary" href="index.php?page=product-add">+ Thêm mới</a>
    </div>

    <table class="table table-bordered table-hover align-middle">
      <thead class="table-dark">
        <tr>
          <th style="width:80px">ID</th>
          <th>Tên</th>
          <th style="width:140px">Giá</th>
          <th style="width:160px">Hình ảnh</th>
          <th style="width:240px">Hành động</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach ($products as $p): ?>
          <tr>
            <td><?= (int)$p['id'] ?></td>

            <td>
              <a href="index.php?page=product-detail&id=<?= (int)$p['id'] ?>">
                <?= htmlspecialchars($p['name'] ?? '') ?>
              </a>
            </td>

            <td><?= htmlspecialchars($p['price'] ?? '') ?></td>

            <td>
              <?php if (!empty($p['image'])): ?>
                <img src="<?= htmlspecialchars($p['image']) ?>"
                     style="max-width:140px;max-height:90px;object-fit:cover;">
              <?php else: ?>
                <span class="text-muted">No image</span>
              <?php endif; ?>
            </td>

            <td>
              <a class="btn btn-sm btn-warning"
                 href="index.php?page=product-edit&id=<?= (int)$p['id'] ?>">Sửa</a>

              <a class="btn btn-sm btn-danger"
                 href="index.php?page=product-delete&id=<?= (int)$p['id'] ?>"
                 onclick="return confirm('Xóa sản phẩm này?')">Xóa</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

  </div>
</body>
</html>

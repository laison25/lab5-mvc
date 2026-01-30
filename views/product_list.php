<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Danh sách sản phẩm</title>
</head>
<body>
  <h1>Danh sách sản phẩm</h1>

  <?php if (empty($products)) : ?>
    <p>Không có sản phẩm.</p>
  <?php else: ?>
    <table border="1" cellpadding="8" cellspacing="0">
      <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Giá</th>
      </tr>

      <?php foreach ($products as $p): ?>
        <tr>
          <td><?= htmlspecialchars($p['id'] ?? '') ?></td>
          <td><?= htmlspecialchars($p['name'] ?? '') ?></td>
          <td><?= htmlspecialchars($p['price'] ?? '') ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
  <?php endif; ?>
</body>
</html>

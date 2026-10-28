
<?php
require "db.php";

$id = isset($_GET["id"]) ? (int)$_GET["id"] : 0;

if ($id <= 0) {
    die("ID không hợp lệ.");
}

mysqli_begin_transaction($conn);

try {
    // Bước 1: Xóa bản ghi được chọn
    $sql = "DELETE FROM person WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) == 0) {
        throw new Exception("Không tìm thấy bản ghi cần xóa.");
    }

    mysqli_stmt_close($stmt);

    // Bước 2: Lấy các ID còn lại theo thứ tự tăng dần
    $result = mysqli_query(
        $conn,
        "SELECT id FROM person ORDER BY id ASC"
    );

    if (!$result) {
        throw new Exception(mysqli_error($conn));
    }

    $ids = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $ids[] = (int)$row["id"];
    }

    // Bước 3: Tạo vùng ID tạm lớn hơn mọi ID hiện có
    $maxId = empty($ids) ? 0 : max($ids);
    $count = count($ids);
    $offset = $maxId + $count + 1;

    // Chuyển toàn bộ ID sang ID tạm để tránh trùng khóa chính
    $stmt = mysqli_prepare(
        $conn,
        "UPDATE person SET id = ? WHERE id = ?"
    );

    foreach ($ids as $index => $oldId) {
        $tempId = $offset + $index + 1;

        mysqli_stmt_bind_param(
            $stmt,
            "ii",
            $tempId,
            $oldId
        );

        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception(mysqli_stmt_error($stmt));
        }
    }

    mysqli_stmt_close($stmt);

    // Bước 4: Chuyển ID tạm về 1, 2, 3, ...
    $stmt = mysqli_prepare(
        $conn,
        "UPDATE person SET id = ? WHERE id = ?"
    );

    foreach ($ids as $index => $oldId) {
        $tempId = $offset + $index + 1;
        $newId = $index + 1;

        mysqli_stmt_bind_param(
            $stmt,
            "ii",
            $newId,
            $tempId
        );

        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception(mysqli_stmt_error($stmt));
        }
    }

    mysqli_stmt_close($stmt);

    // Bước 5: Hoàn tất giao dịch
    mysqli_commit($conn);

    // Bước 6: Đặt ID tự tăng tiếp theo
    $nextId = $count + 1;

    if (!mysqli_query(
        $conn,
        "ALTER TABLE person AUTO_INCREMENT = $nextId"
    )) {
        throw new Exception(mysqli_error($conn));
    }

    header("Location: index.php");
    exit;

} catch (Throwable $e) {
    mysqli_rollback($conn);
    die("Có lỗi xảy ra: " . htmlspecialchars($e->getMessage()));
}
?>

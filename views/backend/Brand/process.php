<?php


use App\Models\Brand;
use App\Libraries\MyClass;

if (isset($_POST['THEM'])) {
    $brand = new Brand();
    $brand->name = $_POST['name'];
    $brand->slug = (strlen($_POST['slug']) > 0) ? $_POST['slug'] : MyClass::str_slug($_POST['name']);
    $brand->description = $_POST['description'];
    $brand->status = $_POST['status'];

    if (strlen($_FILES['image']['name']) > 0) {
        $target_dir = "../public/images/brand/";
        $target_FILES = $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_FILES, PATHINFO_EXTENSION));
        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $filename = $brand->slug . '.' . $extension;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $brand->image = $filename;
        }
    }
    $brand->created_at = date('Y-m-d h:i:s');
    $brand->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    var_dump($brand);

    $brand->save();

    header("location:index.php?option=brand");
}
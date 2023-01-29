<!-- start #manage -->
<section id="manage-product" class="py-3">
    <?php if ($_SESSION['logged'] == false) {
        header("Location: login.php");
    } ?>
    <div class="container">
        <form method="POST" id="manage-product" enctype="multipart/form-data">
            <div class="form-group">
                <table class="table table-bordered table-data">
                    <thead>
                        <tr>
                            <th scope="colgroup rowgroup">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Origin</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($manageData as $item): ?>
                            <tr data-id="<?php echo $item['id'] ?>">
                                <td>
                                    <input type="number" value="<?php echo $item['id'] ?>" readonly
                                        name="id-<?php echo $item['id'] ?>">
                                </td>
                                <td>
                                    <input type="text" value="<?php echo $item['name'] ?>"
                                        name="name-<?php echo $item['id'] ?>">
                                </td>
                                <td>
                                    <select name="brand-<?php echo $item['id'] ?>">
                                        <option value="<?php echo $item['brand'] ?>" selected>
                                            <?php echo $item['brand'] ?>
                                        </option>
                                        <?php foreach ($brandData as $brand) { ?>
                                            <option value="<?php echo $brand['id'] ?>">
                                                <?php echo $brand['brand'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" value="<?php echo $item['origin'] ?>" disabled
                                        name="origin-<?php echo $item['id'] ?>">
                                </td>
                                <td>
                                    <input type="number" step="0.01" value="<?php echo $item['price'] ?>"
                                        name="price-<?php echo $item['id'] ?>">
                                </td>
                                <td>
                                    <div class="preview-image">
                                        <img src="<?php echo $item['image'] ?>" alt="preview">
                                        <input type="file" name="image-<?php echo $item['id'] ?>" accept="image/*">
                                    </div>
                                </td>
                                <td>
                                    <button type="submit" name="manage-update"
                                        formaction="manage.php?id=<?php echo $item['id'] ?>"
                                        class="btn btn-warning">Update</button>
                                </td>
                                <td>
                                    <button type="submit" name="manage-delete"
                                        formaction="manage.php?id=<?php echo $item['id'] ?>"
                                        class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <button type="button" class="btn btn-secondary addItem">Add Item</button>
            </div>
        </form>
    </div>
</section>
<!-- !start #manage -->
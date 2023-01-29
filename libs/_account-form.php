<!-- start #account -->
<section id="account" class="py-3">
    <?php if ($_SESSION['logged'] == false) {
        header("Location: login.php");
    } ?>
    <div class="container-xxl">
        <div class="row">
            <div class="col-3">
                <!-- add member -->
                <form method="POST" class="form" id="add-member">
                    <h3 class="heading">Add member</h3>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="username" class="form-label">Username (*)</label>
                                <input id="username" name="username" type="text" rules="required|min:3|max:10"
                                    placeholder="Nhập tên đăng nhập của bạn" class="form-control">
                                <span class="form-message"></span>
                            </div>

                            <div class="form-group">
                                <label for="password" class="form-label">Password (*)</label>
                                <input id="password" name="password" type="password" rules="required|min:3"
                                    placeholder="Nhập mật khẩu" class="form-control">
                                <span class="form-message"></span>
                            </div>

                            <div class="form-group">
                                <label for="privilege" class="form-label">Privilege (*)</label>
                                <select id="privilege" name="privilege" rules="required" class="form-control">
                                    <option value="">-- Chọn đặc quyền --</option>
                                    <option value="User">User</option>
                                    <option value="Admin">Admin</option>
                                </select>
                                <span class="form-message"></span>
                            </div>
                        </div>
                    </div>

                    <button class="form-submit" name="add-member-submit">Add member</button>
                </form>
                <!-- !add member -->
            </div>
            <div class="col-9">
                <form method="POST" id="account-member">
                    <div class="form-group">
                        <table class="table table-striped table-bordered table-data">
                            <thead>
                                <tr class="text-center">
                                    <th scope="colgroup rowgroup">ID</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">Privilege</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($accData as $item): ?>
                                    <tr data-id="<?php echo $item['id'] ?>">
                                        <td>
                                            <input type="number" value="<?php echo $item['id'] ?>" readonly
                                                name="id-<?php echo $item['id'] ?>">
                                        </td>
                                        <td>
                                            <input type="text" value="<?php echo $item['username'] ?>"
                                                name="username-<?php echo $item['id'] ?>" class="text-center">
                                        </td>
                                        <td>
                                            <input type="text" value="<?php echo $item['password'] ?>"
                                                name="password-<?php echo $item['id'] ?>" class="text-center">
                                        </td>
                                        <td>
                                            <select name="privilege-<?php echo $item['id'] ?>">
                                                <option value="<?php echo $item['privilege'] ?>" selected>
                                                    <?php echo $item['privilege'] ? 'Admin' : 'User'; ?>
                                                </option>
                                                <option value="1">Admin</option>
                                                <option value="0">User</option>
                                            </select>
                                        </td>
                                        <td>
                                            <button type="submit" name="account-update"
                                                formaction="account.php?id=<?php echo $item['id'] ?>"
                                                class="btn btn-warning">Update</button>
                                        </td>
                                        <td>
                                            <button type="submit" name="account-delete"
                                                formaction="account.php?id=<?php echo $item['id'] ?>"
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
        </div>
    </div>
</section>
<!-- !start #account -->
<!-- start #account -->
<section id="account" class="py-3">
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
                                <tr data-id="1">
                                    <td>
                                        <input type="number" value="1" readonly name="id-1">
                                    </td>
                                    <td>
                                        <input type="text" value="admin" rules="max:10" name="username-1"
                                            class="text-center">
                                    </td>
                                    <td>
                                        <input type="text" value="admin" rules="max:10" name="password-1"
                                            class="text-center">
                                    </td>
                                    <td>
                                        <select name="privilege-1">
                                            <option value="Admin">Admin</option>
                                            <option value="User">User</option>
                                        </select>
                                    </td>
                                    <td>
                                        <a href="account.php?id=1" class="btn btn-warning">Update</a>
                                    </td>
                                    <td>
                                        <a href="account.php?id=1" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                <tr data-id="2">
                                    <td>
                                        <input type="number" value="2" readonly name="id-2">
                                    </td>
                                    <td>
                                        <input type="text" value="david" rules="max:10" name="username-2"
                                            class="text-center">
                                    </td>
                                    <td>
                                        <input type="text" value="test" rules="max:10" name="password-2"
                                            class="text-center">
                                    </td>
                                    <td>
                                        <select name="privilege-2">
                                            <option value="User">User</option>
                                            <option value="Admin">Admin</option>
                                        </select>
                                    </td>
                                    <td>
                                        <a href="account.php?id=2" class="btn btn-warning">Update</a>
                                    </td>
                                    <td>
                                        <a href="account.php?id=2" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                <tr data-id="3">
                                    <td>
                                        <input type="number" value="3" readonly name="id-3">
                                    </td>
                                    <td>
                                        <input type="text" value="lenin" rules="max:10" name="username-3"
                                            class="text-center">
                                    </td>
                                    <td>
                                        <input type="text" value="12345" rules="max:10" name="password-3"
                                            class="text-center">
                                    </td>
                                    <td>
                                        <select name="privilege-3">
                                            <option value="User">User</option>
                                            <option value="Admin">Admin</option>
                                        </select>
                                    </td>
                                    <td>
                                        <a href="account.php?id=3" class="btn btn-warning">Update</a>
                                    </td>
                                    <td>
                                        <a href="account.php?id=3" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                <tr data-id="4">
                                    <td>
                                        <input type="number" value="4" readonly name="id-4">
                                    </td>
                                    <td>
                                        <input type="text" value="kevin" rules="max:10" name="username-4"
                                            class="text-center">
                                    </td>
                                    <td>
                                        <input type="text" value="password" rules="max:10" name="password-4"
                                            class="text-center">
                                    </td>
                                    <td>
                                        <select name="privilege-4">
                                            <option value="User">User</option>
                                            <option value="Admin">Admin</option>
                                        </select>
                                    </td>
                                    <td>
                                        <a href="account.php?id=4" class="btn btn-warning">Update</a>
                                    </td>
                                    <td>
                                        <a href="account.php?id=4" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <span class="form-message"></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- !start #account -->
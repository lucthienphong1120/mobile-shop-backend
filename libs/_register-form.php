<!-- start register -->
<section class="register">
    <div class="main py-3">
        <!-- sign up -->
        <form method="POST" class="form" id="sign-up">
            <h3 class="heading">Sign up</h3>
            <p class="desc">Register to receive offers from us right now!</p>
            <div class="row" style="width: 800px;">
                <div class="col">
                    <div class="form-group">
                        <label for="fullname" class="form-label">Fullname (*)</label>
                        <input id="fullname" name="fullname" type="text" rules="required" placeholder="Nhập tên của bạn"
                            class="form-control">
                        <span class="form-message"></span>
                    </div>

                    <div class="form-group">
                        <label for="username" class="form-label">Username (*)</label>
                        <input id="username" name="username" type="text" rules="required|min:3|max:10"
                            placeholder="Chọn tên tài khoản của bạn" class="form-control">
                        <span class="form-message"></span>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Password (*)</label>
                        <input id="password" name="password" type="password" rules="required|min:3"
                            placeholder="Nhập mật khẩu" class="form-control">
                        <span class="form-message"></span>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">Confirm password (*)</label>
                        <input id="password_confirmation" name="password_confirmation"
                            rules="required|confirm:#password" placeholder="Nhập lại mật khẩu" type="password"
                            class="form-control">
                        <span class="form-message"></span>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="form-label">Phone (*)</label>
                        <input id="phone" name="phone" type="number" rules="required|min:10|max:10"
                            placeholder="Nhập số điện thoại" class="form-control">
                        <span class="form-message"></span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="avatar" class="form-label">Avatar</label>
                        <input id="avatar" name="avatar" type="file" class="form-radio-control">
                        <span class="form-message"></span>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Email (*)</label>
                        <input id="email" name="email" type="text" rules="required|email"
                            placeholder="Nhập email đăng ký" class="form-control">
                        <span class="form-message"></span>
                    </div>

                    <div class="form-group">
                        <label for="city" class="form-label">City (*)</label>
                        <select id="city" rules="required" name="city" class="form-control">
                            <option value="">-- Chọn thành phố --</option>
                            <option value="ha noi">Hà Nội</option>
                            <option value="ho chi minh">Hồ Chí Minh</option>
                            <option value="thanh hoa">Thanh Hóa</option>
                            <option value="nghe an">Nghệ An</option>
                            <option value="dong nai">Đồng Nai</option>
                            <option value="binh duong">Bình Dương</option>
                            <option value="hai phong">Hải Phòng</option>
                            <option value="an giang">An Giang</option>
                            <option value="hai duong">Hải Dương</option>
                            <option value="hue">Huế</option>
                        </select>
                        <span class="form-message"></span>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Gender (*)</label>
                        <div class="form-radio-control">
                            <div>
                                <input name="gender" type="radio" rules="checkone:gender" value="nam"
                                    class="form-radio">Nam
                            </div>
                            <div>
                                <input name="gender" type="radio" rules="checkone:gender" value="nu"
                                    class="form-radio">Nữ
                            </div>
                            <div>
                                <input name="gender" type="radio" rules="checkone:gender" value="khac"
                                    class="form-radio">Khác
                            </div>
                        </div>
                        <span class="form-message"></span>
                    </div>

                    <div class="form-group">
                        <label for="address" class="form-label">Address</label>
                        <input id="address" name="address" type="text" placeholder="Nhập địa chỉ của bạn"
                            class="form-control">
                        <span class="form-message"></span>
                    </div>
                </div>
            </div>

            <button class="form-submit" type="submit" name="register-submit">Sign up</button>
            <p class="desc">Already have an account? <a href="./login.html">Sign in</a></p>
        </form>

    </div>
</section>
<!-- !start register -->
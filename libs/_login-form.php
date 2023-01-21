<!-- start login -->
<section class="login">
    <div class="main py-3">
        <!-- log in -->
        <form method="POST" class="form" id="sign-in">
            <h3 class="heading">Sign in</h3>
            <p class="desc">Log in to enjoy exclusive offers for you!</p>
            <div class="row" style="width: 400px;">
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
                </div>
            </div>

            <button class="form-submit" type="submit" name="login-submit">Sign in</button>
            <p class="desc">Don't have an account? <a href="./register.php">Sign up</a></p>
        </form>

    </div>
</section>
<!-- !start login -->
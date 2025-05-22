<body>
    <div class="auth-and-reg">
        <div class="registration-field">
            <p class="auth-title">Зарегистрироваться</p>
            <form action="newacc" class="auth-form" method="post">
                <label for="reg-login">Введите логин</label>
                <input type="text" name="reg-login" id="reg-login" placeholder="например, 'example'">
                <label for="reg-email">Введите вашу электронную почту</label>
                <input type="email" name="reg-email" id="reg-email" placeholder="например, 'example@chsu.ru'">
                <label for="reg-pass">Придумайте пароль</label>
                <input type="password" name="reg-pass" id="reg-pass" placeholder=":)">
                <button class="send-reg-info">Зарегистрироваться</button>
            </form>
            <div class="auth-redirect">
                <h7>Уже есть аккаунт</h7> <a class="auth" href="auth">Войти</a>
            </div>
        </div>
    </div>

</body>

</html>
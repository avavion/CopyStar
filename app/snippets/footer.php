<footer class="footer" id="footer">
    <div class="container">
        <div class="footer__inner">
            <div class="logo">
                <a href="/index.php">
                    <img src="assets/img/logo_x2.png" alt="">
                    <p>Copy<span class="green">Star</span></p>
                </a>
            </div>

            <ul class="list justify-flex-end">
                <!-- Start menu list-->
                <li class="list__item">
                    <a href="/about.php" class="list__link">
                        О нас
                    </a>
                </li>
                <li class="list__item">
                    <a href="/collections.php" class="list__link">
                        Каталог
                    </a>
                </li>
                <li class="list__item">
                    <a href="/contact.php" class="list__link">
                        Где нас найти?
                    </a>
                </li>

                <?php if (isset($_SESSION['user'])): ?>
                    <?php if ($_SESSION['user']['is_admin']): ?>
                        <li class="list__item">
                            <a href="/admin.php" class="list__link">
                                Панель-администратора
                            </a>
                        </li>
                    <?php endif; ?>
                    <li class="list__item">
                        <a href="/cart.php" class="list__link">
                            Корзина
                        </a>
                    </li>
                <?php else: ?>
                    <li class="list__item">
                        <a href="/register.php" class="list__link">
                            Регистрация
                        </a>
                    </li>
                    <li class="list__item">
                        <a href="/login.php" class="list__link">
                            Авторизация
                        </a>
                    </li>
                <?php endif; ?>

                <!--                    End menu list-->
            </ul>
        </div>
    </div>
</footer>
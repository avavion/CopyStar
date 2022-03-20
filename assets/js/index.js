// Валидация формы, большая функция
const validateForm = (formSelector) => {
    const form = document.querySelector(formSelector);

    if (!form) return false;

    const inputs = form.querySelectorAll(`input[type='text'], input[type='password'], input[type='email']`);
    const checkboxes = form.querySelectorAll(`input[type='checkbox']`);

    const button = form.querySelector('button');

    const disableButton = () => {
        button.setAttribute('disabled', 'disabled');
    }

    const enableButton = () => {
        button.removeAttribute('disabled');
    }

    for (const input of inputs) {
        if (input.type === 'password') {

            const check = () => {
                if (input.value.length <= 6) {
                    input.classList.add('error');
                } else {
                    input.classList.remove('error');
                }
            }

            check();
            input.addEventListener('input', check);
        }
    }

    for (const checkbox of checkboxes) {
        checkbox.checked && enableButton();

        checkbox.addEventListener('change', (evt) => checkbox.checked ? enableButton() : disableButton());
    }


}

// Установка значения в локальное хранилище
const setLocalStorage = (key, data) => {
    localStorage.setItem(key, data);
}

// Получение данных их локального хранилища
const getLocalStorage = (key) => {

    if (localStorage.getItem(key) === null) {
        localStorage.setItem(key, JSON.stringify([]));

        return localStorage.getItem(key);
    }

    return localStorage.getItem(key);

}

// Функция отправки данных на сервер
const post = (url, data) => {
    return fetch(url, {
        method: "POST", mode: 'cors', body: JSON.stringify(data)
    });
}

// Функция отправки запроса на сервер
const get = (url) => {
    return fetch(url, {
        method: "GET", mode: 'cors'
    });
}

// Создание уведомления
const notification = (message, duration = 3000) => {

    const notifications = document.getElementById('notifications');

    if (!notifications) return false;

    const create = () => {
        const element = document.createElement('div');
        element.classList.add('notification');

        const title = document.createElement('h2');
        title.classList.add('notification__title');

        title.textContent = 'Уведомление';

        const text = document.createElement('p');
        text.classList.add('notification__text');

        text.textContent = message;

        element.append(title);
        element.append(text);

        return element;
    }

    const notification = create();

    notifications.append(notification);

    setTimeout(() => notification.remove(), duration);

}

const cartCounter = () => {
    const element = document.getElementById('cart-counter');

    if (!element) return false;

    const json = JSON.parse(getLocalStorage('cart'));

    const COUNT = json.length;

    element.setAttribute('data-cart-count', COUNT);
    element.textContent = COUNT;
};


// Скрипт для обработки страницы продукта
const product = () => {
    const product = document.getElementById('product');

    if (!product) return false;

    const json = JSON.parse(document.getElementById('product-json').textContent);

    const onClick = (evt) => {
        evt.preventDefault();

        const cartItems = JSON.parse(getLocalStorage('cart'));

        const exists = cartItems.filter((cartItem) => {
            if (cartItem.id === json.id) return cartItem;
        });

        if (exists.length) {
            notification('Вы не можете добавить один и тот же товар!');
            return false;
        }

        cartItems.push(json);
        setLocalStorage('cart', JSON.stringify(cartItems));

        cartCounter();

        notification('Товар успешно добавлен в корзину!');
    }

    const button = product.querySelector('button');

    button.addEventListener('click', onClick);
}



// Скрипт для обработки корзины
const cart = () => {
    const cart = document.getElementById('cart');

    if (!cart) return false;

    const container = cart.querySelector('.cart-items');
    const button = cart.querySelector('.js-create-order');
    const totalPrice = cart.querySelector('[cart-total-price]');

    const render = () => {
        container.innerHTML = '';

        const json = JSON.parse(getLocalStorage('cart'));

        get(location.origin + '/app/api/product/all.php')
            .then((response) => response.ok && response.json())
            .then((products) => {

                const items = [];

                for (const product of products) {
                    for (const item of json) {
                        if (item.id === product.id) {
                            items.push(product);
                        }
                    }
                }

                const TOTAL_PRICE = items.reduce((prev, curr) => prev += curr.price, 0)

                totalPrice.textContent = TOTAL_PRICE;

                items.map((item) => {

                    const image = item.image === null ? 'assets/img/printer.png' : 'assets/img/' + item.image.replaceAll(' ', '_');

                    container.insertAdjacentHTML(`beforeend`, `
                                <div class="cart-item">
                            <img src="${image}" alt="${item.name}">
                            <h3 class="cart-item__title">
                                ${item.name}
                            </h3>
                            <p class="cart-item__text price">
                                Стоимость: <span class="black bold">${item.price}</span> руб.
                            </p>
                        </div>
                    `);
                });

            })
    }

    render();

    button.addEventListener('click', (evt) => {
        evt.preventDefault();

        const json = JSON.parse(getLocalStorage('cart'));
        const user_id = evt.currentTarget.getAttribute('data-user-id');

        const body = {
            id: user_id, data: json
        }

        post(location.origin + '/app/api/cart/add.php', body)
            .then((response) => response.text())
            .then((data) => {
                console.log(data)
            });
    });

}

const init = () => {
    product();
    cart();
    validateForm('.form');
    cartCounter();

};

document.addEventListener('DOMContentLoaded', init);
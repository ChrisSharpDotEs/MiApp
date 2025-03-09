import './bootstrap.min.js';
class CookieModalManager {
    constructor() {
        this.acceptCookies = document.getElementById('accept-cookies');
        this.rejectCookies = document.getElementById('reject-cookies');
    }
    handle() {
        this.acceptCookies.addEventListener('click', () => {
            document.cookie = this.setCookie('accepted-cookies=true');
        });
        this.rejectCookies.addEventListener('click', () => {
            document.cookie = this.setCookie('accepted-cookies=false');
        })
    }
    setCookie(cookieName) {
        let fechaExpiracion = new Date();
        fechaExpiracion.setMinutes(fechaExpiracion.getMinutes() + 1);
        return cookieName + "; expires=" + fechaExpiracion.toUTCString() + "; path=/; sameSite=Strict";
    }
    existsCookie(cookieName) {
        return document.cookie.includes(cookieName);
    }
}
class UIManager {
    static handleNavBar() {
        document.querySelectorAll('.navbar .nav-item > .nav-link').forEach(item => {
            if (item.getAttribute('data-path-item') == location.pathname) {
                console.log(location.pathname, 'yes', item.getAttribute('data-path-item'))
                item.classList.add('active', 'border-bottom');
                item.setAttribute('aria-current', 'page');
            } else {
                console.log(location.pathname, 'no', item.getAttribute('data-path-item'));
                item.classList.remove('active', 'border-bottom');
                item.removeAttribute('aria-current');
            }
        });
    }
}
class FormValidator {
    constructor(id) {
        this.form = document.getElementById(id);
        this.submitButton = this.form.querySelector('button[type="submit"]');
        this.password = this.form.querySelector('[name="password"]');
        this.confirmPassword = this.form.querySelector('[name="confirmPassword"]');
        this.passwordError = document.getElementById("passwordError");

        if (!this.form) {
            throw Error("No se encuentra el formulario de id: " + id);
        }
        console.log('formed');
    }
    handle() {
        this.form.addEventListener('submit', (e) => {
            e.preventDefault();
            this.validate();
        });
    }
    validatePasswords() {
        this.passwordError.textContent = "";

        if (this.password.value !== this.confirmPassword.value) {
            this.passwordError.textContent = "Las contraseñas no coinciden.";
            return false;
        }

        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        if (!passwordRegex.test(this.password.value)) {
            this.passwordError.textContent = "La contraseña debe tener al menos 8 caracteres, una mayúscula, una minúscula, un número y un carácter especial.";
            return false;
        }
        return true;
    }
    validate() {
        if (!this.form) {
            console.error("No se puede validar: formulario no inicializado.");
            return;
        }
        if (this.validatePasswords()) {
            this.confirmPassword.classList.remove('border-danger');
            this.password.classList.remove('border-danger');
            this.form.submit();
        } else {
            this.confirmPassword.classList.add('border-danger');
            this.password.classList.add('border-danger');
        }
    }
}
UIManager.handleNavBar();
const cookieManager = new CookieModalManager();

const modal = document.getElementById("modalId");
if (modal && !cookieManager.existsCookie('accepted-cookies')) {
    const myModal = new bootstrap.Modal(modal);
    myModal.show();
    cookieManager.handle();
}

window.onload = () => {
    const formvalidator = new FormValidator('register-form');
    formvalidator.handle();
};

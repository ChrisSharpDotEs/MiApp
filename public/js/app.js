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
            if(item.getAttribute('data-path-item') == location.pathname) {
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
UIManager.handleNavBar();
const cookieManager = new CookieModalManager();

const modal = document.getElementById("modalId");
if (modal && !cookieManager.existsCookie('accepted-cookies')) {
    const myModal = new bootstrap.Modal(modal);
    myModal.show();
    cookieManager.handle();
}

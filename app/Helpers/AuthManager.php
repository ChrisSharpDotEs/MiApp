<?php
class AuthManager
{
    private $token;
    private $loginMessage;
    private $logoutForm;
    private $dashboardLink;
    private $loginButton;

    public function __construct()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        $this->generateToken();
        $this->processLoginMessage();
        $this->generateAuthElements();
    }
    private function generateToken()
    {
        $this->token = isset($_SESSION["_token"]) ? $_SESSION["_token"] : bin2hex(random_bytes(32));
        $_SESSION["_token"] = $this->token;
    }
    private function processLoginMessage()
    {
        if ($this->isLogged() && $this->isFirstLogin()) {
            ob_start();
            include "./public/views/components/alert.php";
            $alertHTML = ob_get_clean();
            $this->loginMessage = $alertHTML;
            unset($_SESSION['message']);
        } else {
            $this->loginMessage = null;
        }
    }
    private function generateAuthElements()
    {
        if ($this->isLogged()) {
            $this->logoutForm = "<form action=\"/auth\" method=\"post\">
                <input type=\"hidden\" name=\"action\" value=\"logout\" hidden>
                <input type=\"hidden\" name=\"_token\" value=\"{$_SESSION['_token']}\" hidden>
                <button type=\"submit\" class=\"btn btn-outline-light rounded-0\">Cerrar Sesión</button>
            </form>";
            $this->dashboardLink = "<li class=\"nav-item\">
                <a class=\"nav-link\" href=\"/dashboard\" data-path-item=\"/dashboard\">Dashboard</a>
            </li>";
            $this->loginButton = null;
        } else {
            $this->logoutForm = null;
            $this->dashboardLink = null;
            $this->loginButton = "<div><a href=\"/login\" class=\"btn btn-primary rounded-0 p-3\">Comenzar</a></div>";
        }
    }
    public function isLogged()
    {
        return isset($_SESSION) && array_key_exists('usuario', $_SESSION);
    }
    public function isFirstLogin()
    {
        return isset($_SESSION) && array_key_exists('message', $_SESSION);
    }
    public function getLoginMessage()
    {
        return $this->loginMessage;
    }
    public function getLogoutForm()
    {
        return $this->logoutForm;
    }
    public function getDashboardLink()
    {
        return $this->dashboardLink;
    }
    public function getLoginButton()
    {
        return $this->loginButton;
    }
    public function getToken()
    {
        return $this->token;
    }
}

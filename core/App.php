<?php
/**
 * Core Application Router
 * Menangani URL tertutup / Clean URL dan memetakan ke Controller & Action
 */

class App {
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $params = [];

    // Pemetaan rute URL tertutup ke nama Controller
    protected $routes = [
        ''                => 'HomeController',
        'home'            => 'HomeController',
        'beranda'         => 'HomeController',
        'tugas-fungsi'    => 'TugasFungsiController',
        'struktur'        => 'StrukturController',
        'maklumat'        => 'MaklumatController',
        'standar'         => 'StandarController',
        'jadwal'          => 'JadwalController',
        'jenis'           => 'JenisController',
        'layanan'         => 'LayananController',
        'galeri'          => 'GaleriController',
        'capaian-kinerja' => 'CapaianKinerjaController',
    ];

    public function __construct() {
        $url = $this->parseUrl();

        $routeKey = '';
        if (!empty($url)) {
            $routeKey = strtolower(trim($url[0]));
        }

        // 1. Cek rute yang terdaftar
        if (isset($this->routes[$routeKey])) {
            $this->controller = $this->routes[$routeKey];
            unset($url[0]);
        } else if (!empty($routeKey)) {
            // 2. Coba format PascalCase: contoh "tugas-fungsi" -> "TugasFungsiController"
            $formatted = str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $routeKey))) . 'Controller';
            if (file_exists(APP_ROOT . '/controllers/' . $formatted . '.php')) {
                $this->controller = $formatted;
                unset($url[0]);
            } else {
                $this->controller = 'NotFoundController';
            }
        }

        // Muat file controller
        $controllerFile = APP_ROOT . '/controllers/' . $this->controller . '.php';
        if (file_exists($controllerFile)) {
            require_once $controllerFile;
        } else {
            require_once APP_ROOT . '/controllers/NotFoundController.php';
            $this->controller = 'NotFoundController';
        }

        $this->controller = new $this->controller;

        // Cek method/action
        if (isset($url[1])) {
            $methodName = str_replace(' ', '', lcfirst(ucwords(str_replace(['-', '_'], ' ', $url[1]))));
            if (method_exists($this->controller, $methodName)) {
                $this->method = $methodName;
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];

        // Eksekusi method controller dengan parameter
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    /**
     * Membaca dan mem-parsing parameter URL secara aman
     */
    public function parseUrl() {
        // Prioritas 1: Ambil dari query string $_GET['url'] (yang di-rewrite oleh .htaccess)
        if (isset($_GET['url'])) {
            $raw = filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL);
            if (substr($raw, -4) === '.php') {
                $raw = substr($raw, 0, -4);
            }
            return explode('/', $raw);
        }

        // Prioritas 2: Fallback membaca REQUEST_URI langsung jika rewrite tidak mengoper $_GET['url']
        $requestUri = $_SERVER['REQUEST_URI'] ?? '/';
        $scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
        $baseDir = rtrim(str_replace('\\', '/', dirname($scriptName)), '/');

        if ($baseDir !== '' && strpos($requestUri, $baseDir) === 0) {
            $requestUri = substr($requestUri, strlen($baseDir));
        }

        $requestUri = strtok($requestUri, '?');
        $trimmed = trim($requestUri, '/');

        // Bersihkan ekstensi .php jika ada
        if (substr($trimmed, -4) === '.php') {
            $trimmed = substr($trimmed, 0, -4);
        }

        return $trimmed !== '' ? explode('/', filter_var($trimmed, FILTER_SANITIZE_URL)) : [];
    }
}

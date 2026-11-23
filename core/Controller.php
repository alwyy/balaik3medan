<?php
/**
 * Base Controller
 * Menyediakan method view dan model untuk semua child controller
 */

class Controller {
    /**
     * Memuat file view dengan layout
     * 
     * @param string $view   Path file view relatif terhadap folder views/
     * @param array  $data   Data yang di-pass ke view
     * @param bool   $layout Gunakan template layout (header & footer) atau tidak
     */
    public function view($view, $data = [], $layout = true) {
        // Ekstrak array data menjadi variabel lokal di view
        extract($data);

        $viewFile = APP_ROOT . '/views/' . $view . '.php';

        if (!file_exists($viewFile)) {
            die("View '{$view}' tidak ditemukan pada: " . $viewFile);
        }

        if ($layout) {
            require APP_ROOT . '/views/layouts/header.php';
            require $viewFile;
            require APP_ROOT . '/views/layouts/footer.php';
        } else {
            require $viewFile;
        }
    }

    /**
     * Memuat instance model
     * 
     * @param string $model Nama class model
     * @return object|null
     */
    public function model($model) {
        $modelFile = APP_ROOT . '/models/' . $model . '.php';
        if (file_exists($modelFile)) {
            require_once $modelFile;
            return new $model();
        }
        return null;
    }

    /**
     * Redirect ke URL tertentu
     */
    public function redirect($path) {
        header('Location: ' . url($path));
        exit;
    }
}

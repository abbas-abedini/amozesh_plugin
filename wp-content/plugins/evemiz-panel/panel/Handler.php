<?php
namespace Evemiz\Panel;

abstract class Handler {
    // هر کلاس فرزند باید این متد را پیاده‌سازی کند
    abstract public function index();
    abstract protected static function get_data();
}

<?php

class SingletonClass {
    // Hold the instance of the class
    private static $instance = null;

    // Private constructor to prevent creating multiple instances
    private function __construct() {
        // Initialization code, if needed
    }

    // Method to get the singleton instance
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    // Example method of the singleton class
    public function showMessage() {
        echo "Hello, I am a singleton instance!";
    }
}

// Usage of the singleton class
$singletonInstance1 = SingletonClass::getInstance();
$singletonInstance1->showMessage();

// Trying to create another instance will return the same instance
$singletonInstance2 = SingletonClass::getInstance();
$singletonInstance2->showMessage();

// Check if both instances are the same
var_dump($singletonInstance1 === $singletonInstance2); // Output: true
?>
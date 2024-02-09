<?php
interface VehiclePrototype {
    public function clone(): VehiclePrototype;
}

class Car implements VehiclePrototype {
    private $model;
    private $color;
    private $features;

    public function __construct(string $model, string $color, array $features) {
        $this->model = $model;
        $this->color = $color;
        $this->features = $features;
    }

    public function clone(): VehiclePrototype {
        return new Car($this->model, $this->color, $this->features); // Creates a new Car instance with the same properties
    }

    public function drive(): string {
        return "Driving a {$this->color} {$this->model} with features: " . implode(', ', $this->features);
    }
}
/*We introduce the VehiclePrototype interface with a clone method.

The Car class implements the VehiclePrototype interface and provides its own clone method, which creates a new Car instance with the same properties as the original.

When we call the clone method on a Car instance, it returns a new Car object with identical properties, effectively cloning the original Car.
*/?>
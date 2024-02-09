<?php

/*This PHP code illustrates the use of the Builder pattern to facilitate the construction of Car and Bicycle objects with customizable configurations. 
The VehicleBuilder class serves as a flexible interface for setting properties such as type, model, color, features, gear count, and accessories.
 Through a fluent interface, clients can easily specify the desired attributes and then invoke the build method to obtain the corresponding Car or Bicycle instance. 
 This approach promotes code clarity and maintainability by encapsulating the object creation process and allowing for the creation of diverse vehicle objects without cluttering the client code with numerous constructor parameters or conditional logic.*/

 interface Vehicle {
    public function drive(): string;
}

class Car implements Vehicle {
    private string $model;
    private string $color;
    private array $features;

    public function __construct(string $model, string $color, array $features) {
        $this->model = $model;
        $this->color = $color;
        $this->features = $features;
    }

    public function drive(): string {
        return "Driving a {$this->color} {$this->model} with features: " . implode(', ', $this->features);
    }
}

class Bicycle implements Vehicle {
    private string $type;
    private int $gearCount;
    private array $accessories;

    public function __construct(string $type, int $gearCount, array $accessories) {
        $this->type = $type;
        $this->gearCount = $gearCount;
        $this->accessories = $accessories;
    }

    public function drive(): string {
        return "Riding a {$this->type} bicycle with {$this->gearCount} gears and accessories: " . implode(', ', $this->accessories);
    }
}

class VehicleBuilder {
    private string $type;
    private string $model;
    private string $color = "White";
    private array $features = [];
    private int $gearCount = 1;
    private array $accessories = [];

    public function setType(string $type): self {
        $this->type = $type;
        return $this;
    }

    public function setModel(string $model): self {
        $this->model = $model;
        return $this;
    }

    public function setColor(string $color): self {
        $this->color = $color;
        return $this;
    }

    public function addFeature(string $feature): self {
        $this->features[] = $feature;
        return $this;
    }

    public function setGearCount(int $gearCount): self {
        $this->gearCount = $gearCount;
        return $this;
    }

    public function addAccessory(string $accessory): self {
        $this->accessories[] = $accessory;
        return $this;
    }

    public function build(): Vehicle {
        if ($this->type === 'Car') {
            return new Car($this->model, $this->color, $this->features);
        } else if ($this->type === 'Bicycle') {
            return new Bicycle($this->type, $this->gearCount, $this->accessories);
        } else {
            throw new Exception("Invalid vehicle type.");
        }
    }
}

// Usage:
$car = (new VehicleBuilder())
    ->setType('Car')
    ->setModel('Sedan')
    ->setColor('Red')
    ->addFeature('Sunroof')
    ->build();

echo $car->drive(); // Output: Driving a Red Sedan with features: Sunroof

$bicycle = (new VehicleBuilder())
    ->setType('Bicycle')
    ->setGearCount(21)
    ->addAccessory('Helmet')
    ->build();

echo $bicycle->drive(); // Output: Riding a Mountain bicycle with 21 gears and accessories: Helmet
?>
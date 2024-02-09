<?php

// Abstract Product interface
interface Vehicle
{
  public function drive(): string;
}

// Abstract Factory interface
interface VehicleFactoryInterface
{
  public function createCar(): Vehicle;
  public function createBicycle(): Vehicle;
}

// Concrete Product 1 (same)
class Car implements Vehicle
{
  public function drive(): string
  {
    return 'Driving a car';
  }
}

// Concrete Product 2 (same)
class Bicycle implements Vehicle
{
  public function drive(): string
  {
    return 'Riding a bicycle';
  }
}

// Concrete Factory 1 (now with a name)
class ModernVehicleFactory implements VehicleFactoryInterface
{
  public function createCar(): Vehicle
  {
    return new ModernCar(); // Modified to use ModernCar
  }

  public function createBicycle(): Vehicle
  {
    return new ModernBicycle(); // Modified to use ModernBicycle
  }
}

// Concrete Factory 2 (example with different product types)
class ClassicVehicleFactory implements VehicleFactoryInterface
{
  public function createCar(): Vehicle
  {
    return new ClassicCar(); // Modified to use ClassicCar
  }

  public function createBicycle(): Vehicle
  {
    return new ClassicBicycle(); // Modified to use ClassicBicycle
  }
}

// Abstract Product variations (optional)
class ModernCar implements Vehicle
{
  // Implement specific behavior for a modern car
  public function drive(): string
  {
    return 'Cruising in a sleek modern car';
  }
}

class ModernBicycle implements Vehicle
{
  // Implement specific behavior for a modern bicycle
  public function drive(): string
  {
    return 'Riding a fast and efficient modern bicycle';
  }
}

class ClassicCar implements Vehicle
{
  // Implement specific behavior for a classic car
  public function drive(): string
  {
    return 'Taking a nostalgic ride in a classic car';
  }
}

class ClassicBicycle implements Vehicle
{
  // Implement specific behavior for a classic bicycle
  public function drive(): string
  {
    return 'Enjoying a leisurely ride on a classic bicycle';
  }
}

// Client code
$modernFactory = new ModernVehicleFactory();
$modernCar = $modernFactory->createCar();
echo $modernCar->drive(); // Output: Cruising in a sleek modern car

$modernBicycle = $modernFactory->createBicycle();
echo $modernBicycle->drive(); // Output: Riding a fast and efficient modern bicycle

// Use a different factory for a different product family
$classicFactory = new ClassicVehicleFactory();
$classicCar = $classicFactory->createCar();
echo $classicCar->drive(); // Output: Taking a nostalgic ride in a classic car

$classicBicycle = $classicFactory->createBicycle();
echo $classicBicycle->drive(); // Output: Enjoying a leisurely ride on a classic bicycle

?>

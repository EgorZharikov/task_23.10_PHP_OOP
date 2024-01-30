<?php
interface SpecialForceInterface
{
    public function useSpecialForce();
}

abstract class Machine //implements SpecialForceInterface
{
    private $engine;
    private $body;
    private $maxSpeed;
    private $controllability;

    public function __construct(int $engine, string $body, int $maxSpeed, int $controllability)
    {
        $this->engine = $engine;
        $this->body = $body;
        $this->maxSpeed = $maxSpeed;
        $this->controllability = $controllability;
    }

    public function driveForward()
    {
        echo "drive" . PHP_EOL;
    }
    public function driveBack()
    {
        echo "drive back" . PHP_EOL;
    }
}

class Car extends Machine implements SpecialForceInterface
{
    private $carInterior;
    private $wheels;
    private $nitro;

    public function __construct(int $engine, string $body, int $maxSpeed, int $controllability, string $carInterior, int $wheels, int $nitro)
    {
        $this->carInterior = $carInterior;
        $this->wheels = $wheels;
        $this->nitro = $nitro;
        parent::__construct($engine, $body, $maxSpeed, $controllability);
    }

    public function useHorn()
    {
        echo "Beep-Beep" . PHP_EOL;
    }
    public function useWipers()
    {
        echo "turn on the wipers" . PHP_EOL;
    }

    public function useSpecialForce()
    {
        echo "use $this->nitro" . PHP_EOL;
    }
}

class specialMachinery extends Machine implements SpecialForceInterface
{
    private $defense;
    private $specialEquipment;

    public function __construct(int $engine, string $body, int $maxSpeed, int $controllability, int $defense, string $specialEquipment)
    {
        $this->defense = $defense;
        $this->specialEquipment = $specialEquipment;
        parent::__construct($engine, $body, $maxSpeed, $controllability);
    }
    public function useSpecialForce()
    {
        echo "use $this->specialEquipment" . PHP_EOL;
    }
}

class Tank extends Machine implements SpecialForceInterface
{
    private $armor;
    private $barrel;
    private $ammunition;
    private $ammunitionCount;

    public function __construct(int $engine, string $body, int $maxSpeed, int $controllability, int $armor, string $barrel, string $ammunition, int $ammunitionCount)
    {
        $this->armor = $armor;
        $this->barrel = $barrel;
        $this->ammunition = $ammunition;
        $this->ammunitionCount = $ammunitionCount;

        parent::__construct($engine, $body, $maxSpeed, $controllability);
    }

    public function useSpecialForce()
    {
        echo "shooting use $this->ammunition" . PHP_EOL;
        $this->ammunitionCount--;
    }
}

$tankT34 = new Tank(500, 'steel', 54, 3, 300, '76mm', 'BR-350A', 72);

/**
 * @param Tank $machine
 */

function testMachine(Machine $machine)
{
    $machine->driveForward();
    $machine->useSpecialForce();
}

testMachine($tankT34);

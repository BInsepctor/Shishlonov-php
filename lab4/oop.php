<?php

abstract class Animal
{
    protected string $name;
    protected string $color;
    protected int $countLegs;
    protected string $voice;
    protected string $favoriteEat;

    abstract public function eat(): void;
    abstract public function sleep(): void;
    abstract public function makeSound(): void;

    public function __construct(
        string $name,
        string $color,
        int $countLegs,
        string $favoriteEat
    ) {
        $this->name = $name;
        $this->color = $color;
        $this->countLegs = $countLegs;
        $this->favoriteEat = $favoriteEat;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    public function setCountLegs(int $countLegs): void
    {
        $this->countLegs = $countLegs;
    }

    public function setVoice(string $voice): void
    {
        $this->voice = $voice;
    }

    public function setFavoriteEat(string $favoriteEat): void
    {
        $this->favoriteEat = $favoriteEat;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function getCountLegs(): int
    {
        return $this->countLegs;
    }

    public function getVoice(): string
    {
        return $this->voice;
    }

    public function getFavoriteEat(): string
    {
        return $this->favoriteEat;
    }
}

class Cat extends Animal
{
    private int $age;

    public function __construct(
        string $name,
        string $color,
        int $countLegs,
        string $favoriteEat
    ) {
        parent::__construct($name, $color, $countLegs, $favoriteEat);
        $this->age = 0;
        $this->voice = 'Мяу-Мяу...мяу-мяу';
    }

    public function eat(): void
    {
        echo $this->name . " предпочитает есть " . $this->favoriteEat . "<br>";
    }

    public function sleep(): void
    {
        echo "Хоть у " . $this->name . "а и есть " . $this->countLegs . " лапы, но спит лежа <br>";
    }

    public function makeSound(): void
    {
        echo "Звук который издают коты: " . $this->voice . "<br>";
    }

    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    public function getAge(): int
    {
        return $this->age;
    }
}

class Dog extends Animal
{
    public function __construct(
        string $name,
        string $color,
        int $countLegs,
        string $favoriteEat
    ) {
        parent::__construct($name, $color, $countLegs, $favoriteEat);
        $this->voice = "Гав-гав";
    }

    public function eat(): void
    {
        echo $this->name . " ест все подряд, но любит: " . $this->favoriteEat . "<br>";
    }

    public function sleep(): void
    {
        echo "Собаки как только не спят <br>";
    }

    public function makeSound(): void
    {
        echo "Собаки лают с таким звуком: " . $this->voice . "<br>";
    }
}

class Bird extends Animal
{
    private string $type;

    public function __construct()
    {
       
    }

    public function eat(): void
    {
        echo "Птица породы " . $this->type . " по имени " . $this->name . " клюют " . $this->favoriteEat . "<br>";
    }

    public function sleep(): void
    {
        echo "Как-то спят на " . $this->countLegs . " лапах <br>";
    }

    public function makeSound(): void
    {
        echo "Тяжело определить, но " . $this->type . " издает звук: " . $this->voice . "<br>";
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getType(): string
    {
        return $this->type;
    }
}

$cat = new Cat('Барсик', 'Мраморный', 4, 'крыс');
$cat2 = new Cat('Мурзик', 'Рыжий', 3, 'мясо');

$cat->setColor('Синий');
$cat->setAge(30);
$cat2->setAge(10);

echo "Возраст " . $cat2->getName() . "а: " . $cat2->getAge() . " лет <br>";
$cat->eat();
$cat->sleep();
$cat->makeSound();

$dog = new Dog('Скуби', 'Черный', 3, 'шоколад');
$dog->eat();
$dog->sleep();
$dog->makeSound();

$parrot = new Bird();
$parrot->setName("Джин");
$parrot->setCountLegs(2);
$parrot->setColor("красный");
$parrot->setVoice("любой");
$parrot->setFavoriteEat("корм");
$parrot->setType("попугай");

$parrot->eat();
$parrot->sleep();
$parrot->makeSound();

$pigeon = new Bird();
$pigeon->setName("Клюква");
$pigeon->setCountLegs(2);
$pigeon->setColor("Белый");
$pigeon->setVoice("молчит");
$pigeon->setFavoriteEat("семечки");
$pigeon->setType("голубь");

$pigeon->eat();
$pigeon->sleep();
$pigeon->makeSound();
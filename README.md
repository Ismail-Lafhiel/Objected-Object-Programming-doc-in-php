
# PHP OOP

PHP introduced object-oriented programming features in version 5.0. Object-Oriented programming is one of the most popular programming paradigms based on the concept of objects and classes.
PHP OOP allows you to structure a complex application into a simpler and more maintainable structure.


## PHP Objects

### What is an Object

If you look at the world around you, you’ll find many examples of tangible objects: lamps, phones, computers, and cars. Also, you can find intangible objects such as bank accounts and transactions.

All of these objects share the two common key characteristics:
- State
- Behavior
For example, a bank account has the state that consists of:
- Account number
- Balance
A bank account also has the following behaviors:
- Deposit
- Withdraw

PHP objects are conceptually similar to real-world objects because they consist of state and behavior.
An object holds its state in variables that are often referred to as **properties**. An object also exposes its behavior via functions which are known as **methods**.

### What is a class?

In the real world, you can find many of the same kinds of objects. For example, a bank has many bank accounts. All of them have account numbers and balances.
These bank accounts are created from the same blueprint. In object-oriented terms, we say that an individual bank account is an instance of a Bank Account class.
By definition, a class is the blueprint of objects. For example, from the Bank Account class, you can create many bank account objects.

The following illustrates the relationship between the BankAccount class and its objects. From the ```BankAccount``` class you can create many ```BankAccount``` objects. And each object has its own account number and balance.

// img place

### Define a class:

To define a class, you specify the ```class``` keyword followed by a name like this:

```php
<?php

class ClassName
{
    //...
}
```
For example, the following defines a new class called ```BankAccount```:

```php
<?php

class BankAccount
{
}
```

By convention, you should follow these rules when defining a class:

- A class name should be in the upper camel case where each word is capitalized. For example, ```BankAccount```, ```Customer```, ```Transaction``` and ```DebitNote```.
- If a class name is a noun, it should be in the singular noun.
- Define each class in a separate PHP file.

From the ```BankAccount``` class, you can create a ```new``` bank account object by using the new keyword like this:

```php
<?php

class BankAccount
{
}

$account = new BankAccount();
```

In this syntax, the ```$account``` is a variable that references the object created by the ```BankAccount``` class. The parentheses that follow the ```BankAccount``` class name are optional. Therefore, you can create a new ```BankAccount``` object like this:

```php
$account = new BankAccount;
```

The process of creating a new object is also called instantiation. In other words, you instantiate an object from a class. Or you create a new object from a class.
The ```BankAccount``` class is empty because it doesn’t have any state and behavior.
### Add properties to a class:
To add properties to the ```BankAccount``` class, you place variables inside it. For example:

```php
<?php

class BankAccount
{
    public $accountNumber;
    public $balance;
}
```
The ```BankAccount``` class has two properties ```$accountNumber``` and ```$balance```. In front of each property, you see the public keyword.
The ```public``` keyword determines the visibility of a property. In this case, you can access the property from the outside of the class.
To access a property, you use the object operator (```->```) like this:

```php
<?php

$object->property;
```
The following example shows how to set the values of the ```accountNumber``` and ```balance``` properties:

```php
<?php

class BankAccount
{
    public $accountNumber;
    public $balance;
}

$account = new BankAccount();

$account->accountNumber = 1;
$account->balance = 100;
```

Besides the ```public``` keyword, PHP also has ```private``` and ```protected```.

### Add methods to a class:
The following shows the syntax for defining a method in a class:

```php
<?php

class ClassName
{
	public function methodName(parameter_list)
	{
		// implementation
	}
}
```

Like a property, a method also has one of the three visibility modifiers: ```public```, ```private```, and ```protected```. If you define a method without any visibility modifier, it defaults to public.

The following example defines the ```deposit()``` method for the ```BankAccount``` class:

```php
<?php

class BankAccount
{
	public $accountNumber;

	public $balance;

	public function deposit($amount)
	{
		if ($amount > 0) {
			$this->balance += $amount;
		}
	}
}
```

The ```deposit()``` method accepts an argument ```$amount```. It checks if the ```$amount``` is greater than zero before adding it to the balance.

To call a method, you also use the object operator (```->```) as follows:

```php
$object->method(arguments)
```

The new syntax in the ```deposit()``` method is the $this variable. The $this variable is the current object of the ```BankAccount``` class.

For example, when you create a new object $account and call the ```deposit()``` method, the ```$this``` inside the method is the ```$account``` object:

```php
$account = new BankAccount();

$account->accountNumber = 1;
$account->balance = 100;

$account->deposit(100);
```

Similarly, you can add the ```withdraw()``` method to the ```BankAccount``` class as follows:


```php
<?php

class BankAccount
{
	public $accountNumber;

	public $balance;

	public function deposit($amount)
	{
		if ($amount > 0) {
			$this->balance += $amount;
		}
	}

	public function withdraw($amount)
	{
		if ($amount <= $this->balance) {
			$this->balance -= $amount;
			return true;
		}
                return false;

	}
}
```

## PHP Inheritance
### Introduction to the PHP inheritance:

Inheritance allows a class to reuse the code from another class without duplicating it.

In inheritance, you have a **parent** class with properties and methods, and a **child** class can use the code from the parent class.
Inheritance allows you to write the code in the parent class and use it in both parent and child classes.

The parent class is also called a base class or super class. And the child class is also known as a derived class or a subclass.
To define a class inherits from another class, you use the extends keyword.

Suppose that you have a class called BankAccount as follows:


The ```BankAccount``` class has the private property $balance and the public methods ```getBalance()``` and ```deposit()```.

To declare that the ```SavingAccount``` inherits from the ```BankAccount```, you use the extends keyword as follows:

```php
<?php

class BankAccount
{
    private $balance;

    public function getBalance()
    {
        return $this->balance;
    }

    public function deposit($amount)
    {
        if ($amount > 0) {
            $this->balance += $amount;
        }

        return $this;
    }
}

class SavingAccount extends BankAccount
{
    private $interestRate;

    public function setInterestRate($interestRate)
    {
        $this->interestRate = $interestRate;
    }

    public function addInterest()
    {
        // calculate interest
        $interest = $this->interestRate * $this->getBalance();
        // deposit interest to the balance
        $this->deposit($interest);
    }
}

$account = new SavingAccount();
$account->deposit(100);
// set interest rate
$account->setInterestRate(0.05);
$account->addInterest();
echo $account->getBalance();

```

### Inhertiance and UML
You use the open arrow from the child class to the parent class to represent the inheritance relationship. The following UML diagram shows the inheritance relationship between the ```BankAccount``` and ```SavingAccount``` classes:

//img place class diagram

### Summary
- Inheritance allows a class to reuse the code of another class without duplicating it.
- Use the ```extends``` keyword to define one class that inherits from another class.
- A class that inherits another class is called a subclass, a child class, or a derived class. The class from which the subclass inherits is a parent class, a superclass, or a base class.
- A subclass can have its own properties and methods.
- Use ```$this``` keyword to call the methods of the parent class from methods in the child class.

### How to Call the Parent Constructor
#### Child class doesn’t have a constructor
The following adds a constructor to the ```BankAccount``` class, which accepts the ```$balance``` parameter. The constructor assigns the ```$balance``` argument to the ```$balance``` property:

```php
<?php

class BankAccount
{
	private $balance;

	public function __construct($balance)
	{
		$this->balance = $balance;
	}

	public function getBalance()
	{
		return $this->balance;
	}

	public function deposit($amount)
	{
		if ($amount > 0) {
			$this->balance += $amount;
		}

		return $this;
	}
}
```
The ```SavingAccount``` class remains the same and doesn’t include its own constructor:
```php
<?php 

class SavingAccount extends BankAccount
{
	private $interestRate;

	public function setInterestRate($interestRate)
	{
		$this->interestRate = $interestRate;
	}

	public function addInterest()
	{
		// calculate interest
		$interest = $this->interestRate * $this->getBalance();
		// deposit interest to the balance
		$this->deposit($interest);
	}
}
```

When you create a new instance of the ```SavingAccount```, PHP will call the constructor of the ```SavingAccount``` class. However, PHP cannot find the constructor in the ```SavingAccount``` class. Therefore, it continues to search for the constructor of the parent class of the ```SavingAccount``` class, which is the ```BankAccount``` class. And it invokes the constructor of the ```BankAccount``` class.

If you don’t pass an argument to the constructor of the ```SavingAccount``` class, you’ll get an error:
```php
$account = new SavingAccount();
```
##### Error:
```php
Fatal error: Uncaught ArgumentCountError: Too few arguments to function BankAccount::__construct(), 0 passed in ... on line 5 and exactly 1 expected in ...
```
But if you pass an argument to the constructor, it’ll work perfectly:

```php
$account = new SavingAccount(100);
```
### Define a constructor in the child class
A child class can have its own constructor. For example, you can add a constructor to the ```SavingAccount``` class as follows:

```php
<?php

class SavingAccount extends BankAccount
{
	private $interestRate;

	public function __construct($interestRate)
	{
		$this->interestRate = $interestRate;
	}

	public function setInterestRate($interestRate)
	{
		$this->interestRate = $interestRate;
	}

	public function addInterest()
	{
		// calculate interest
		$interest = $this->interestRate * $this->getBalance();
		// deposit interest to the balance
		$this->deposit($interest);
	}
}
```
The ```SavingAccount``` class has a constructor that initializes the ```interestRate``` property.

When a child class has its own constructor, the constructor in the child class will not call the constructor of its parent class automatically.

For example, the following creates a new instance of the ```SavingAccount``` class and initializes the ```$interestRate``` property to the value ```0.05```

```php
$account = new SavingAccount(0.05);
```
To call the constructor of the parent class from the constructor of the child class, you use the ```parent::__construct(arguments)``` syntax.

The following changes the constructor of the ```SavingAccount``` class that accepts two arguments: balance & interest rate. It also calls the constructor of the ```BankAccount``` class to initialize the ```$balance``` property:

```php

<?php

class SavingAccount extends BankAccount
{
	private $interestRate;

	public function __construct($balance, $interestRate)
	{
		parent::__construct($balance);

		$this->interestRate = $interestRate;
	}

	public function setInterestRate($interestRate)
	{
		$this->interestRate = $interestRate;
	}

	public function addInterest()
	{
		// calculate interest
		$interest = $this->interestRate * $this->getBalance();
		// deposit interest to the balance
		$this->deposit($interest);
	}
}
```
The syntax for calling the parent constructor is the same as a regular method.

Put it all together:

```php
<?php

class BankAccount
{
	private $balance;

	public function __construct($balance)
	{
		$this->balance = $balance;
	}

	public function getBalance()
	{
		return $this->balance;
	}

	public function deposit($amount)
	{
		if ($amount > 0) {
			$this->balance += $amount;
		}

		return $this;
	}
}

class SavingAccount extends BankAccount
{
	private $interestRate;

	public function __construct($balance, $interestRate)
	{
		parent::__construct($balance);
		$this->interestRate = $interestRate;
	}

	public function setInterestRate($interestRate)
	{
		$this->interestRate = $interestRate;
	}

	public function addInterest()
	{
		$interest = $this->interestRate * $this->getBalance();
		$this->deposit($interest);
	}
}

$account = new SavingAccount(100, 0.05);
$account->addInterest();
echo $account->getBalance();
```

The following class diagram illustrates inheritance between the ```SavingAccount``` and ```BankAccount``` classes:

//img 

### Summary
- The constructor of the child class doesn’t automatically call the constructor of its parent class.
- Use ```parent::__construct(arguments)``` to call the parent constructor from the constructor in the child class.

## PHP Method Overriding
### Introduction
Method overriding in PHP allows a child class to redefine a method that is already provided by its parent class. This documentation provides a comprehensive overview of method overriding in PHP, including its syntax, usage, and best practices.
### Syntax
To override a method in a child class, use the same method signature (name, parameters, and return type) as the method in the parent class. When an object of the parent class invokes the method, PHP executes the overridden method, while an object of the child class invokes the method, PHP executes the overriding method.
### Example
```php
<?php

class Robot {
    public function greet() {
        return 'Hello!';
    }
}

class Android extends Robot {
    public function greet() {
        return 'Hi';
    }
}

$robot = new Robot();
echo $robot->greet(); // Output: Hello

$android = new Android();
echo $android->greet(); // Output: Hi

```
In this example, the ```greet()``` method is overridden in the ```Android``` class to return a different greeting message than the ```Robot``` class.

### Calling the Overridden Method
To call the overridden method within the overriding method, use the ```parent::``` keyword followed by the method name. This allows access to the overridden method's functionality within the overriding method.
```php
<?php

class Android extends Robot {
    public function greet() {
        $greeting = parent::greet();
        return $greeting . ' from Android.';
    }
}

```
In this example, the ```greet()``` method in the Android class calls the ```greet()``` method of the Robot class and appends additional text to the returned greeting.
### Preventing Method Overriding
To prevent a method in the child class from overriding a method in the parent class, use the ```final``` keyword when defining the method in the parent class.
```php
<?php
class Robot {
    final public function id() {
        return uniqid();
    }
}
```
If an attempt is made to override a ```final``` method in the child class, an error will be thrown.
### Conclusion
Method overriding in PHP provides flexibility in defining specific behaviors for methods in child classes while maintaining a clear inheritance structure. By following the syntax and best practices outlined in this documentation, developers can effectively utilize method overriding to create well-structured and maintainable PHP code.

## PHP Protected Access Modifier
### Introduction
This documentation provides a comprehensive overview of the PHP protected access modifier, which allows properties and methods to be accessed within the class and any child classes that extend the class. You will learn about the syntax, usage, and examples of using the protected access modifier in PHP.
### Syntax
In PHP, you can define a ```protected``` property using the protected keyword followed by the property name. Similarly, a protected method is defined using the ```protected``` keyword before the method name.
```php
<?php
class MyClass {
    protected $propertyName;

    protected function methodName() {
        // ...
    }
}
```
### Example: PHP Protected Property
In the following example, the Customer class has a protected property ```$name```, and the ```VIP``` class extends the ```Customer``` class to access the protected property.
```php
<?php
class Customer {
    protected $name;

    public function __construct($name) {
        $this->name = $name;
    }
}

class VIP extends Customer {
    public function getFormattedName() {
        return ucwords($this->name);
    }
}

$alex = new VIP('alex ferguson');
echo $alex->getFormattedName(); // Output: Alex Ferguson
```
### Example: PHP Protected Method
In this example, the ```Customer``` class has a protected property ```$name``` and a protected method ```format()```. The ```VIP``` class extends the ```Customer``` class and overrides the ```format()``` method.

```php
<?php
class Customer {
    protected $name;

    public function __construct($name) {
        $this->name = $name;
    }

    protected function format() {
        return ucwords($this->name);
    }

    public function getName() {
        return $this->format($this->name);
    }
}

class VIP extends Customer {
    protected function format() {
        return strtoupper($this->name);
    }
}

$bob = new Customer('bob allen');
echo $bob->getName(); // Output: Bob Allen

$alex = new VIP('alex ferguson');
echo $alex->getName(); // Output: ALEX FERGUSON
```
In this example, the getName() method calls the format() method of the Customer class for the bob instance and the VIP class for the alex instance, demonstrating the usage of protected methods in inheritance.
### Summary
The PHP protected access modifier allows properties and methods to be accessed within the class and any child classes of the class. It provides a way to encapsulate data and behavior within a class hierarchy while allowing child classes to access and modify the protected members.
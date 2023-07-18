<?php

//namespace RefactoringGuru\FactoryMethod\Conceptual;

/**
 * The Creator class declares the factory method that is supposed to return an
 * object of a Product class. The Creator's subclasses usually provide the
 * implementation of this method.
 */

abstract class Creator
{
	/**
	 * the Creator may also provide some default implementation of the factory method.
	**/
	abstract public function factoryMethod(): Product;

	public function someOperation(): string
	{
		// call the factory method to creat a Product object
		$product = $this->factoryMethod();

		//using the product
		$result = "Creator: The same creator's code has just worked with " . 
			$product->operation();

		return $result;
	}
}


/**
 * Concrete Creators override the factory method in order to change the
 * resulting product's type.
 **/

class ConcreteCreator1 extends Creator
{
	public function factoryMethod(): Product
	{
		return new ConcreteProduct1();
	}
}

class ConcreteCreator2 extends Creator
{
	public function factoryMethod(): Product
	{
		return new ConcreteProduct2();
	}
}

/**
 * The Product interface declares the operations that all concrete products must implement.
 */
interface Product
{
	public function operation(): string;
}

class ConcreteProduct1 implements Product
{	
	public function operation(): string
	{
		return '{Result of the ConcreteProduct1}';
	}
}

class ConcreteProduct2 implements Product
{
	public function operation(): string
	{
		return '{Result of the ConcreteProduct2}';
	}
}



function clientCode(Creator $creator)
{
    // ...
    echo "Client: I'm not aware of the creator's class, but it still works.\n"
        . $creator->someOperation();
    // ...
}

/**
 * The Application picks a creator's type depending on the configuration or
 * environment.
 */
echo "App: Launched with the ConcreteCreator1.\n";
clientCode(new ConcreteCreator1());
echo "\n\n";

echo "App: Launched with the ConcreteCreator2.\n";
clientCode(new ConcreteCreator2());

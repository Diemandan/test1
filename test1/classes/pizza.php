<?php

namespace classes;
abstract class Pizza{
    protected $pizza;
    protected $sous;
    protected $diametr;

    public function __construct()
    {   $host='localhost';
        $user='root';
        $password='root';
        $database='bd_pizza';
        $this->link = mysqli_connect($host, $user, $password, $database);
			mysqli_query($this->link, "SET NAMES 'utf8'");
    }

    public function get($pizza_id, $sous_id, $diametr_id)
		{
			$query = "SELECT * FROM pizza WHERE id=$pizza_id"; 
			$result = mysqli_query($this->link,$query) or	die(mysqli_error($this->link)); //чтобы вывести ошибки sql команд добавлять всегда в код
			$n=mysqli_fetch_assoc($result);
			$this->pizza=$n;

            $query = "SELECT * FROM sousy WHERE id=$sous_id"; 
			$result = mysqli_query($this->link,$query) or	die(mysqli_error($this->link)); //чтобы вывести ошибки sql команд добавлять всегда в код
			$n=mysqli_fetch_assoc($result);
			$this->sous=$n;
            
            $query = "SELECT * FROM diametr WHERE id=$diametr_id"; 
			$result = mysqli_query($this->link,$query) or	die(mysqli_error($this->link)); //чтобы вывести ошибки sql команд добавлять всегда в код
			$n=mysqli_fetch_assoc($result);
			$this->diametr=$n;
			
            return $this;
		}
        
        
}
?>
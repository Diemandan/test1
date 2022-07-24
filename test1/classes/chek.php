<?php
namespace classes ;

class Chek extends Pizza {
    public function __construct()
    {
        parent::__construct();
    }
public function res(){
    $p=$this->pizza['name'];
    $d=$this->diametr['diametr'];
    $s=$this->sous['sous'];
    
    echo "<p><b><span style=\"color: rgb(141, 10, 153)\">Ваш заказ:</span></b><br> пицца:<i> $p </i><br> диаметр:<i> $d </i><br> соус:<i> $s </i></p>";
    echo '<hr><p>Стоимость Вашего заказа составляет:<br><span style="color: rgb(143, 64, 0)"><b>'
     . $this->getprice() . '$ или' .$this->getcourse() . ' BYN</b></span></p><hr>';
echo '<br> <a href="http://test1/start.php">Заказать ещё</a>'; 
}
private function getprice(){
   $res= $this->pizza['start_price']+$this->sous['price']+$this->diametr['price_dop'];
   return $res;
}
private function getcourse(){
    $xml = @file_get_contents("https://belarusbank.by/api/kursExchange?city=Брест");
$r=str_replace('"','',$xml);
$reg_pokupka='#USD_in:\d.\d{2,}#';
$reg_prodaja='#USD_out:\d.\d{2,}#';
preg_match($reg_pokupka, $r, $res_pokupka);
preg_match($reg_prodaja, $r, $res_prodaja);
$pok=substr($res_pokupka[0],7);
$prod=substr($res_prodaja[0],8);
 
echo '<b>Курсы на сегодня: </b>';
echo "Покупка<b><span style=\"color: rgb(143, 64, 0)\"> $pok </b></span>";
echo " Продажа<b><span style=\"color: rgb(143, 64, 0)\"> $prod </b></span>";

return $pok*$this->getprice();
}
}


?>

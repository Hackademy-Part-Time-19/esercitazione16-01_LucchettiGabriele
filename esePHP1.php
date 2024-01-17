<?php

//Inizializzo la classe company
class Company
{

//definisco gli attributi
    public $name;
    public $location;

    public $totEmployees = 0;

//definisco gli attributi statici
    static public $totAziende=0;

    static public $totEmployeesAbsolute=0;

    static public $avg_wage=1500;

    static public $annualAvg_wage=0;

//definisco il costruttore
    public function __construct($_name, $_location, $_totEmployees)
    {
        $this->name = $_name;
        $this->location = $_location;
        $this->totEmployees = $_totEmployees;

        self::$totAziende++;

        self::$totEmployeesAbsolute+=$_totEmployees;
    }

//creo un metodo che stampi nel terminale se l'azienda ha dipendenti o meno e la quantita'
    public function printTerminal()
    {
        

        if ($this->totEmployees > 0) {
            echo "L'azienda " . $this->name . " con sede in " . $this->location . " ha " . $this->totEmployees . " dipendenti.\n";
        } else {
            echo "L'azienda " . $this->name . " con sede in " . $this->location . " non ha nessun dipendente.\n";
        }

        
    }

//creo un metodo che stampi il totale dei dipendenti di tutte le aziende
    public function stampaDipendenti(){
        echo "In totale abbiamo assunto". self::$totEmployeesAbsolute." dipendenti\n";
    }


//creo un metodo che stampi e aggiorni il totale della spesa annuale
    public function spesaAnnuale(){
        $annualAvg_wage=(self::$avg_wage*$this->totEmployees)*12;
        echo "La spesa annuale di ". $this->name.  " è di ".$annualAvg_wage."\n";

        self::$annualAvg_wage+=$annualAvg_wage;
    }


//creo un metodo che stampi in terminale il totale delle aziende create + il totale dipendenti+ il totale della spesa annuale
    public static function printTotal(){
        echo "In totale abbiamo ". self::$totAziende." aziende\n In totale abbiamo ". self::$totEmployeesAbsolute." dipendenti\n La spesa annuale totale è di ".self::$annualAvg_wage;
    }


}

//inizializzo le aziende
$azienda1= new Company("Amazon","Italia","10000");

$azienda2= new Company("OCM","Italia","200");

$azienda3= new Company("Ikea","Svezia","5000");

$azienda4= new Company("Ufficio2000","Italia","30");

$azienda5= new Company("Il Laboratorio Agricolo","Italia","10");


//Creo un array per semplificare l'operazione di stampa nel terminale
$aziende=[$azienda1,$azienda2,$azienda3,$azienda4,$azienda5];

//ciclo l'array in un FOREACH
foreach($aziende as $azienda){
    $azienda->printTerminal();
    $azienda->spesaAnnuale();
}

Company::printTotal();
    



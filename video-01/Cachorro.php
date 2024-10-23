<?php

class Cachorro{
    //atributos ou propriedades da classe
    public string $nome;
    public string $raca;
    public int $idade;
    public float $peso;
    public string $cor;

    public function __construct(string $nome, string $raca, int $idade, float $peso, string $cor){
        echo "Objeto criado";
        $this->nome = $nome;
        $this->raca = $raca;
        $this->idade = $idade;
        $this->peso = $peso;
        $this->cor = $cor;
    }

    public function latir(){
        echo "Au au au";
    }

    public function andar(){
        echo "Cachorro andando";
    }

    public function comer(){
        echo "Cachorro comendo";
    }
}

$cao1 = new Cachorro('Rex', 'Pastor Alemão', 5, 30, 'Preto');
$cao2 = new Cachorro('Toby', 'Poodle', 3, 10, 'Branco');

echo "Nome: $cao1->nome <br>";
echo "Nome: $cao2->nome <br>";
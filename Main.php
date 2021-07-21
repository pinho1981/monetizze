<?php
namespace Monetizze;

class Main{
    // Dezenas
    private $dozens;

    // Saída do resultado
    private $output;

    // Todos de jogos
    private $total;

    // Os jogos formados
    private $games;


    /**
     * @param int $amountDonzes quantidade de dezenas
     * @param int $totalGames total de jogos formados
     * @return object Instância da classe Main
     * @author Carlos André Barbosa
     */ 
    function __construct($amountDonzes, $totalGames) {
        if(!($amountDonzes >= 6 && $amountDonzes <= 10)) {
            $amountDonzes = 6;
        }

        $this->setDonzes($amountDonzes);
        $this->setTotal($totalGames);
    }

    /**
     * Gerador de dezenas 
     * Capaz de gerar as dezenas conforme o número que as quantidade das dezenas, porém, não pode se repetir os números de 1 à 60
     * @return array 
     * @author Carlos André Barbosa
     */ 
    private function createDonzes() {
        $setData = array();
        
        for($i=0; $i < $this->getDezenas(); $i++) {
            $number = rand(1,60);

            while(in_array($number, $setData)) {
                $number = rand(1, 60); // Aleatórios da faixa de 1..60
            }
            $setData[$i] = $number;
        }
        sort($setData, SORT_NUMERIC); // Ordenação
        
        return $setData;
    }

    /**
     * Método para geração dos jogos 
     * Gera um array multidimensional por posição do jogo
     * @return void 
     * @author Carlos André Barbosa
     */ 
    public function createGames() {
        $setData = [];

        for($i=0; $i < $this->getTotal(); $i++) {
            $setData[$i] = $this->createDonzes();
        }

        $this->setGames($setData);
    }

    /**
     * Sorteio 
     * Gera o sorteio das 6 dezenas
     * @param int $amount quantidade das dezenas
     * @return void 
     * @author Carlos André Barbosa
     */ 
    private function raffle($amount = 6) {
        $setData = [];
        
        for($i=0; $ < $amount; $i++) {
            $number = rand(1,60);
            while(in_array($number, $setData) {
                $number = rand(1,60);
            }
            $setData[$i] = $number;
        }
        sort($setData, SORT_NUMERIC);
        
        $this->setOutput($setData);
    }

    /**
     * Confere Jogos 
     * Confere os games com o resultado
     * @return array com os números acertados
     * @author Carlos André Barbosa
     */ 
    public function checkGames() {
        $setData = [];

        for($i=0; $i < count($this->games); $i++) {
            foreach($this->output as $key => $value) {
                if(in_array($value, $this->games[$i])) {
                    $setData[$i][array_search($value, $this->games[$i])] = $value;
                }             
            }
        }

        return $setData;       
    }

    /**
     * Gerador de sorteio
     * Faz a chamada dos métodos para imprimir em tela
     * @return array  
     * @author Carlos André Barbosa
     */ 
    public function makeRaffle() {
        $this->createGames();
        $this->raffle();

        return $this->checkGames();
    }

    /**
     * Marcação do número
     * Marca o número sorteado no jogo
     * @param int $value número sorteado
     * @param int $key chave do array do jogo
     * @param int $game array de check do jogo
     * @return bool  
     * @author Carlos André Barbosa
     */ 
    public function NumberAlert($value, $key, $game) {
        if(key_exists($key, $game)) {
            if(array_search($value, $game[$key])) {
                return true;
            }         
        }

        return false;
    }

    
    /**
     * Pega os valores das dezenas
     */ 
    public function getDonzes() {
        return $this->dozens;
    }

    /**
     * Atribui os valores das dezenas
     *
     * @return self
     */ 
    public function setDonzes($dozens) {
        $this->dozens = $dozens;

        return $this;
    }

    /**
     * Pega os valores para imprimir resultado
     */ 
    public function getOutput() {
        return $this->output;
    }

    /**
     * Atribui os valores para imprimir resultado     
     *
     * @return  self
     */ 
    public function setOutput($output) {
        $this->output = $output;

        return $this;
    }

    /**
     * Pega os valores para mostrar o total
     */ 
    public function getTotal(){
        return $this->total;
    }

    /**
     * Atribui os valores para o toral
     *
     * @return  self
     */ 
    public function setTotal($total){
        $this->total = $total;

        return $this;
    }

    /**
     * Pega os valores dos jogos
     */ 
    public function getGames(){
        return $this->games;
    }

    /**
     * Atribui os valores para os jogos
     *
     * @return  self
     */ 
    public function setGames($games){
        $this->games = $games;

        return $this;
    }
}
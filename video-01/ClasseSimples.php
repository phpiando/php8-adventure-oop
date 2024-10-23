<?php
class ProdutoClasse {
    private string $nome;
    private float $preco;
    private float $quantidade;

    public function __construct(string $nome,float $preco, float $quantidade) {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->quantidade = $quantidade;
    }

    public function atualizarEstoque(float $novaQuantidade): void {
        $this->quantidade = $novaQuantidade;
    }

    public function exibirProduto(): void {
        echo "Nome: " . $this->nome . "\n";
        echo "Preço: R$ " . number_format($this->preco, 2, ',', '.') . "\n";
        echo "Quantidade em estoque: " . $this->quantidade . "\n";
    }
}

// Uso da classe
$produto1 = new ProdutoClasse(
    nome: 'Caneta',
    preco: 1.50,
    quantidade: 100
);
$produto1->exibirProduto();

$produto1->atualizarEstoque(novaQuantidade: 150);
echo "\nApós atualizar o estoque:\n";
$produto1->exibirProduto();

<?php
use Produto;
use Database;

class ProdutoController
{
    private Produto $produto;

    public function __construct()
    {
        $db = new Database();
        $conn = $db->getConnection();
        $this->produto = new Produto($conn);
    }

    public function adicionarProduto(): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->produto->setNome($_POST['nome']);
            $this->produto->setPreco((float)$_POST['preco']);
            $this->produto->setQuantidade((int)$_POST['quantidade']);

            if ($this->produto->salvar()) {
                $mensagem = "Produto adicionado com sucesso";
                include '../views/mensagem.php';
            } else {
                $mensagem = "Erro ao adicionar produto.";
                include '../views/mensagem.php';
            }
        } else {
            include '../views/form_adicionar_produto.php';
        }
    }

    public function listarProdutos(): void
    {
        $produtos = $this->produto->listar();
        include '../views/lista_produtos.php';
    }
}

<?php
class Produto
{
    private string $nome;
    private float $preco;
    private int $quantidade;
    private \mysqli $conn;

    public function __construct(\mysqli $conn)
    {
        $this->conn = $conn;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function setPreco(float $preco): void
    {
        $this->preco = $preco;
    }

    public function setQuantidade(int $quantidade): void
    {
        $this->quantidade = $quantidade;
    }

    public function salvar(): bool
    {
        $stmt = $this->conn->prepare("INSERT INTO produtos (nome, preco, quantidade) VALUES (?, ?, ?)");
        $stmt->bind_param("sdi", $this->nome, $this->preco, $this->quantidade);
        return $stmt->execute();
    }

    public static function listar(\mysqli $conn): array
    {
        $produtos = [];
        $sql = "SELECT * FROM produtos";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $produtos[] = $row;
        }

        return $produtos;
    }
}

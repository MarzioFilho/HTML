<?php
	class Conexao
	{
		//atributos da classe, onde irá receber os valores da UI e tranalhar com o processamento aqui
		public $servidor;
		public $usuario;
		public $senha;
		public $NomeBanco;					
		public $conexao;
		public $status;
		//A função construct faz com o que estiver para ser processado nela, seja realizado antes do método ser chamado na UI, alocando os dados na memória
		public function __construct()
		{
			$this->Conectar();
		}
		//Função de conexão, para poupar código, sem ter a necessidade de escrever o código conexão toda vez que trabalhar com os dados
		public function Conectar()
		{
			//Aqui ele está atribuindo variáveis com os dados da conexão, dessa forma é possível alterar o banco de dados através da UI, facilitando o uso do administrador ao sistema
			$this->servidor = "localhost";
			$this->usuario = "root";
			$this->senha = "";
			$this->NomeBanco = "sabor_e_arte";
			$this->conexao = mysqli_connect($this->servidor, $this->usuario, $this->senha, $this->NomeBanco);
			//Verifica se a variável conexão retornou true para o processamento
			if(!$this->conexao)
			{
				$this->status = false;
			}
			else
			{
				$this->status = true;
			}
		}
		//Função criada para especificar e informar se a conexão está com problemas
		public function StatusConexao()
		{
			return $this->status;
		}
	}
?>
<?php	
	class Cardapio
	{	
		public $id;
		public $numero;
		public $nome;		
		public $preco;
		public $DataTableP;
		
		public function __construct($i="", $nu="", $no="", $p="")
		{
			include("classe_conexao.php");
			$this->id 		= $i;
			$this->numero 	= $nu;
			$this->nome 	= $no;
			$this->preco 	= $p;
		}
		
		public function Inserir()
		{	
			$objConexao = new Conexao();
			$sql = 
			"insert into cardapio values
			(
				null,
				'".$this->numero."',
				'".$this->nome."',
				".$this->preco."
			)";
			
			if ($objConexao->conexao->query($sql) === TRUE) 
			{
				echo "Record inserted successfully";
				$objConexao->conexao->close();
			}
			else 
			{
				echo "Error inserting record: " . $objConexao->conexao->error;
				$objConexao->conexao->close();
			}
		}
		
		public function Pesquisar()
		{
			$objConexao = new Conexao();
			
			$sql = "select * from cardapio where id = ".$this->id;
			
			$ExecuteSQL = $objConexao->conexao->query($sql);
			
			$DataTableP = mysqli_fetch_assoc($ExecuteSQL);
			
			$this->id 		= $DataTableP["id"];
			$this->numero 	= $DataTableP["numero"];
			$this->nome 	= $DataTableP["nome"];
			$this->preco 	= $DataTableP["preco"];
		}
		
		public function Alterar()
		{
			$objConexao = new Conexao();
			
			$sql = 
				"update cardapio set
					numero='".$this->numero."',
					nome='".$this->nome."',
					preco='".$this->preco."'
				where 
					id =".$this->id;
					
			if ($objConexao->conexao->query($sql) === TRUE) 
			{
				echo "Record inserted successfully";
				$objConexao->conexao->close();
			}
			else 
			{
				echo "Error inserting record: " . $objConexao->conexao->error;
				$objConexao->conexao->close();
			}
		}
		
		public function Deletar()
		{
			$objConexao = new Conexao();
			
			$sql = 
			"
				delete from cardapio where id =	".$this->id;
			
			if ($objConexao->conexao->query($sql) === TRUE) 
			{
				echo "Record deleted successfully";
				$objConexao->conexao->close();
			}
			else 
			{
				echo "Error deleting record: " . $objConexao->conexao->error;
				$objConexao->conexao->close();
			}
		}
	}
?>
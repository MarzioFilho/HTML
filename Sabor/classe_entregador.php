<?php	
	class Entregador
	{	
		public $id;
		public $cpf;
		public $nome;
		public $meio_transporte;
		public $DataTableP;
		
		public function __construct($i="", $c="", $n="", $m="")
		{
			include("classe_conexao.php");
			$this->id 				= $i;
			$this->cpf 				= $c;
			$this->nome 			= $n;
			$this->meio_transporte 	= $m;
		}
		
		public function Inserir()
		{	
			$objConexao = new Conexao();
			$sql = 
			"insert into entregador values
			(
				null,
				'".$this->cpf."',
				'".$this->nome."',
				".$this->meio_transporte."
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
			
			$sql = "select * from entregador where cpf = ".$this->cpf;
			
			$ExecuteSQL = $objConexao->conexao->query($sql);
			
			$DataTableP = mysqli_fetch_assoc($ExecuteSQL);
			
			$this->id 				= $DataTableP["id"];
			$this->cpf 				= $DataTableP["cpf"];
			$this->nome 			= $DataTableP["nome"];
			$this->meio_transporte 	= $DataTableP["meio_transporte"];
		}
		
		public function Alterar()
		{
			$objConexao = new Conexao();
			
			$sql = 
				"update entregador set
					nome='".$this->nome."',
					meio_transporte='".$this->meio_transporte."'
				where 
					cpf =".$this->cpf
			;		
			if ($objConexao->conexao->query($sql) === TRUE) 
			{
				echo "Record updated successfully";
				$objConexao->conexao->close();
			}
			else 
			{
				echo "Error updated record: " . $objConexao->conexao->error;
				$objConexao->conexao->close();
			}
		}
		
		public function Deletar()
		{
			$objConexao = new Conexao();
			
			$sql = 
			"
				delete from entregador where cpf =	".$this->cpf;
			
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
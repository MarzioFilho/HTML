<?php	
	class Ingredientes
	{	
		public $id;
		public $nome;
		public $tipo_ingrediente;		
		public $DataTableP;
		
		public function __construct($i="", $n="", $t="")
		{
			include("classe_conexao.php");
			$this->id 				= $i;
			$this->nome 			= $n;
			$this->tipo_ingrediente = $t;
		}
		
		public function Inserir()
		{	
			$objConexao = new Conexao();
			$sql = 
			"insert into ingredientes values
			(
				null,
				'".$this->nome."',
				'".$this->tipo_ingrediente."'
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
			
			$sql = "select * from ingredientes where id = ".$this->id;
			
			$ExecuteSQL = $objConexao->conexao->query($sql);
			
			$DataTableP = mysqli_fetch_assoc($ExecuteSQL);
			
			$this->id 				= $DataTableP["id"];
			$this->nome 			= $DataTableP["nome"];
			$this->tipo_ingrediente = $DataTableP["tipo_ingrediente"];
		}
		
		public function Alterar()
		{
			$objConexao = new Conexao();
			
			$sql = 
				"update ingredientes set
					nome='".$this->nome."',
					tipo_ingrediente='".$this->tipo_ingrediente."'
				where 
					id =".$this->id;
					
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
				delete from ingredientes where id =	".$this->id;
			
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
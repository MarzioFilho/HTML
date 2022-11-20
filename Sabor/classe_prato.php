<?php	
	class Prato
	{	
		public $id;
		public $peso;
		public $alergicos;		
		public $ingredientes_id;
		public $cardapio_id;
		public $DataTableP;
		
		public function __construct($i="", $p="", $a="", $i="", $c="", $d="")
		{
			include("classe_conexao.php");
			$this->id 				= $i;
			$this->peso 			= $n;
			$this->alergicos 		= $e;
			$this->ingredientes_id 	= $c;
			$this->cardapio_id 		= $d;
		}
		
		public function Inserir()
		{	
			$objConexao = new Conexao();
			$sql = 
			"insert into prato values
			(
				null,
				'".$this->peso."',
				'".$this->alergicos."',
				".$this->ingredientes_id.",
				".$this->cardapio_id."
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
			
			$sql = "select * from prato where id = ".$this->id;
			
			$ExecuteSQL = $objConexao->conexao->query($sql);
			
			$DataTableP = mysqli_fetch_assoc($ExecuteSQL);
			
			$this->id 				= $DataTableP["id"];
			$this->peso 			= $DataTableP["peso"];
			$this->alergicos 		= $DataTableP["alergicos"];
			$this->ingredientes_id	= $DataTableP["ingredientes_id"];
			$this->cardapio_id		= $DataTableP["cardapio_id"];
		}
		
		public function Alterar()
		{
			$objConexao = new Conexao();
			
			$sql = 
				"update prato set
					peso='".$this->peso."',
					alergicos='".$this->alergicos."'
				where 
					id =".$this->id;
					
			if ($objConexao->conexao->query($sql) === TRUE) 
			{
				echo "Record uptaded successfully";
				$objConexao->conexao->close();
			}
			else 
			{
				echo "Error uptading record: " . $objConexao->conexao->error;
				$objConexao->conexao->close();
			}
		}
		
		public function Deletar()
		{
			$objConexao = new Conexao();
			
			$sql = 
			"
				delete from prato where id =	".$this->id;
			
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
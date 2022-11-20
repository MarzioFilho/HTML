<?php	
	class Compra
	{	
		public $id;
		public $data;
		public $hora;		
		public $valor_uni;
		public $quantidade;
		public $cardapio_id;
		public $pedido_id;
		public $DataTableP;
		
		public function __construct($i="", $d="", $h="", $v="", $q="", $c="", $p="")
		{
			include("classe_conexao.php");
			$this->id 			= $i;
			$this->data 		= $d;
			$this->hora 		= $h;
			$this->valor_uni 	= $v;
			$this->quantidade 	= $q;
			$this->cardapio_id 	= $c;
			$this->pedido_id 	= $p;
		}
		
		public function Inserir()
		{	
			$objConexao = new Conexao();
			$sql = 
			"insert into compra values
			(
				null,
				'".$this->data."',
				'".$this->valor_uni."',
				".$this->quantidade.",
				".$this->cardapio_id.",
				'".$this->pedido."'
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
			
			$sql = "select * from compra where id = ".$this->id;
			
			$ExecuteSQL = $objConexao->conexao->query($sql);
			
			$DataTableP = mysqli_fetch_assoc($ExecuteSQL);
			
			$this->id 			= $DataTableP["id"];
			$this->data 		= $DataTableP["data"];
			$this->hora 		= $DataTableP["hora"];
			$this->valor_uni 	= $DataTableP["valor_uni"];
			$this->quantidade	= $DataTableP["quantidade"];
			$this->cardapio_id 	= $DataTableP["cardapio_id"];
			$this->pedido_id 	= $DataTableP["pedido_id"];
		}
		
		public function Deletar()
		{
			$objConexao = new Conexao();
			
			$sql = 
			"
				delete from compra where id =	".$this->id;
			
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
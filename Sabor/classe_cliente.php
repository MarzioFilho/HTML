<?php	
	class Cliente
	{	
		public $id;
		public $nome;
		public $email;		
		public $cpf;
		public $dt_nasc;
		public $telefone;
		public $senha;
		public $cpfLogin;
		public $DataTableP;
		
		public function __construct($i="", $n="", $e="", $c="", $d="", $t="", $s="", $cpfLg="")
		{
			include("classe_conexao.php");
			$this->id 		= $i;
			$this->nome 	= $n;
			$this->email 	= $e;
			$this->cpf 		= $c;
			$this->dt_nasc 	= $d;
			$this->telefone = $t;
			$this->senha 	= $s;
			$this->cpfLogin = $cpfLg;
		}
		
		public function Inserir()
		{	
			$objConexao = new Conexao();
			$sql = 
			"insert into cliente values
			(
				null,
				'".$this->nome."',
				'".$this->email."',
				".$this->cpf.",
				'".$this->dt_nasc."',
				'".$this->telefone."',
				'".md5($this->senha)."'
			)";
			
			if ($objConexao->conexao->query($sql) === TRUE) 
			{
				echo "Record inserted successfully";
				$objConexao->conexao->close();
				return true;
			}
			else 
			{
				echo "Error inserting record: " . $objConexao->conexao->error;
				$objConexao->conexao->close();
				
				$filename = date('YmdHis').".txt";
				if (!file_exists($filename)) 
				{
					$fh = fopen($filename, 'w') or die("Não foi possível criar o arquivo");
				}

				$ret = file_put_contents($filename, $sql, FILE_APPEND | LOCK_EX);
				return false;
			}
		}
		
		public function Pesquisar()
		{
			$objConexao = new Conexao();
			
			$sql = "select * from cliente where cpf = ".$this->cpf;
			
			$ExecuteSQL = $objConexao->conexao->query($sql);
			
			$DataTableP = mysqli_fetch_assoc($ExecuteSQL);
			
			$this->id 		= $DataTableP["id"];
			$this->nome 	= $DataTableP["nome"];
			$this->email 	= $DataTableP["email"];
			$this->cpf 		= $DataTableP["cpf"];
			$this->dt_nasc	= $DataTableP["dt_nasc"];
			$this->telefone = $DataTableP["telefone"];
			$this->senha 	= $DataTableP["senha"];
		}
		
		public function ValidarSenha($c)
		{
			$objConexao  = new Conexao();
			$sql 		 = "select senha from cliente where cpf = ".$c;
			$ExecuteSQL  = $objConexao->conexao->query($sql);
			$DataTableP  = mysqli_fetch_assoc($ExecuteSQL);
			$this->senha = $DataTableP["senha"];
		}
		
		public function Alterar()
		{
			$objConexao = new Conexao();
			
			$sql = 
				"update cliente set
					nome='".$this->nome."',
					email='".$this->email."',
					telefone='".$this->telefone."',
					senha='".md5($this->senha)."' 
				where 
					cpf =".$this->cpf;
					
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
				delete from cliente where cpf =	".$this->cpf;
			
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
		
		public function Login($cpfL)
		{
			$objConexao = new Conexao();
			
			$sql = "select cpf from cliente where cpf = ".$cpfL;
			$ExecuteSQL = $objConexao->conexao->query($sql);
			$DataTableP = mysqli_fetch_assoc($ExecuteSQL);
			$this->cpfLogin = $DataTableP["cpf"];
			$objConexao->conexao->close();
		}
	}
?>
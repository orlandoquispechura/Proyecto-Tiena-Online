<?php

class Usuario
{

	private $id;
	private $nombre;
	private $apellidos;
	private $email;
	private $contrasena;
	private $rol;
	private $imagen;
	private $db;

	public function __construct()
	{
		$this->db = Database::Conexion();
	}

	function getId()
	{
		return $this->id;
	}

	function setId($id)
	{
		$this->id = $id;
	}

	function getNombre()
	{
		return $this->nombre;
	}

	function setNombre($nombre)
	{
		$this->nombre = $this->db->real_escape_string($nombre);
	}

	function getApellidos()
	{
		return $this->apellidos;
	}

	function setApellidos($apellidos)
	{
		$this->apellidos = $this->db->real_escape_string($apellidos);
	}

	function getEmail()
	{
		return $this->email;
	}

	function setEmail($email)
	{
		$this->email = $this->db->real_escape_string($email);
	}

	function getContrasena()
	{
		return password_hash($this->db->real_escape_string($this->contrasena), PASSWORD_BCRYPT, ['const' => 4]);
	}

	function setContrasena($contrasena)
	{
		$this->contrasena = $contrasena;
	}

	function getRol()
	{
		return $this->rol;
	}

	function setRol($rol)
	{
		$this->rol = $rol;
	}

	function getImagen()
	{
		return $this->imagen;
	}

	function setImagen($imagen)
	{
		$this->imagen = $imagen;
	}

	public function save()
	{

		$sql = "INSERT INTO usuarios VALUES(NULL, '{$this->getNombre()}', '{$this->getApellidos()}', '{$this->getEmail()}', '{$this->getContrasena()}','user', 'null');";
		$save = $this->db->query($sql);
		$resultado = false;

		if ($save) {
			$resultado = true;
		}
		return $resultado;
	}
	public function login()
	{

		$resultado = false;
		$email = $this->email;
		$contrasena = $this->contrasena;

		// comprobar si existe el usuario 
		$sql = "SELECT * FROM usuarios WHERE email= '$email'";

		$login	= $this->db->query($sql);

		if ($login && $login->num_rows == 1) {
			$usuario = $login->fetch_object();
			// verificar la contraseña 
			$verificar = password_verify($contrasena, $usuario->contrasena);

			if ($verificar) {
				$resultado = $usuario;
			}
		}
		return $resultado;
	}
}

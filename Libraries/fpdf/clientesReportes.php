<?php

require('./fpdf.php');

class PDF extends FPDF 
{

   // Cabecera de página
   function Header()
   {
      $this->SetFont('Arial', 'B', 19);
      $this->Cell(95);
      $this->SetTextColor(0, 0, 0);
      $this->Cell(110, 15, utf8_decode('Canino Feliz'), 0, 1, 'C');
      $this->Ln(3);

      // Título de la tabla
      $this->SetTextColor(22, 125, 255);
      $this->Cell(100);
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("REPORTE DE CLIENTES"), 0, 1, 'C');
      $this->Ln(7);

      // Campos de la tabla
      $this->Cell(60);
      $this->SetFillColor(122, 225, 247);
      $this->SetTextColor(0, 0, 0);
      $this->SetDrawColor(163, 163, 163);
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(60, 10, utf8_decode('NOMBRE DEL CLIENTE'), 1, 0, 'C', 1);
      $this->Cell(80, 10, utf8_decode('CORREO'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('TELEFONO'), 1, 1, 'C', 1);
      
   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15);
      $this->SetFont('Arial', 'I', 8);
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
      $this->SetY(-10); // Ajuste en la posición de la fecha
      $hoy = date('d/m/Y');
      $this->Cell(0, 10, utf8_decode($hoy), 0, 0, 'C');
   }
}

class MYSQL{
    private $ipServidor = "bhgtoc1qausfbocum0f0-mysql.services.clever-cloud.com";
    private $usuarioBase = "ujjnxedlzantdocl";
    private $contrasena = "E0fSQ7TKOq7PAsYPuTPk";
    private $DBName = "bhgtoc1qausfbocum0f0";
    private $conn;

    public function __construct($ipServidor = null, $usuarioBase = null, $contrasena = null, $DBName = null)
    {
        if ($ipServidor) $this->ipServidor = $ipServidor;
        if ($usuarioBase) $this->usuarioBase = $usuarioBase;
        if ($contrasena) $this->contrasena = $contrasena;
        if ($DBName) $this->DBName = $DBName;
    }

    public function connectDB(){
        try{
            $this->conn = new mysqli($this->ipServidor, $this->usuarioBase, $this->contrasena, $this->DBName);
            if($this->conn->connect_error){
                throw new Exception("error en la conexión: " .$this->conn->connect_error);
            }
            $this->conn->set_charset("utf8");
        } catch (Exception $e){
            die("excepción capturada: " . $e->getMessage());
        }
    } 

    public function getConnection(){
        return $this->conn;
    }
}
    
$mysql = new MYSQL();
$mysql ->connectDB();
$conn = $mysql->getConnection();

// Realizar la consulta para obtener los datos
$consulta_info = $conn->query('SELECT CONCAT(clientes.nombre," ",clientes.apellido) as cliente,
clientes.correo,
clientes.telefono
FROM clientes
WHERE clientes.status > 0 ');

// Generar el PDF
$pdf = new PDF();
$pdf->AddPage("landscape");
$pdf->AliasNbPages();
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163);

if ($consulta_info && $consulta_info->num_rows > 0) {
    // Crear filas de la tabla con los datos de la consulta
    while ($dato_info = $consulta_info->fetch_object()) {
        $pdf->Cell(60);
        $pdf->Cell(60, 10, utf8_decode($dato_info->cliente), 1, 0, 'C');
        $pdf->Cell(80, 10, utf8_decode($dato_info->correo), 1, 0, 'C');
        $pdf->Cell(30, 10, utf8_decode($dato_info->telefono), 1, 1, 'C');
    }
} else {
    $pdf->Cell(0, 10, 'No se encontraron datos.', 1, 1, 'C');
}

$pdf->Output('CitasReporte.pdf', 'I');



?>

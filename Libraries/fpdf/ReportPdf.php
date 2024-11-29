<?php

include_once 'Libraries/fpdf/fpdf.php';

class ReportPdf{

    private $pdf;

    public function __construct(){
        $this->pdf = new FPDF();
    }

    public function tabla(String $titulo, array $CabeceraTabla, array $anchosCelda, array $data, $outPut){
        $this->pdf->AddPage();
        $this->pdf->SetFont('Arial','B',16);
        $this->pdf->SetTitle($titulo);

        $this->pdf->Cell(90,6,$titulo,0);
        $this->pdf->Ln();
        $this->pdf->Ln();
        // Colores, ancho de línea y fuente en negrita
        $this->pdf->SetFillColor(130,130,130);
        $this->pdf->SetTextColor(255);
        $this->pdf->SetDrawColor(50,50,50);
        $this->pdf->SetLineWidth(.3);
        $this->pdf->SetFont('','B');
        // Cabecera
        $w = $anchosCelda;
        for($i=0;$i<count($CabeceraTabla);$i++)
            $this->pdf->Cell($w[$i],7,$CabeceraTabla[$i],1,0,'C',true);
            $this->pdf->Ln();
            // Restauración de colores y fuentes
            $this->pdf->SetFillColor(232,232,232);
            $this->pdf->SetTextColor(0);
            $this->pdf->SetFont('');
            // Datos
        $fill = false;
        foreach($data as $row)
        {
            $contador = 0;
            foreach ($row as $campo) {
                $this->pdf->Cell($w[$contador],6,$campo,'LR',0,'L',$fill);
                $contador++;
            }
            $this->pdf->Ln();
            $fill = !$fill;
        }
        // Línea de cierre
        $this->pdf->Cell(array_sum($w),0,'','T');
        $tituloFormateado = str_replace(' ', '_', $titulo);
        $this->pdf->Output($dest = $outPut, $tituloFormateado.'.pdf', true);
    }
}
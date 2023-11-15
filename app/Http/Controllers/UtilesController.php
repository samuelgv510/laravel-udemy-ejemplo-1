<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use App\Models\Producto;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Http;

class UtilesController extends Controller
{
    public function inicio()
    {
        return view('utiles.home');
    }
    public function pdf()
    {
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML('<h1>Hello world!</h1><img src="https://www.tamila.cl/assets/img/logo_2.png" />');
        $mpdf->Output();
    }
    public function excel()
    {

        $helper = new Sample();
        if ($helper->isCli()) {
            $helper->log('This example should only be run from a Web Browser' . PHP_EOL);

            return;
        }
        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // Set document properties
        $spreadsheet->getProperties()->setCreator('César Cancino')
            ->setLastModifiedBy('Tamila.cl')
            ->setTitle('Office 2007 XLSX Test Document')
            ->setSubject('Office 2007 XLSX Test Document')
            ->setDescription('Excel creado con PHP.')
            ->setKeywords('office 2007 openxml php')
            ->setCategory('Test result file');

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'ID')
            ->setCellValue('B1', 'Categoría')
            ->setCellValue('C1', 'Nombre')
            ->setCellValue('D1', 'Precio')
            ->setCellValue('E1', 'Stock')
            ->setCellValue('F1', 'Descripción')
            ->setCellValue('G1', 'Fecha');

        $productos = Producto::orderBy('id', 'desc')->get();
        $i = 2;
        foreach ($productos as $producto) {

            $spreadsheet->getActiveSheet()
                ->setCellValue('A' . $i, $producto->id)
                ->setCellValue('B' . $i, $producto->categoria->nombre)
                ->setCellValue('C' . $i, $producto->nombre)
                ->setCellValue('D' . $i, $producto->precio)
                ->setCellValue('E' . $i, $producto->stock)
                ->setCellValue('F' . $i, $producto->descripcion)
                ->setCellValue('G' . $i, Helper::invierte_fecha($producto->fecha));
            $i++;
        }

        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Hoja 1');

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="reporte_' . date("Y-m-d H:i:s") . '.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
    }
    public function cliente_rest()
    {
        $response = Http::get('https://api.dailymotion.com/videos?limit=100');
        $datos = $response->object();
        $json = $response->body();
        $status = $response->status();
        $headers = $response->headers();
        return view('utiles.cliente_rest', compact('datos', 'status', 'headers', 'json'));
    }
}

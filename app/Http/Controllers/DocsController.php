<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;

class DocsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Retrieve the user for the given ID.
     *
     * @param  int  $id
     * @return Response
     */
    public function generate(Request $request)
    {
        $pdf = App::make('dompdf.wrapper');

        // https://api-management-traveler.azure-api.net
        // this.http.get(`${environment.serverUrl}/document/Texts/Certificate/1/ODc3LTE5LTIwLTIyLTI0LTI2/3/es`, {
        //     headers: {
        //       'key-api': '2c96970fe61c421c893d32a02f080a96',
        //       'Ocp-Apim-Trace': 'true'
        //     }
        //   })

        $response = Http::withHeaders([
            'key-api' => '2c96970fe61c421c893d32a02f080a96',
            'Ocp-Apim-Trace' => 'true'
        ])->get('https://api-management-traveler.azure-api.net/document/Texts/Consulate/1/ODc3LTE5LTIwLTIyLTI0LTI2/3/es');

        $document = base64_decode($response->body());

        // dd($document);

        // $pdf->loadHTML($document);
        // dd($document);
        $pdf->loadHTML('<table width="900">
            <table bgcolor="#094782" width="900">
                <tr style="height:50px">
                    <td width="200"></td>
                    <td width="400" style="font-size: 22px;color: white;">Certificado de asistencia</td>
                    <td width="120">
                        <img width="30px" src="https://new.traveler-assistance.com/assets/img/certificado/facebook.jpg" />
                        <img width="30px" src="https://new.traveler-assistance.com/assets/img/certificado/instagram.jpg" />
                        <img width="30px" src="https://new.traveler-assistance.com/assets/img/certificado/link.jpg" />
                    </td>
                    <td width="100"><span style="color:white">/travelerassistance</span></td>
                    <td width="100"></td>
                </tr>
            </table>
            <table style="position: absolute; top: 10px;left: 50px;">
                <tr>
                    <td>
                        <img width="80px" src="https://new.traveler-assistance.com/assets/img/certificado/tas.png" />
                    </td>
                </tr>
            </table>
            <tr>
                <td>
                    <img width="900px" src="https://new.traveler-assistance.com/assets/img/certificado/banner-plan.jpg" />
                </td>
            </tr>
            <table>
                <table width="250px" height="250px" style="text-align: center;background: red;text-align: center;               background: #f2f2f2; position: absol ▶
                    <tr>
                        <td>
                            <p>0</p>
                            <p> </p>
                            <img width="250px" src="https://new.traveler-assistance.com/assets/img/certificado/avion2.jpg" />
                            <p style="font-size: 30px; position: absolute;left: 35px;top: 103px;">
                                <b>57</b>
                                <br />
                                <span style="font-size:13px">Colombia</span>
                            </p>
                            <p style="font-size:30px; font-size: 30px;position: relative;left: 60px;top: -20px;">
                                <b>1</b>
                                <br />
                                <span style="font-size:13px">Estados Unidos</span>
                            </p>
                            <p style="width: 251px;height: 30px; background: #e4e4e4;position: absolute; top: 207px;">
                                <span>
                                    <img width="25px" style="position: relative;top: 4px;" src="https://new.traveler-assistance.com/assets/img/certificado/calendar- ▶
                                </span>
                            </p>
                        </td>
                    </tr>
                </table>
            </table>
            <table>
                <tr>
                    <td height="130px" style="position: relative; left: 100px; font-size: 30px;">
                        Plan Gold
                        <br />
                        <span style="font-size:16px">[Cobertura hasta 0 ? L?mite de edad {certificate.AgeLimit}]</span>
                    </td>
                </tr>
            </table>
            <table style="margin-top:20px">
                <!-- IRIA EL FOR DE BENEFICIOS CON VALORES DE COBERTURA-->
                {certificate.Benefits}
                <!--<tr>
                    <td width="100" style="position:relative;top: 10px;"></td>
                    <td width="500px">Asistencia m?dica por accidente</td>
                    <td width="200px" style="text-align: end;">$3.000,00</td>
                    <td width="100"></td>
                </tr>-->
            </table>
            <table style="position:relative;top:20px;position: relative;
                left: -4px;">
                <tr>
                    <td width="900px" height="50px" bgcolor="#de1527" style="color:white;text-align:center;">
                        <span> Importante: Los montos de las coberturas se expresan en Euros o D?lares dependiendo del destino.</span>
                    </td>
                </tr>
            </table>
            <table style="width: 900px;height: 500px;background: #e0e9f7;">
                <tr>
                    <td style="position: relative;top: 45px; text-align: center;">
                        Para consulta y/o validaci?n de documentos, ingresar a: <b>https://consulta.seguroparaviaje.com/</b>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table style="width: 800px;height: auto;border: dashed 2px #094782; position: relative; left: 50px; padding: 3%;">
                            <tr>
                                <td width="500px">
                                    <img width="100px" style="position: relative;top: 4px;" src="https://new.traveler-assistance.com/assets/img/certificado/logo-tas ▶
                                    <span style="font-size: 19px;color: #0b467e;font-weight: bold;position: relative;top: -10px;">
                                        CERTIFICADO N?: 0
                                    </span>
                                    <table>
                                        <br />
                                        <br />
                                        <tr>
                                            <td>
                                                <b> Beneficiario:</b>    <br />
                                                <b> DOB/Nacimiento:</b> 10/25/2021 12:00:00 AM <br />
                                                <b> Efective date to/Hasta:</b> 10/31/2021 12:00:00 AM <br />
                                                <b> Precio:</b> USD 90
                                                <br /><br />
                                                <button style="background: #094983;padding: 10px;color: white;border: 0;font-size: 17px;">coordinacion@traveler-assi ▶
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td width="400px">
                                    <span>Antes de comprometer gastos deben de contactarse a:</span> <br /> <br />
                                    <span style="font-size: 22px;color: red;font-weight: bold;">ESPA?A +34 91 080 7658 UK +44 20 7193 47 46</span> <br /><br />
                                    <span>En el contrato de servicios se encuentra el listado de los n?meros telef?nicos. Es obligaci?n del beneficiario leer los t? ▶
                                    <table>
                                        <tr>
                                            <td>
                                                <img width="70px" src="https://new.traveler-assistance.com/assets/img/certificado/whatsapp.jpg" />
                                            </td>
                                            <td>
                                                <span style="font-size:20px;color: #094983;font-weight: bold;">(+1) 928 212 2129</span><br />
                                                <span style="font-size:20px;color: #094983;font-weight: bold;">(+34) 91 076 6622</span>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <table width="900px" style="height: 130px;background: #094983;">
                <tr>
                    <td style="text-align: center;
                    width: 200px;
                    position: relative;
                    top: -30px;">
                        <img width="100px" src="https://new.traveler-assistance.com/assets/img/certificado/tas.png" />
                        <br />
                        <span style="font-size:12px;color: white;">? 2020 Traveler Assistance. Todos los derechos reservados.</span>
                    </td>
                    <td style="text-align: center;width: 300px;">
                        <span style="color: white;font-size: 14px;text-align: center;">
                            <b>Agenda nuestros n?meros</b> <br />
                            Ante cualquier eventualidad comunicate v?a Whatsapp con nosotros los 365 d?as al a?o, 24/7.
                        </span>
                    </td>
                    <td style="width:350px">
                        <table>
                            <tr>
                                <td style="padding: 5px;">
                                    <img width="100px" src="https://new.traveler-assistance.com/assets/img/certificado/qr.jpg" />
                                </td>
                                <td style="color:white;font-size:13px;text-align:center;">
                                    Scanea el c?digo QR y
                                    te asisteremos v?a
                                    Whatsapp: +34 62712 0534
                                    <br />
                                    <span style="position:relative;top: 20px; font-size: 13px;">contacto@traveler-assistance.com</span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </table>');
        return $pdf->setPaper('a3')
            ->setWarnings(false)
            ->stream();
    }
}

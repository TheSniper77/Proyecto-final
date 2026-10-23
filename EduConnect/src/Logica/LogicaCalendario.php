<?php

namespace EduConnect\Logica;

class LogicaCalendario
{
    public static function obtenerCalendario()
    {
        $mes = $_GET["mes"] ?? date("m");
        $anio = $_GET["anio"] ?? date("Y");

        $mes = (int)$mes;
        $anio = (int)$anio;

        $mesAnterior = $mes - 1;
        $anioAnterior = $anio;

        if ($mesAnterior < 1) {
            $mesAnterior = 12;
            $anioAnterior--;
        }

        $mesSiguiente = $mes + 1;
        $anioSiguiente = $anio;

        if ($mesSiguiente > 12) {
            $mesSiguiente = 1;
            $anioSiguiente++;
        }

        $primerDia = mktime(0, 0, 0, $mes, 1, $anio);

        $diasMes = date("t", $primerDia);

        $diaSemana = date("N", $primerDia);

        $hoy = date("j");
        $mesActual = date("n");
        $anioActual = date("Y");

        $meses = [
            1 => "Enero",
            2 => "Febrero",
            3 => "Marzo",
            4 => "Abril",
            5 => "Mayo",
            6 => "Junio",
            7 => "Julio",
            8 => "Agosto",
            9 => "Septiembre",
            10 => "Octubre",
            11 => "Noviembre",
            12 => "Diciembre"
        ];

        return [
            "mes" => $mes,
            "anio" => $anio,
            "mesAnterior" => $mesAnterior,
            "anioAnterior" => $anioAnterior,
            "mesSiguiente" => $mesSiguiente,
            "anioSiguiente" => $anioSiguiente,
            "diasMes" => $diasMes,
            "diaSemana" => $diaSemana,
            "hoy" => $hoy,
            "mesActual" => $mesActual,
            "anioActual" => $anioActual,
            "meses" => $meses
        ];
    }
}
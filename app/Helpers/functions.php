<?php

function whatsapp_numero($numero)
{
    $caracteres = array("(", ")", "-", ".", "+", " ");
    return "55" . str_replace($caracteres, "", $numero);
}

function randomString($largura)
{
    $caracteres = array(
        '0', '1', '2', '3', '4', '5',
        '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f',
        'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p',
        'q', 'r', 's', 't', 'u', 'v', 'x', 'w', 'y', 'z'
    );
    $ID = '';

    for ($i = 0; $i < $largura; $i++) {
        $ID .= $caracteres[floor(rand() % count($caracteres))];
    }

    return $ID;
}

function moeda($valor)
{
    if (!empty($valor)) {
        $valor = str_replace(",", "", $valor);
        $valor = number_format($valor, 2, ',', '.');
    }
    return $valor;
}

function dataBr($dataBd)
{
    if (empty($dataBd)) {
        return null;
    }

    $data = implode("/", array_reverse(explode("-", $dataBd)));
    return $data;
}

function dataBrExtenso($dataSQL)
{

    $dataObjeto = new DateTime($dataSQL);

    $meses = array(
        1 => 'Janeiro',
        2 => 'Fevereiro',
        3 => 'Março',
        4 => 'Abril',
        5 => 'Maio',
        6 => 'Junho',
        7 => 'Julho',
        8 => 'Agosto',
        9 => 'Setembro',
        10 => 'Outubro',
        11 => 'Novembro',
        12 => 'Dezembro'
    );
    $mes = $meses[$dataObjeto->format('n')];

    $dataFormatada = $dataObjeto->format('d') . ' de ' . $mes . ' de ' . $dataObjeto->format('Y');

    return $dataFormatada;
}

function deleteFile($file)
{
    if (file_exists(public_path($file)) && !is_dir(public_path($file))) {
        unlink(public_path($file));
    }
}

function isMobileDevice()
{
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $mobileDevices = array(
        'Android',
        'webOS',
        'iPhone',
        'iPad',
        'iPod',
        'BlackBerry',
        'Windows Phone'
    );

    foreach ($mobileDevices as $device) {
        if (strpos($userAgent, $device) !== false) {
            return true;
        }
    }

    return false;
}

function youtube_id($string)
{
    if (preg_match("#youtu.be/(.{11})#", $string, $matches)) {
        return $matches[1];
    }

    if (preg_match("#youtube.com/watch\?v=(.{11})#", $string, $matches)) {
        return $matches[1];
    }

    if (preg_match("#youtube.com/shorts/(.{11})#", $string, $matches)) {
        return $matches[1];
    }

    return null;
}

function link_youtube($string)
{
    return "https://www.youtube.com/embed/" . youtube_id($string);
}

function thumb_youtube($string)
{
    return 'http://img.youtube.com/vi/' . youtube_id($string) . '/maxresdefault.jpg';
}

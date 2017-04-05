<?php
function status($id = NULL) {
    $status = [
        '0' => 'No',
        '1' => 'Yes',
    ];
    if($id)
        return $status[$id];
    else 
        return $status;
}

function status_customer($id = NULL) {
    $status = [
        1 => 'Door to Door',
        2 => 'Door/CY',
        3 => 'Door/Port',
        4 => 'Port To Port',
        5 => 'CY/CY',
        6 => 'CY/Port',
        7 => 'CY/Door',
        8 => 'Port/Door',
        9 => 'Port/CY',
    ];
    if($id)
        return $status[$id];
    else 
        return $status;
}

function status_shipping($id = NULL) {
    $status = [        
        4 => 'Port To Port',
        5 => 'CY/CY',
        6 => 'CY/Port',
        7 => 'CY/Door',        
    ];
    if($id)
        return $status[$id];
    else 
        return $status;
}

function rupiah($price) {
    return "Rp " . format_angka($price, 2);
}

function format_angka($nilai, $batas=''){
    $bil_bulat 	= floor($nilai);
    $desimal	= $nilai-$bil_bulat;
    $format = number_format($bil_bulat, 0, ',', '.');

    if($desimal > 0){
        $format .= ',' . substr(floatval(round($desimal,$batas)),2);	
    }
    return($format);
}

function conv_angka($nilai){
    $hasil = str_replace('.', '', $nilai);
    $hasil = str_replace(',', '.', $hasil);
    return $hasil;
}
		
function conv_rupiah($nilai){
    $hasil = str_replace('Rp ', '', $nilai);
    $hasil = conv_angka($hasil);
    return $hasil;
}

function tanggal_date($data) {
    if ($data != '0000-00-00') {
        $balik = (int) date("d", strtotime($data)) . ' ' . bulan_sedang(date("m", strtotime($data))) . ' ' . date("Y", strtotime($data));
    } else {
        $balik = '-';
    }
    return $balik;
}

function bulan_tahun_date($data) {
    if ($data != '0000-00-00') {
        $balik = bulan_panjang(date("m", strtotime($data))) . ' ' . date("Y", strtotime($data));
    } else {
        $balik = '-';
    }
    return $balik;
}

function tgl_bulan_tahun_date($data) {
    if ($data != '0000-00-00') {
        $balik = (int) date("d", strtotime($data)) . ' ' . bulan_panjang(date("m", strtotime($data))) . ' ' . date("Y", strtotime($data));
    } else {
        $balik = '-';
    }
    return $balik;
}

function tanggal_datetime($data) {
    if ($data == '0000-00-00 00:00:00') {
        $balik = '-';
    } else {
        $balik = (int) date("d", strtotime($data)) . ' ' . bulan_sedang(date("m", strtotime($data))) . ' ' . date("Y", strtotime($data));
    }
    return $balik;
}

function full_tanggal_datetime($data) {
    if ($data == '0000-00-00 00:00:00') {
        $balik = '-';
    } else {
        $s = strtotime($data);
        $balik = date('d', $s) . ' ' . bulan_panjang(date("m", strtotime($data))) . ' ' . date("Y", strtotime($data));
    }
    return $balik;
}

function jam_datetime($data) {
    if ($data == '0000-00-00 00:00:00') {
        $balik = '-';
    } else {
        $s = strtotime($data);
        $balik = date('H:i', $s);
    }
    return $balik;
}

function tanggaljam_datetime($data) {
    if ($data !== '0000-00-00 00:00:00') {
       
        $balik = (int) date("d", strtotime($data)) . ' ' . bulan_sedang(date("m", strtotime($data))) . ' ' . date("Y", strtotime($data)). ', '.date('H:i', strtotime($data));
    } else {
        $balik = '-';
    }
    return $balik;
}

function bulan_panjang($bulan) {
    switch ((int)$bulan) {
        case 1 : $hasil = "Januari";
            break;
        case 2 : $hasil = "Februari";
            break;
        case 3 : $hasil = "Maret";
            break;
        case 4 : $hasil = "April";
            break;
        case 5 : $hasil = "Mei";
            break;
        case 6 : $hasil = "Juni";
            break;
        case 7 : $hasil = "Juli";
            break;
        case 8 : $hasil = "Agustus";
            break;
        case 9 : $hasil = "September";
            break;
        case 10 : $hasil = "Oktober";
            break;
        case 11 : $hasil = "November";
            break;
        case 12 : $hasil = "Desember";
            break;
    }
    return $hasil;
}

function bulan_sedang($bulan) {
    switch ((int)$bulan) {
        case 1 : $hasil = "Jan";
            break;
        case 2 : $hasil = "Feb";
            break;
        case 3 : $hasil = "Mar";
            break;
        case 4 : $hasil = "Apr";
            break;
        case 5 : $hasil = "Mei";
            break;
        case 6 : $hasil = "Jun";
            break;
        case 7 : $hasil = "Jul";
            break;
        case 8 : $hasil = "Ags";
            break;
        case 9 : $hasil = "Sep";
            break;
        case 10 : $hasil = "Okt";
            break;
        case 11 : $hasil = "Nov";
            break;
        case 12 : $hasil = "Des";
            break;
    }
    return $hasil;
}

function conv_bulan_panjang($bulan) {
    switch ($bulan) {
        case "Januari" : $hasil = '01';
            break;
        case "Februari" : $hasil = '02';
            break;
        case "Maret" : $hasil = '03';
            break;
        case "April" : $hasil = '04';
            break;
        case "Mei" : $hasil = '05';
            break;
        case "Juni" : $hasil = '06';
            break;
        case "Juli" : $hasil = '07';
            break;
        case "Agustus" : $hasil = '08';
            break;
        case "September" : $hasil = '09';
            break;
        case "Oktober" : $hasil = '10';
            break;
        case "November" : $hasil = '11';
            break;
        case "Desember" : $hasil = '12';
            break;
    }
    return $hasil;
}

function conv_bulan_sedang($bulan) {
    switch ($bulan) {
        case "Jan" : $hasil = "01";
            break;
        case "Feb" : $hasil = "02";
            break;
        case "Mar" : $hasil = "03";
            break;
        case "Apr" : $hasil = "04";
            break;
        case "Mei" : $hasil = "05";
            break;
        case "Jun" : $hasil = "06";
            break;
        case "Jul" : $hasil = "07";
            break;
        case "Ags" : $hasil = "08";
            break;
        case "Sep" : $hasil = "09";
            break;
        case "Okt" : $hasil = "10";
            break;
        case "Nov" : $hasil = "11";
            break;
        case "Des" : $hasil = "12";
            break;
    }
    return $hasil;
}

function formatfull_tanggal($tanggal) {
    $tgl = explode('-', $tanggal);
    $hasil = $tgl[2] . " " . bulan_panjang($tgl[1]) . " " . $tgl[0];
    return $hasil;
}

function convfull_tanggal($tanggal) {
    $tgl = explode(' ', $tanggal);
    $hasil = $tgl[2] . "-" . conv_bulan_panjang($tgl[1]) . "-" . $tgl[0];
    return $hasil;
}

function format_tanggal($tanggal) {
    $tgl = explode('-', $tanggal);
    $hasil = $tgl[2] . " " . bulan_sedang($tgl[1]) . " " . $tgl[0];
    return $hasil;
}

function conv_tanggal($tanggal) {
    $tgl = explode(' ', $tanggal);
    $hasil = $tgl[2] . "-" . conv_bulan_sedang($tgl[1]) . "-" . $tgl[0];
    return $hasil;
}

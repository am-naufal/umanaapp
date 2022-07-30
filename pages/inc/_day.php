<?php

function __day()
{
    $hari = date("D");

    switch ($hari) {
        case 'Sun':
            $now = "Ahad";
            break;

        case 'Mon':
            $now = "Senin";
            break;

        case 'Tue':
            $now = "Selasa";
            break;

        case 'Wed':
            $now = "Rabu";
            break;

        case 'Thu':
            $now = "Kamis";
            break;

        case 'Fri':
            $now = "Jum'at";
            break;

        case 'Sat':
            $now = "Sabtu";
            break;

        default:
            $now = "Tidak di ketahui";
            break;
    }
    return "<b>" . $now . "</b>";
}

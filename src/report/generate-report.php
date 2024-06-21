<?php

// Included files
require_once "{$_SERVER['DOCUMENT_ROOT']}/src/includes/db.php";
require_once "{$_SERVER['DOCUMENT_ROOT']}/src/report/report-displayers.php";
require_once "{$_SERVER['DOCUMENT_ROOT']}/src/report/report-helpers.php";

// Using XOR to make sure that both the start date and end date are submitted together
if (!(empty($_GET['start_date']) ^ empty($_GET['end_date']))) {

    $time_period = [];
    if (!empty($_GET['start_date']) && !empty($_GET['end_date'])) {
        $time_period['start_date'] = $_GET['start_date'];
        $time_period['end_date'] = $_GET['end_date'];
    }

    switch ($_GET['event_type'] ?? '') {
        case 'all':
            liveBirthReports($time_period);
            stillBirthReports($time_period);
            marriageReports($time_period);
            judicialSeparationReports($time_period);
            annulmentReports($time_period);
            recognitionReports($time_period);
            adoptionReports($time_period);
            divorceReports($time_period);
            deathReports($time_period);
            break;
        case 'live_births':
            liveBirthReports($time_period);
            break;
        case 'deaths':
            deathReports($time_period);
            break;
        case 'still_births':
            stillBirthReports($time_period);
            break;
        case 'marriages':
            marriageReports($time_period);
            break;
        case 'divorces':
            divorceReports($time_period);
            break;
        case 'adoptions':
            adoptionReports($time_period);
            break;
        case 'recognitions':
            recognitionReports($time_period);
            break;
        case 'annulments':
            annulmentReports($time_period);
            break;
        case 'judicial_separations':
            judicialSeparationReports($time_period);
            break;
        default:
            break;
    }
} else {
    die('<div class="err-box">If either date (start date and end date) is chosen, the other is required.');
}
<?php
/**
 * Site configuration.
 *
 * BASE_URL is auto-detected so the site works both at a domain root
 * (https://martglobal.net/) and inside a sub-folder (http://localhost/martglobal/).
 * Override it here if auto-detection does not suit your server.
 */

if (!defined('BASE_URL')) {
    $scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '/'));
    $base = rtrim($scriptDir, '/');
    define('BASE_URL', $base === '' ? '' : $base);
}

const SITE = [
    'name'        => 'MART Global',
    'legal_name'  => 'MART Global Management Solutions LLP',
    'tagline'     => 'Business Mind, Social Heart',
    'since'       => 1993,
    'description' => 'MART Global is a knowledge-based consulting organisation helping businesses, governments and development institutions understand and transform rural and emerging markets since 1993.',
    'phone'       => '+91 120 421 5323',
    'email'       => 'info@martrural.com',
    'address'     => 'A-51, Third Floor, Fixwell Corporation, Sector 2, Noida, Uttar Pradesh 201301, India',
    'offices'     => ['Corporate Office – Noida', 'Regional Office – Bhubaneswar', 'Project Offices – India & Bangladesh'],
    'social'      => [
        'linkedin'  => 'https://in.linkedin.com/company/mart',
        'facebook'  => 'https://www.facebook.com/martrural',
        'twitter'   => '#',
        'youtube'   => '#',
    ],
];

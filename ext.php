<?php

$banner = "
▓█████ ▒██   ██▒▄▄▄█████▓▓█████  ███▄    █   ██████  ██▓ ▒█████   ███▄    █ 
▓█   ▀ ▒▒ █ █ ▒░▓  ██▒ ▓▒▓█   ▀  ██ ▀█   █ ▒██    ▒ ▓██▒▒██▒  ██▒ ██ ▀█   █ 
▒███   ░░  █   ░▒ ▓██░ ▒░▒███   ▓██  ▀█ ██▒░ ▓██▄   ▒██▒▒██░  ██▒▓██  ▀█ ██▒
▒▓█  ▄  ░ █ █ ▒ ░ ▓██▓ ░ ▒▓█  ▄ ▓██▒  ▐▌██▒  ▒   ██▒░██░▒██   ██░▓██▒  ▐▌██▒
░▒████▒▒██▒ ▒██▒  ▒██▒ ░ ░▒████▒▒██░   ▓██░▒██████▒▒░██░░ ████▓▒░▒██░   ▓██░
░░ ▒░ ░▒▒ ░ ░▓ ░  ▒ ░░   ░░ ▒░ ░░ ▒░   ▒ ▒ ▒ ▒▓▒ ▒ ░░▓  ░ ▒░▒░▒░ ░ ▒░   ▒ ▒ 
 ░ ░  ░░░   ░▒ ░    ░     ░ ░  ░░ ░░   ░ ▒░░ ░▒  ░ ░ ▒ ░  ░ ▒ ▒░ ░ ░░   ░ ▒░
   ░    ░    ░    ░         ░      ░   ░ ░ ░  ░  ░   ▒ ░░ ░ ░ ▒     ░   ░ ░ 
   ░  ░ ░    ░              ░  ░         ░       ░   ░      ░ ░           ░ 
                                                             Coded by Zaen";
                                                                  
echo "\033[33m" . $banner . "\033[0m\n";

function domain_ext($extension, $dari, $ke) {
    $file_name = "ress-{$extension}.txt"; 
    for ($page = $dari; $page <= $ke; $page++) {
        $url = "https://zoxh.com/tld/{$extension}/{$page}";
        $content = file_get_contents($url);
        preg_match_all('/href="\/i\/([a-zA-Z0-9.-]+)"/', $content, $regex);
        $domains = $regex[1];
        foreach ($domains as $domain) {
            echo "[+] Page $page => \033[32m $domain \033[0m\n";
            file_put_contents($file_name, "$domain\n", FILE_APPEND);
        }
    }
}
$extension = readline("Domain: ");
$dari = readline("From page: ");
$ke = readline("To page: ");
sleep(1);
domain_ext($extension, $dari, $ke);

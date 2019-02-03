<?php

$options = getopt('u::', array('url::'));

if (isset($options['u'])) {
    $url = $options['u'];
} elseif (isset($options['url'])) {
    $url = $options['url'];
} else {
    $url = $argv[1];
}

$valid_tlds = file_get_contents('http://data.iana.org/TLD/tlds-alpha-by-domain.txt');
$tlds_array = explode("\n",$valid_tlds);
array_shift($tlds_array);
array_pop($tlds_array);

$valid_slds = array('com', 'co', 'org', 'in', 'us', 'gov', 'mi', 'int', 'edu', 'net', 'biz', 'info');

if (!filter_var($url, FILTER_VALIDATE_URL)) {
    exit('Error! URL is not valid or you\'ve incorrectly used options!' . PHP_EOL);
}
$url_array = parse_url($url);

$scheme = $url_array['scheme'];
if ($scheme != 'http' && $scheme != 'https') {
    exit("Error! Scheme must be http or https!" . PHP_EOL);
}

$host = $url_array['host'];
$host_elements = explode('.',$host);
$tld = array_pop($host_elements);
if (!in_array(strtoupper($tld), $tlds_array)) {
    exit("Error! Not valid TLD!" . PHP_EOL);
}
echo 'Scheme: ' . $scheme . PHP_EOL;
echo 'Host: ' . $host . PHP_EOL;

if (in_array(end($host_elements),$valid_slds)) {
    $sld = array_pop($host_elements);
    $resource = array_pop($host_elements);
    $domain = $resource . '.' .  $sld . '.' . $tld;
} else {
    $resource = array_pop($host_elements);
    $domain = $resource . '.' . $tld;
}
echo 'Domain: ' . $domain . PHP_EOL;
if (count($host_elements) > 0) {
    $subdomain=implode('.',$host_elements);
    echo 'Subdomain: ' . $subdomain . PHP_EOL;
}
echo 'TLD: .' . $tld . PHP_EOL;
if (isset($sld)) {
    echo 'SLD: .' . $sld . '.'  . $tld .  PHP_EOL;
}

if (array_key_exists('port', $url_array)) {
    echo 'Port: ' . $url_array['port'] . PHP_EOL;
}

if (array_key_exists('user', $url_array)) {
    echo 'User: ' . $url_array['user'] . PHP_EOL;
}

if (array_key_exists('pass', $url_array)) {
    echo 'Password: ' . $url_array['pass'] . PHP_EOL;
}

if (array_key_exists('path', $url_array)) {
    $path = $url_array['path'];
    echo 'Path:' . $path . PHP_EOL;
    if (strpos($path, '.') !== false ) {
        $path_elements = explode('.',$path);
        $extension = end($path_elements);
        echo 'Extension: ' . $extension . PHP_EOL;
    }
}

if (array_key_exists('query', $url_array)) {
    $query = $url_array['query'];
    echo 'Query: ' . $query . PHP_EOL;
    $query_elements = explode('&',$query);
    echo 'Parsed query: {' . PHP_EOL;
    foreach($query_elements as &$pair) {
        $pair = explode('=',$pair);
        echo $pair[0] . ': ' . $pair[1] . PHP_EOL;
    }
    echo '}'. PHP_EOL;
    unset($pair);
}

if (array_key_exists('fragment', $url_array)) {
    echo 'Fragment: ' . $url_array['fragment'] . PHP_EOL;
}

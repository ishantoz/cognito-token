<?php

use GDSSO\Tokens\CognitoTokenVerifier;
use GDSSO\Tokens\Exception\CognitoTokenException;
use Dotenv\Dotenv;
use Symfony\Component\VarDumper\VarDumper;

require __DIR__ . '/vendor/autoload.php';

// Load the .env file from the current directory
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();


$token = 'eyJraWQiOiIyQTlwb0xTNFVzUzZVQXhMaVZETzZWUlNWNWpYSldcL0V3YytuN3VzK3RkMD0iLCJhbGciOiJSUzI1NiJ9.eyJzdWIiOiI4NGU4ODQ2OC05MGQxLTcwNWYtOGM4My00ZWMwODBkMjVjNDciLCJpc3MiOiJodHRwczpcL1wvY29nbml0by1pZHAudXMtZWFzdC0xLmFtYXpvbmF3cy5jb21cL3VzLWVhc3QtMV9hUVJVWWZZSlEiLCJjbGllbnRfaWQiOiI2YzloczJwMXY1M2JmOW9sNW0wbzBybGZqaiIsIm9yaWdpbl9qdGkiOiJjYTUzYWRmNS0zNjM3LTRkYzEtYTc4NS1kY2NiNDliOGU1MWIiLCJldmVudF9pZCI6ImM4ODgxYzIxLWM5MjMtNDllNC04NDgyLTk2YjNhMGE2ZTE4MCIsInRva2VuX3VzZSI6ImFjY2VzcyIsInNjb3BlIjoiYXdzLmNvZ25pdG8uc2lnbmluLnVzZXIuYWRtaW4iLCJhdXRoX3RpbWUiOjE3NDQxNzkxNzcsImV4cCI6MTc0NDE4Mjc3NywiaWF0IjoxNzQ0MTc5MTc3LCJqdGkiOiJiMDY2MGJmZC0zNWJmLTQwZWItOGRhMi1lYWQ4YTMxNGQ3ODUiLCJ1c2VybmFtZSI6Ijg0ZTg4NDY4LTkwZDEtNzA1Zi04YzgzLTRlYzA4MGQyNWM0NyJ9.cnNP0R3JBSv_NC-zzQD6VbJ4w1Z3puOs9GRHbUpWIwLb2Vj5W7cm0LrPas4YfhmhexKl5IFQ6JreLk0SmfK7_FpDSfbh7rLFdXcqmpq7p-vkW1C4Hg-CTLSCjnyX8sPnjPGJ6NY6esOChu2G0LHND5ZgIV_kQYsZGMKWq2Ye55jlc4ING1shr4bkt68GSXMPtVa2DZ46JpWOC5vVMDT2lPrdE1m5sBCkeb9zNO51g0LuHf7UXHnBt9ei4hHHjmzku8QCF09-0maIf3zx1-N_KmTeotqMg1ckawqNN1MW-SzGSLWYwUU7xV7PBfFUE6c31gq0IZGr6zBiCus5IOP3pw';


$cognitoRegion = $_ENV['COGNITO_REGION'];
$cognitoUserPoolId = $_ENV['COGNITO_USER_POOL_ID'];
$cognitoClientId = $_ENV['COGNITO_CLIENT_ID'];


$verifier = new CognitoTokenVerifier($cognitoRegion, $cognitoUserPoolId, $cognitoClientId);

try {
    $payload = $verifier->verifyAccessToken($token);
    VarDumper::dump($payload);
} catch (CognitoTokenException $err) {
    die($err->getMessage());
}

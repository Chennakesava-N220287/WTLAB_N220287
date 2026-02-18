<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require __DIR__ . '/vendor/autoload.php';

try {

    // 🔹 Load .env file
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    // 🔹 Read environment variables safely
    $clientId     = $_ENV['GOOGLE_CLIENT_ID'] ?? null;
    $clientSecret = $_ENV['GOOGLE_CLIENT_SECRET'] ?? null;
    $redirectUri  = $_ENV['GOOGLE_REDIRECT_URI'] ?? null;

    if (!$clientId || !$clientSecret || !$redirectUri) {
        throw new Exception("Missing Google OAuth configuration in .env file");
    }

    // 🔹 Create Google Client
    $client = new Google\Client();
    $client->setClientId($clientId);
    $client->setClientSecret($clientSecret);
    $client->setRedirectUri($redirectUri);

    // 🔹 Scopes (What data we request from Google)
    $client->addScope("email");
    $client->addScope("profile");

    /*
    ---------------------------------------------------
    STEP 1: If no ?code → Redirect user to Google
    ---------------------------------------------------
    */
    if (!isset($_GET['code'])) {

        $authUrl = $client->createAuthUrl();

        header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
        exit();
    }

    /*
    ---------------------------------------------------
    STEP 2: If ?code exists → Handle Google callback
    ---------------------------------------------------
    */
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if (isset($token['error'])) {
        throw new Exception("Error fetching access token: " . $token['error_description']);
    }

    // 🔹 Set Access Token
    $client->setAccessToken($token);

    // 🔹 Get User Info
    $google_oauth = new Google\Service\Oauth2($client);
    $userInfo = $google_oauth->userinfo->get();

    // 🔹 Store user data in session
    $_SESSION['access_token'] = $token['access_token'];
    $_SESSION['user_id']      = $userInfo->id;
    $_SESSION['user_email']   = $userInfo->email;
    $_SESSION['user_name']    = $userInfo->name;
    $_SESSION['user_picture'] = $userInfo->picture;

    // 🔹 Redirect to dashboard
    header('Location: dashboard.php');
    exit();

} catch (Exception $e) {

    echo "<h2>Critical Error:</h2>";
    echo "<p>" . htmlspecialchars($e->getMessage()) . "</p>";
}
?>
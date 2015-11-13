<?php
class GoogleAuth {
  protected $db;
  protected $client;

  public function __construct(DB $db = null, Google_Client $googleClient = null){
    $this->db = $db;
    $this->client = $googleClient;

    if($this->client){
      $this->client->setClientId('815018151573-q5qtrjn3vr8bn7jpcgd1s22tdm62urik.apps.googleusercontent.com');
      $this->client->setClientSecret('4BvUPWk0Zr73ZM-F7liSrNum');
      $this->client->setRedirectUri('http://localhost/samenvattingen/login.php');
      $this->client->setScopes('email');
    }
  }

  public function isLoggedIn(){
    return isset($_SESSION['access_token']);
  }

  public function getAuthUrl(){
    return $this->client->createAuthUrl();
  }

  public function checkRedirectCode(){
    if(isset($_GET['code'])){
      $this->client->authenticate($_GET['code']);

      $this->setToken($this->client->getAccessToken());

      $this->storeUser($this->getPayload());

      return true;
    } else {
      return false;
    }

  }

  public function setToken($token){
    $_SESSION['access_token'] = $token;

    $this->client->setAccessToken($token);
  }

  public function logout(){
    unset($_SESSION['access_token']);
  }

  public function getName(){
    $sql = "SELECT email FROM users";
  }

  protected function getPayload(){
    $payload = $this->client->verifyIdToken()->getAttributes()['payload'];

    return $payload;
  }

  protected function storeUser($payload){
    $sql = "INSERT INTO users (google_id, email) VALUES ('{$payload['sub']}', '{$payload['email']}') ON DUPLICATE KEY UPDATE id = id";

    $this->db->query($sql);
  }
}

?>

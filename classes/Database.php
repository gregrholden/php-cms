<?php

// Load environment variables to $_ENV config.
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/..");
$dotenv->safeLoad();

/**
 * Database Singleton class to protect memory resources each time a connection
 * is requested by the browser.
 */
class Database {

  // Database credentials.
  protected $host = null;
  protected $user = null;
  protected $pass = null;
  protected $name = null;
  protected $port = null;

  // Instance variables.
  private static $instance;
  private $connection;

  // Construct DB connection with $_ENV variables.
  private function __construct() {
    $this->connection = mysqli_connect(
      $this->host = $_ENV['DB_HOST'],
      $this->user = $_ENV['DB_USER'],
      $this->pass = $_ENV['DB_PASS'],
      $this->name = $_ENV['DB_NAME'],
      $this->port = $_ENV['DB_PORT']
    );
  }

  function __destruct() {
    $this->connection->close();
  }

  public static function getInstance() {
    if (!self::$instance) {
      self::$instance = new Database();
    }
    return self::$instance->connection;
  }

}

?>

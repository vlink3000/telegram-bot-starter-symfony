<?php declare(strict_types=1);

namespace Telegram\Bot\Skeleton\Infrastructure;

use Illuminate\Database\Capsule\Manager as Capsule;
use Symfony\Component\Yaml\Yaml;

class DatabaseConnector
{
    private $connection;

    /**
     * DatabaseConnector constructor.
     *
     * @param $connection
     */
    public function __construct(Capsule $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @return Capsule
     */
    public function getConnection(): Capsule
    {
        $config = $this->getConfiguration();

        $this->connection->addConnection([
            "driver" => $config["driver"],
            "host" => $config["host"],
            "port" => $config["port"],
            "database" => $config["database"],
            "username" => $config["username"],
            "password" => $config["password"],
        ]);

        $this->connection->setAsGlobal();
        $this->connection->bootEloquent();
        $this->connection->bootEloquent();

        return $this->connection;
    }

    /**
     * @return array
     */
    private function getConfiguration(): array
    {
        $configYaml = Yaml::parseFile(dirname(__DIR__) . '/../config/database.yaml');

        return [
            "driver" => $configYaml["mysql"]["driver"],
            "host" => $configYaml["mysql"]["host"],
            "port" => $configYaml["mysql"]["port"],
            "database" => $configYaml["mysql"]["database"],
            "username" => $configYaml["mysql"]["username"],
            "password" => $configYaml["mysql"]["password"],
        ];
    }
}
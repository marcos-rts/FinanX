<?php
class Config
{
    private static $configFilePath = __DIR__ . '/../config/config.ini';

    public static function load()
    {
        if (!file_exists(self::$configFilePath)) {
            throw new Exception('Arquivo de configuração não encontrado: ' . self::$configFilePath);
        }
        return parse_ini_file(self::$configFilePath, true);
    }

    public static function save($data)
    {
        $content = '';
        foreach ($data as $section => $values) {
            $content .= "[$section]\n";
            foreach ($values as $key => $value) {
                $content .= "$key = \"$value\"\n";
            }
        }
        file_put_contents(self::$configFilePath, $content);
    }
}

?>
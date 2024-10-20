<?php

namespace Paymes;

class Log {
    private $logFile;

    public function __construct() {
        // logs klasörünün yolunu tanımlayın
        $logDir = __DIR__ . '/../logs/';
        
        // logs klasörü yoksa oluştur
        if (!is_dir($logDir)) {
            mkdir($logDir, 0777, true);
        }
        
        $this->logFile = $logDir . 'events.log';
    }

    public function writeEventLog($message) {
        $ip = $_SERVER['REMOTE_ADDR']; 
        $timestamp = date('Y-m-d H:i:s'); 

        // Log kaydını oluştur
        $logEntry = "[$timestamp] IP: $ip - $message" . PHP_EOL;

        // Log kaydını dosyaya yaz
        file_put_contents($this->logFile, $logEntry, FILE_APPEND);
    }
}
?>

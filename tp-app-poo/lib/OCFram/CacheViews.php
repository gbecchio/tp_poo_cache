<?php
namespace OCFram;

class CacheViews extends Cache
{
  const FOLDER = 'views';

  public function createCache($fileName, $input)
  {
    $fp = fopen(self::BASE_PATH.self::FOLDER.'/'.$fileName, 'w');
    fwrite($fp, $this->dateExpiration."\n");
    fwrite($fp, $input);
    fclose($fp);
    return $this->tabTime;
  }
  public function getCache($fileName)
  {
    $filename = self::BASE_PATH.self::FOLDER.'/'.$fileName;
    $handle = fopen($filename, "r");
    $contents = '';

    if ($handle) {
        $i = 0;
        while (($buffer = fgets($handle)) !== false) {
            if ($i == 0)
            {
              $this->setDateExpiration($buffer);
            }
            else
            {
              $contents .= $buffer;
            }
            $i++;
        }
        if (!feof($handle)) {
            echo "Erreur: fgets() a échoué\n";
        }
        fclose($handle);
    }
    return $contents;
  }
}
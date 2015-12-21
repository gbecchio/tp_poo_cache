<?php
namespace OCFram;

class CacheDatas extends Cache
{
  const FOLDER = 'datas';
  
  public function createCache($fileName, $input)
  {
    $fp = fopen(self::BASE_PATH.self::FOLDER.'/'.$fileName, 'w');
    fwrite($fp, $this->dateExpiration."\n");
    fwrite($fp, serialize($input));
    fclose($fp);
    return $fp;
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
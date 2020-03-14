<?
class CustomInit
{
    private $path;
    private $folders = array();
    private $files = array();

    public function __construct()
    {
        $this->path = $_SERVER['DOCUMENT_ROOT'] . "/local/php_interface/include";

        if (!is_dir($this->path)) {
            throw new Exception('Строка:' . __LINE__ . ", файл" . __FILE__ . ": папка include не найдена");
        }
    }

    public function Init()
    {
        if (count($this->folders) > 0) {
            $this->scandirs();
            $this->include_files();
        }
    }

    public function addFolder($folder_name)
    {
        if (is_string($folder_name)) {
            if (!strlen($folder_name)) {
                $dir_path = $this->path;
            } else {
                $dir_path = $this->path . '/' . $folder_name;
            }

            if (is_dir($dir_path)) {
                $this->folders[] = $dir_path;
                return true;
            }
        }
        return false;
    }

    private function scandirs()
    {
        $result = false;
        foreach ($this->folders as $abs_path) {
            $names = scandir($abs_path);
            foreach ($names as $name) {
                if (!in_array($name, array(".", "..")) && is_file($abs_path . "/" . $name)) {
                    $this->files[] = $abs_path . "/" . $name;
                    if (!$result) {
                        $result = true;
                    }
                }
            }
        }
        return $result;
    }

    private function include_files()
    {
        if (count($this->files) > 0) {

            foreach ($this->files as $key => $file_name) {
                include($file_name);
            }

        }
    }
}
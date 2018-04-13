if ($handle = opendir(G5_PATH.'/'.page_piece.'/'.THEMA)) {
    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != "..") {
            echo "$file\n";
        }
    }
    closedir($handle);
}




$dir    = G5_PATH.'/'.page_piece.'/'.THEMA;

$files1 = scandir($dir);
$files2 = scandir($dir, 1);

print_r($files1);
print_r($files2);

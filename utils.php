<?php function convertLinuxPathToWindows($linuxPath, $baseLinux = '/', $baseWindows = '\\')
{
    if ($baseLinux && $baseWindows) {
        $linuxPath = str_replace($baseLinux, $baseWindows, $linuxPath);
    }
    return str_replace('/', '\\', $linuxPath);
}
?>
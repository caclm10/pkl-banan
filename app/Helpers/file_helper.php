<?php


function moveFileToPublic($file, $folderName)
{
    $fileName = $file->getRandomName();
    $filePath = 'uploads' . DIRECTORY_SEPARATOR . $folderName;
    $file->move(ROOTPATH . 'public' . DIRECTORY_SEPARATOR . $filePath, $fileName);

    return $filePath . DIRECTORY_SEPARATOR . $fileName;
}

function deletePublicFile($path)
{
    unlink(ROOTPATH . 'public' . DIRECTORY_SEPARATOR . $path);
}

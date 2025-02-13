<?php
$link = false;

function openDB()
{
    global $link;

    $link = mysqli_connect("localhost", "root", "", "elinskas_portfolio");
    mysqli_query($link, "SET NAMES UTF8");
}

function closeDB()
{
    global $link;
    $link = false;
}

function getContacts()
{
    global $link;
    openDB();

    $result = mysqli_query($link, "SELECT * FROM contacts");

    closeDB();

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getWorkplaces()
{
    global $link;
    openDB();

    $result = mysqli_query($link, "SELECT * FROM work_expirience");

    closeDB();

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getImages()
{
    global $link;
    openDB();

    $result = mysqli_query($link, "SELECT id, image FROM images");

    closeDB();

    if ($result->num_rows > 0) {
        $finfo = finfo_open(FILEINFO_MIME_TYPE); // Инициализация функции для определения MIME-типа

        while ($row = $result->fetch_assoc()) {
            // Определяем MIME-тип изображения
            $imageType = finfo_buffer($finfo, $row['image'], FILEINFO_MIME_TYPE);

            // Преобразуем BLOB в Base64 и сохраняем в массив
            $imageBase64 = base64_encode($row['image']);
            $images[] = [
                'id' => $row['id'],
                'src' => 'data:' . $imageType . ';base64,' . $imageBase64, // Формируем строку для src
                'type' => $imageType // Сохраняем тип изображения (опционально)
            ];
        }

        finfo_close($finfo); // Закрываем ресурс
    } else {
        $images = []; // Если фотографий нет
    }

    return $images;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel=stylesheet type="text/css" href="./css/upload.css">

    <title>Skin Cancer detection System</title>

</head>

<body>
    <section id="header">
        <h1>Skin Cancer detection System</h1>
        <nav id="nav">
            <ul>
                <li class="current"><a href="index.php">Home</a></li>
                <!-- <li><a href="online.php">Online Function</a></li> -->
            </ul>
        </nav>
    </section>
</body>

</html>
<?php
$lesion = array(
    0 => "日光性角化症",
    1 => "基底細胞瘤",
    2 => "脂溢性角化病",
    3 => "皮膚纖維瘤",
    4 => "黑素細胞痣",
    5 => "化膿性肉芽腫 ",
    6 => "黑色素瘤"
);

$lesion_text = array(
    0 => "外觀大多是不規則紅斑，表面角化觸感粗糙伴有厚且難剝離的鱗屑，合併輕微搔癢的症狀",
    1 => "外觀通常會先長出一塊無痛的隆起部分，其上可能佈有具光澤的蛛網紋或是潰瘍。此種癌症的生長速度緩慢，並會損傷其周邊的組織，但不太可能出現遠端轉移，也不太會直接導致死亡。",
    2 => "外觀顏色從淺褐色到黑色不等，通常呈圓形或橢圓形，表面扁平或稍有隆起。大小不定。最主要的特徵是病灶好像油蠟狀粘著在皮膚上一般，有時就像是被蠟燭上的熱油滴到一樣。",
    3 => "外觀顏色因人而異，可能為粉色、棕色、灰色或黑色等，通常呈現皮下的圓形小腫瘤，少部分的皮膚纖維瘤可能會有疼痛、搔癢的感覺。",
    4 => "人類常見的良性腫瘤，發生於皮膚的黑素細胞（痣細胞）。黑素細胞痣的天生攜帶率達到1%，常在2歲後發生。而後天也可能由於紫外線照射等原因產生，一般為良性。",
    5 => "外觀大多呈血紅色的小腫瘤，且觸碰或擠壓非常容易出血。",
    6 => "外觀呈現扁平表淺的不對稱暗色斑塊，直徑通常超過0.6公分"

);
# 檢查檔案是否上傳成功
if ($_FILES['picture']['error'] === UPLOAD_ERR_OK) {
    // echo '檔案名稱: ' . $_FILES['picture']['name'] . '<br/>';
    // echo '檔案類型: ' . $_FILES['picture']['type'] . '<br/>';
    // echo '檔案大小: ' . ($_FILES['picture']['size'] / 1024) . ' KB<br/>';
    // echo '暫存名稱: ' . $_FILES['picture']['tmp_name'] . '<br/>';

    # 檢查檔案是否已經存在
    $file = $_FILES['picture']['tmp_name'];
    $dest = 'upload/' . $_FILES['picture']['name'];

    # 將檔案移至指定位置
    move_uploaded_file($file, $dest);
    // if (file_exists('upload/' . $_FILES['picture']['name'])) {
    //     echo '檔案已存在。<br/>';
    // } else {
    //     $file = $_FILES['picture']['tmp_name'];
    //     $dest = 'upload/' . $_FILES['picture']['name'];

    //     # 將檔案移至指定位置
    //     move_uploaded_file($file, $dest);
    // }
} else {
    echo '錯誤代碼：' . $_FILES['picture']['error'] . '<br/>';
}


$picPath = 'upload/' . $_FILES['picture']['name'];
$ret = exec("python detect.py {$picPath}", $out, $res);

if (!$res) {
    $result = $out[count($out) - 1];
    // echo $result;
    echo "<div id='img'>" .
        '<img src="' . $picPath . '" class = "ct">' .
        '<div id="text"><p>您的皮膚可能有 : ' . "<span class='bold-text'>$lesion[$result]</sapn>" . '</p>
        <p>' . $lesion_text[$result].'</p></div>' .
        '</div>';
}

?>
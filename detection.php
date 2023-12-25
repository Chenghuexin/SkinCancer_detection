<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel=stylesheet type="text/css" href="./css/detection.css">

    <title>Skin Cancer detection System</title>

    <script>
        function showMessageAndRedirect() {
            var messageElement = document.getElementById("message");
            messageElement.style.display = "block";
        }
    </script>
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

    <section id="uploadFile">

        <form method="post" enctype="multipart/form-data"  onsubmit="showMessageAndRedirect();" action="upload.php">

            <div class="mb-3">
                
                <label for="formFile" class="form-label">Upload picture</label>
                <input class="form-control" type="file" id="formFile" name="picture">

                <br>
                <button type="upload" class="btn btn-primary">Submit</button>
            </div>
        </form>

        <div><p id="message" style="display: none; font-size: 2em; margin: 1em;">正在分析，請稍等...</p></div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>

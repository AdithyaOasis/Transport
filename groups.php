


<!DOCTYPE html>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        groups
    </title>
    <link rel="stylesheet" type="text/css" href="index.css">
   <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <script src="bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
</head>
<body style="background-image:url('bg2.jpg')">
    <?php require 'navbar.php' ?>
    
        <div id='search' class='container-fluid' style='position: absolute; top: 30%;'>
            <div class='row'>
                <div class='col-md-4 box' ></div>
                <div class='col-md-4'>
                    search:<input type='text' id='search'> <button id='search'>search</button>
                </div>
            </div>
            <div class='row' style='height: 400px;'>
                <div class='col-md-3'></div>
                <div class='col-md-6 box'>
                    <div class='container-fluid' id='groups'>
                        <div class='row' style='width:100%;height:300px; overflow: scroll;'>
                                <button type='button' class='btn btn-primary btn-block' style='margin:0' href='U_groups.html'>group 1</button>
                                <button type='button' class='btn btn-primary btn-block' style='margin: 0;' href='D_groups.html'>group 2</button>
                                <button type='button' class='btn btn-primary btn-block' style='margin: 0;'>group 3</button>
                                <button type='button' class='btn btn-primary btn-block' style='margin: 0;'>group 4</button>
                                <button type='button' class='btn btn-primary btn-block' style='margin: 0;'>group 5</button>
                                <button type='button' class='btn btn-primary btn-block' style='margin: 0;'>group 6</button>
                                <button type='button' class='btn btn-primary btn-block' style='margin: 0;'>group 7</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        
<script>
var dt = new Date();
document.getElementById("datetime").innerHTML = dt.toLocaleTimeString();
</script>



    </body>
</html>

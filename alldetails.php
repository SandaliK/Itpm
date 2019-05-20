
<?php
$connect = mysqli_connect("localhost","root","root","library");
$query = "SELECT * FROM add_books";
$result = mysqli_query($connect,$query);

while ($row =mysqli_fetch_assoc($result)){
    $json[] = $row;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
</head>
<body>
<h1>
    All Book Details</h1>
<div id="chart7"></div>

<div id="chart7" style="width:100%"></div>
<!-- <button id="print">PDF</button>
 < a href="./charts.pdf" download>Download the pdf</a> -->
<script src ="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<script>
    var chart_data = <?php echo json_encode($json) ?>

        Morris.Bar({
            element: 'chart7',
            data: chart_data,
            xkey: 'booksname',
            ykeys: ['booksqty','booksprice'],
            labels: ['booksauthorname', 'bookspublicationname','booksprice','booksqty'],
        });

    //         $scope.pdf = function(chart){
    //     printMorris(chart);
    // };
    // $('#print').click(function () {
    // printMe();
    // });
    // function printMe() {
    //   xepOnline.Formatter.Format('Bar',{render:'download', srctype:'PNG'});
    //  }

    // function printMorris(chart) {
    //     xepOnline.Formatter.Format(chart, {render:'download', srctype:'png'});
    // }



</script>
</body>
</html>
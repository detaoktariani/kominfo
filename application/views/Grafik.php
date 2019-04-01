 <div id="Graph"> </div>
 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.2.8/raphael.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.2.8/raphael.min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
    <script>
new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'Graph',
          data: <?php echo $data; ?>
                xkey: 'jenisPengadaan',
          ykeys: ['jenisBelanja', 'volume', 'jumlahPagu'],
          labels: ['jenisBelanja', 'volume', 'jumlahPagu']
        });
 </script>
  </body>
</html>

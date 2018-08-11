</div> <!-- END wrapper -->

<!-- Jquery Core Js -->
<script src="public/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="public/plugins/bootstrap/js/bootstrap.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="public/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="public/plugins/node-waves/waves.js"></script>

<!-- Custom Js -->
<script src="public/js/admin.js"></script>
<script src='public/plugins/datatables/jquery.dataTables.min.js'></script>
<script src='public/plugins/datatables/dataTables.buttons.min.js'></script>
<script src='public/plugins/datatables/dataTables.bootstrap.min.js'></script>
<script src="public/plugins/magnific-popup/magnific-popup.js"></script>
<script src="public/plugins/datatables/dataTables.bootstrap.js"></script>
<script src="public/js/wow.min.js"></script>
<script src="public/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="public/js/jquery.scrollTo.min.js"></script>
<script src="public/js/jquery.sparkline.min.js"></script>
<script src="public/js/detect.js"></script>
<script src="public/js/fastclick.js"></script>
<script src="public/js/jquery.blockUI.js"></script>
<script src="public/js/imagething.js"</script>

<script>
$(document).ready(function() {
    $('table.datatable').DataTable();
    $('#list').click(function(event){
      event.preventDefault();
      $('#products .sub-event').removeClass('col-xs-4 col-md-4');
      $('#products .col-input').removeClass('col-xs-8 col-md-8');
      $('#products .item').addClass('list-group-item');
      $('#products .col-input').addClass('col-xs-2 col-md-2');
      $('#products .sub-event').addClass('col-xs-2 col-md-2');
    });
    $('#grid').click(function(event){
      event.preventDefault();
      $('#products .sub-event').removeClass('col-xs-2 col-md-2');
      $('#products .col-input').removeClass('col-xs-2 col-md-2');
      $('#products .item').removeClass('list-group-item');
      $('#products .item').addClass('grid-group-item');
      $('#products .col-input').addClass('col-xs-8 col-md-8');
      $('#products .sub-event').addClass('col-xs-4 col-md-4');
    });
});


</script>
</body>

</html>

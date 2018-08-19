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

<script src="public/js/imagething.js"></script>
<script>
$(document).ready(function() {

    $('table.datatable').DataTable();
    $('table.specialprojects').DataTable({
      'paging': false,
      'searching': false,
      'order': [1,"desc"]
    });
    $('table.reports').DataTable({
      'paging': false,
      'searching': false,
      'order': [4,"desc"]
    });
    $('table.ranking').DataTable({
      'paging': false,
      'searching': false,
      'order': [2,"desc"]
    });
    $('.input-row').css('margin-bottom','5px');
    $('.preList').click(function(event){
      event.preventDefault();
      $('#products .sub-event').removeClass('col-xs-5 col-md-5');
      $('#products .col-input').removeClass('col-xs-7 col-md-7');
      $('#products .item').removeClass('grid-group-item');
      $('#products .item').addClass('list-group-item');
      $('#products .col-input').addClass('col-xs-2 col-md-2');
      $('#products .sub-event').addClass('col-xs-2 col-md-2');
      $('.total').removeClass('col-xs-2 col-md-2');
      $('.total').addClass('col-xs-1 col-md-1');
      $('.input-row').attr('style','height:34px;');
      $('.input-row').css('margin-bottom','5px');
    });
    $('.preGrid').click(function(event){
      event.preventDefault();
      $('.input-row').css('height','');
      $('#products .sub-event').removeClass('col-xs-2 col-md-2');
      $('#products .col-input').removeClass('col-xs-2 col-md-2');
      $('#products .item').removeClass('list-group-item');
      $('#products .item').addClass('grid-group-item');
      $('#products .col-input').addClass('col-xs-7 col-md-7');
      $('#products .sub-event').addClass('col-xs-5 col-md-5');
      $('.total').removeClass('col-xs-1 col-md-1');
      $('.total').addClass('col-xs-5 col-md-5');
    });

    $(".form-line").on("input",".form-control",function(){
      var totalSum = 0;
      var getParam = $(this).attr("class");
      var paramArr = getParam.split(' ');
      rowID = paramArr[4].slice(6);
      prodID = paramArr[4].slice(11);
      themeID = paramArr[4].slice(12);
      eveID = paramArr[4].slice(14);
      seqID = paramArr[4].slice(10);
      initID = paramArr[4].slice(11);
      sqID = paramArr[4].slice(9);
      if(paramArr[0] == 'production'){
        $(".prod_input_"+prodID).each(function(){
            var inputVal = $(this).val();
            if($.isNumeric(inputVal))
              totalSum += parseFloat(inputVal);
        });
        $("#prodTotal"+prodID).attr('value',totalSum);
      }else if(paramArr[0] == 'themewear'){
        $(".theme_input_"+themeID).each(function(){
            var inputVal = $(this).val();
            if($.isNumeric(inputVal))
              totalSum += parseFloat(inputVal);
        });
        $("#themeTotal"+themeID).attr('value',totalSum);
      }else if(paramArr[0] == 'eveninggown'){
        $(".evening_input_"+eveID).each(function(){
            var inputVal = $(this).val();
            if($.isNumeric(inputVal))
              totalSum += parseFloat(inputVal);
        });
        $("#eveningTotal"+eveID).attr('value',totalSum);
      }else if(paramArr[0] == 'seqintrvw'){
        $(".seq_input_"+seqID).each(function(){
            var inputVal = $(this).val();
            if($.isNumeric(inputVal))
              totalSum += parseFloat(inputVal);
        });
        $("#seqTotal"+seqID).attr('value',totalSum);
      }else if(paramArr[0] == 'initintrvw'){
        $(".init_input_"+initID).each(function(){
            var inputVal = $(this).val();
            if($.isNumeric(inputVal))
              totalSum += parseFloat(inputVal);
        });
        $("#initTotal"+initID).attr('value',totalSum);
      }else if(paramArr[0] == 'stanquestion'){
        $(".sq_input_"+sqID).each(function(){
            var inputVal = $(this).val();
            if($.isNumeric(inputVal))
              totalSum += parseFloat(inputVal);
        });
        $("#sqTotal"+sqID).attr('value',totalSum);
      }else{
        $(".input_"+rowID).each(function(){
            var inputVal = $(this).val();
            if($.isNumeric(inputVal))
              totalSum += parseFloat(Number(inputVal).toFixed(2));
        });
        $("#input_total"+rowID).attr('value',totalSum);
      }
    });

    $(".input").click(function(){
      var getParam = $(this).attr("data-rel");
      var paramArr = getParam.split('|');
      var judge = paramArr[0];
      var rowID = paramArr[1];
      var judgeEvent = paramArr[2];
      var values = [];
      var limit = $("#row"+rowID).find("input").length;

      for(var i = 0; i < limit; i++)
        values[i] = $("#row"+rowID).find("input")[i]['value'];

      $.ajax({
        url: "{{url('/saveCandidate')}}",
        type: 'post',
        postType: 'json',
        data: {
          "_token": "{{csrf_token()}}",
          "values": values,
          "row": rowID,
          "judge": judge,
          "event": judgeEvent,
        },
        success:function(data){
            $("#row"+rowID+" .caption #input_success").remove();
            $("#row"+rowID+" .caption").append('<div id="input_success" class="alert alert-success" style="position:absolute;top:0;left: 10px;opacity: .7;padding: 3px;"><p style="color:white;text-align:center;font-size:10px;">Record saved!</p></div>').show(2000);
        },
        async:false
      });
    });
    $('panel').on( 'click', '.add', function () {
      $("#judgeForm").find("input[type=text]").val("");
      $("#JudgeField-Username").attr("onClick='suggestJUsername()'");
      $("#JudgeField-Username").removeAttr('readonly');
    });

    $('#judgeTable tbody').on( 'click', '.edit', function () {
      var judge = $("#judgeTable").DataTable();
      var data = judge.row($(this).parents('tr')).data();
      var split = data[0].split(',');
      $('#JudgeField-FName').val(split[1]);
      $('#JudgeField-LName').val(split[0]);
      $("#JudgeField-Event").val(data[1]);
      $("#JudgeField-Username").val(data[2]);
      $("#JudgeField-Username").removeAttr('onClick');
      $("#JudgeField-Username").attr('readonly',true);
      $(".editMode").val("edit");
    });

    $('#organizerTable tbody').on( 'click', 'a .edit', function () {
      var org = $("#organizerTable").DataTable();
      var data = org.row($(this).parents('tr')).data();
      var split = data[0].split(',');
      $('#OrgField-FName').val(split[1]);
      $('#OrgField-LName').val(split[0]);
      $("#OrgField-Event").val(data[1]);
      $("#OrgField-Username").val(data[3]);
    });
});
</script>
</body>

</html>

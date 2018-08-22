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
      'order': [2,"desc"],
      "info":     false
    });
    $('table.prepReports').DataTable({
      'paging': false,
      'searching': false,
      'order': [5,"desc"],
      "info": false
    });
    $('table.ranking').DataTable({
      'paging': false,
      'searching': false,
      'order': [2,"desc"],
      "info":     false
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
      var getParam = $(this).attr("class").split('input_');
      // console.log(getParam);
      // return false;
      rowID = getParam[1];
      // prodID = final[4].slice(11);
      // themeID = final[4].slice(12);
      // eveID = final[4].slice(14);
      // seqID = final[4].slice(10);
      // initID = final[4].slice(11);
      // sqID = final[4].slice(9);
      // if(paramArr[0] == 'production'){
      //   $(".prod_input_"+prodID).each(function(){
      //       var inputVal = $(this).val();
      //       if($.isNumeric(inputVal))
      //         totalSum += parseFloat(inputVal);
      //   });
      //   $("#prodTotal"+prodID).attr('value',totalSum);
      // }else if(paramArr[0] == 'themewear'){
      //   $(".theme_input_"+themeID).each(function(){
      //       var inputVal = $(this).val();
      //       if($.isNumeric(inputVal))
      //         totalSum += parseFloat(inputVal);
      //   });
      //   $("#themeTotal"+themeID).attr('value',totalSum);
      // }else if(paramArr[0] == 'eveninggown'){
      //   $(".evening_input_"+eveID).each(function(){
      //       var inputVal = $(this).val();
      //       if($.isNumeric(inputVal))
      //         totalSum += parseFloat(inputVal);
      //   });
      //   $("#eveningTotal"+eveID).attr('value',totalSum);
      // }else if(paramArr[0] == 'seqintrvw'){
      //   $(".seq_input_"+seqID).each(function(){
      //       var inputVal = $(this).val();
      //       if($.isNumeric(inputVal))
      //         totalSum += parseFloat(inputVal);
      //   });
      //   $("#seqTotal"+seqID).attr('value',totalSum);
      // }else if(paramArr[0] == 'initintrvw'){
      //   $(".init_input_"+initID).each(function(){
      //       var inputVal = $(this).val();
      //       if($.isNumeric(inputVal))
      //         totalSum += parseFloat(inputVal);
      //   });
      //   $("#initTotal"+initID).attr('value',totalSum);
      // }else if(paramArr[0] == 'stanquestion'){
      //   $(".sq_input_"+sqID).each(function(){
      //       var inputVal = $(this).val();
      //       if($.isNumeric(inputVal))
      //         totalSum += parseFloat(inputVal);
      //   });
      //   $("#sqTotal"+sqID).attr('value',totalSum);
      // }else{
      var max = $(this).attr('max');
      var min = $(this).attr('min');
      var num =  $(this).val();
      //console.log(num);
      if(parseFloat(num)<min || parseFloat(num)>max ){
          $(this).css("background-color","#f2dede");
          $(this).val('').focus();
          $(this).animate(function(){
              $(this).removeAttr("style").an;
          },1000);
      }else
          $(this).removeAttr("style");
        $(".input_"+rowID).each(function(){
            var inputVal = $(this).val();
            if($.isNumeric(inputVal))
              totalSum += parseFloat(inputVal);
        });
        $("#input_total"+rowID).attr('value',totalSum);
      // }
    });

    $(".input").click(function(){
      var getParam = $(this).attr("data-rel");
      var paramArr = getParam.split('|');
      var judge = paramArr[0];
      var rowID = paramArr[1];
      var judgeEvent = paramArr[2];
      var values = [];

      if(judgeEvent == "Special Projects"){
        var limit = $("#sprow"+rowID).find("input").length;
        for(var i = 0; i < limit; i++)
          values[i] = $("#sprow"+rowID).find("input")[i]['value'];
      }else if(judgeEvent == "Press Launch"){
        var limit = $("#plrow"+rowID).find("input").length;
        for(var i = 0; i < limit; i++)
          values[i] = $("#plrow"+rowID).find("input")[i]['value'];
      }else{
        var limit = $("#row"+rowID).find("input").length;
        for(var i = 0; i < limit; i++)
          values[i] = $("#row"+rowID).find("input")[i]['value'];
      }

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
            if(judgeEvent == "Special Projects"){
              $("#sprow"+rowID+" .caption #input_success").remove();
              $("#sprow"+rowID+" .caption").append('<div id="input_success" class="alert alert-success" style="position:absolute;top:0;left: 10px;opacity: .7;padding: 3px;"><p style="color:white;text-align:center;font-size:10px;">Score saved!</p></div>').show(2000);
            }else if(judgeEvent == "Press Launch"){
              $("#plrow"+rowID+" .caption #input_success").remove();
              $("#plrow"+rowID+" .caption").append('<div id="input_success" class="alert alert-success" style="position:absolute;top:0;left: 10px;opacity: .7;padding: 3px;"><p style="color:white;text-align:center;font-size:10px;">Score saved!</p></div>').show(2000);
            }else{
              $("#row"+rowID+" .caption #input_success").remove();
              $("#row"+rowID+" .caption").append('<div id="input_success" class="alert alert-success" style="position:absolute;top:0;left: 10px;opacity: .7;padding: 3px;"><p style="color:white;text-align:center;font-size:10px;">Score saved!</p></div>').show(2000);
            }

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

    $("button.btnRanking").click(function(e){
      // e.stopPropagation();

      var x = $(this).attr("data-rel");
      if(x == "pl"){
        $("table.ranking").dataTable().fnDestroy();
        $(".ranking").find("th.sprs,td.sprs").hide();
        $(".ranking").find("th.plrs,td.plrs").show();
        refreshTable(3);

      }
      else if(x == 'sp'){
        $("table.ranking").dataTable().fnDestroy();
        $(".ranking").find("th.plrs,td.plrs").hide();
        $(".ranking").find("th.sprs,td.sprs").show();
        refreshTable(2);

      }

      function refreshTable(col){
        $('table.ranking').DataTable({
          'paging': false,
          'searching': false,
          'order': [col,"desc"]
        });
      }
    });
});
</script>
</body>

</html>

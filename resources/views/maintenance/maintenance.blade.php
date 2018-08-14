@extends('layouts.master')
@section('content')
  <section class="content">
    <div class="row clearfix">
        <div class="col-lg-12">
            <ul class="nav nav-tabs tabs">
                <li class="active tab">
                    <a href="#judge" data-toggle="tab" aria-expanded="false">
                        <span class="visible-xs"><i class="fa fa-home"></i></span>
                        <span class="hidden-xs">Judge</span>
                    </a>
                </li>
                <li class="tab">
                    <a href="#organizer" data-toggle="tab" aria-expanded="false">
                        <span class="visible-xs"><i class="fa fa-user"></i></span>
                        <span class="hidden-xs">Organizer</span>
                    </a>
                </li>
                <li class="tab">
                    <a href="#candidate" data-toggle="tab" aria-expanded="true">
                        <span class="visible-xs"><i class="fa fa-envelope-o"></i></span>
                        <span class="hidden-xs">Candidates</span>
                    </a>
                </li>
                <li class="tab">
                    <a href="#events" data-toggle="tab" aria-expanded="true">
                        <span class="visible-xs"><i class="fa fa-envelope-o"></i></span>
                        <span class="hidden-xs">Events</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="judge">
                  <div class="container">
                      <!-- Page-Title -->
                      <div class="row">
                          <div class="col-sm-12">
                              <h4 class="pull-left page-title">Judges Table</h4>
                          </div>
                      </div>
                      <div class="panel">
                          <div class="panel-body">
                              <div class="row">
                                  <div class="col-sm-6">
                                      <div class="m-b-30">
                                          <button id="add" data-toggle="modal" data-target="#judgeModal" class="btn btn-primary waves-effect waves-light">Add <i class="fa fa-plus"></i></button>
                                      </div>
                                  </div>
                              </div>
                              <table class="table table-bordered datatable table-striped">
                                  <thead>
                                      <tr>
                                          <th>Name</th>
                                          <th>Event</th>
                                          <th>Username</th>
                                          <th>Password</th>
                                          <th>Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($judges as $key)
                                    <tr class="gradeX">
                                      <td><p>{{$key->lName}}, {{$key->fName}} {{$key->mName}}</p></td>
                                      <td>{{$key->event}}</td>
                                      <td>{{$key->username}}</td>
                                      <td>{{$key->password}}</td>
                                      <td class="actions">
                                        <a href="#" data-rel="{{$key->id}}" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
                                        <a href="#" data-rel="{{$key->id}}" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
                                      </td>
                                    </tr>
                                    @endforeach
                                  </tbody>
                              </table>
                          </div>
                          <!-- end: page -->
                      </div> <!-- end Panel -->
                  </div> <!-- container -->
                </div><!-- end of judge pane -->
                <div class="tab-pane" id="organizer">
                  <div class="container">
                      <!-- Page-Title -->
                      <div class="row">
                          <div class="col-sm-12">
                              <h4 class="pull-left page-title">Organizers Table</h4>
                          </div>
                      </div>


                      <div class="panel">
                          <div class="panel-body">
                              <div class="row">
                                  <div class="col-sm-6">
                                      <div class="m-b-30">
                                          <button id="add" data-toggle="modal" data-target="#organizerModal" class="btn btn-primary waves-effect waves-light">Add <i class="fa fa-plus"></i></button>
                                      </div>
                                  </div>
                              </div>
                              <table class="table table-bordered datatable table-striped">
                                  <thead>
                                      <tr>
                                          <th>Name</th>
                                          <th>Position</th>
                                          <th>Roles</th>
                                          <th>Username</th>
                                          <th>Password</th>
                                          <th>Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($organizers as $key)
                                    <tr class="gradeX">
                                      <td><p>{{$key->lName}} ,{{$key->fName}} {{$key->mName}}</p></td>
                                      <td>{{$key->position}}</td>
                                      <td>{{$key->roles}}</td>
                                      <td>{{$key->username}}</td>
                                      <td>{{$key->password}}</td>
                                      <td class="actions">
                                        <a href="#" data-rel="{{$key->id}}" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
                                        <a href="#" data-rel="{{$key->id}}" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
                                      </td>
                                    </tr>
                                    @endforeach
                                  </tbody>
                              </table>
                          </div>
                          <!-- end: page -->
                      </div> <!-- end Panel -->
                  </div> <!-- container -->
                </div><!-- end of organizer pane -->
                <div class="tab-pane" id="candidate">
                  <div class="container">
                      <!-- Page-Title -->
                      <div class="row">
                          <div class="col-sm-12">
                              <h4 class="pull-left page-title">Candidates Table</h4>
                          </div>
                      </div>


                      <div class="panel">

                          <div class="panel-body">
                              <div class="row">
                                  <div class="col-sm-6">
                                      <div class="m-b-30">
                                          <button id="add" data-toggle="modal" data-target="#candidateModal" class="btn btn-primary waves-effect waves-light">Add <i class="fa fa-plus"></i></button>
                                      </div>
                                  </div>
                              </div>
                              <table class="table table-bordered table-striped datatable">
                                  <thead>
                                      <tr>
                                        <th>Image</th>
                                        <th>Candidate No.</th>
                                        <th>College</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($candidates as $key)
                                    <tr class="gradeX">
                                      <td><img src="{{$key->image}}" alt="User" width="64px" length="64px" style="border-radius: 50%;"/></td>
                                      <td>{{$key->id}}</td>
                                      <td>{{$key->college}}</td>
                                      <td><p>{{$key->lName}}, {{$key->fName}} {{$key->mName}}</p></td>
                                      <td class="actions">
                                        <a href="#" data-rel="{{$key->id}}" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
                                        <a href="#" data-rel="{{$key->id}}" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
                                      </td>
                                    </tr>
                                    @endforeach
                                  </tbody>
                              </table>
                          </div>
                          <!-- end: page -->
                      </div> <!-- end Panel -->
                  </div> <!-- container -->
                </div><!-- end of candidate pane -->
                <div class="tab-pane" id="events">
                  <div class="container">
                      <!-- Page-Title -->
                      <div class="row">
                          <div class="col-sm-12">
                              <h4 class="pull-left page-title">Events Table</h4>
                          </div>
                      </div>
                      <div class="panel">
                          <div class="panel-body">
                              <div class="row">
                                  <div class="col-sm-6">
                                      <div class="m-b-30">
                                        <button id="print" data-toggle="modal" data-target="#MyModal" class="btn btn-primary waves-effect waves-light">Print <i class="fa fa-print"></i></button>
                                      </div>
                                  </div>
                              </div>

                              <table id="eventsTable" class="table table-bordered table-striped datatable">
                                  <thead>
                                      <tr>
                                        <th>Judge</th>
                                        <th>Candidate</th>
                                        <th>Special Project (Raw Score)</th>
                                        <th>Special Project (Percentage)</th>
                                        <th>Talent (Raw Score)</th>
                                        <th>Talent (Percentage)</th>
                                        <th>P Speech (Raw Score)</th>
                                        <th>P Speech (Percentage)</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($prepageants as $key)
                                    <tr class="gradeX">
                                      <td>{{$key->judge}}</td>
                                      <td>{{$key->candidate}}</td>
                                      <td>{{$key->SP_RS}}</td>
                                      <td>{{$key->SP_Prcnt}}</td>
                                      <td>{{$key->Talent_RS}}</td>
                                      <td>{{$key->Talent_Prcnt}}</td>
                                      <td>{{$key->PSPch_RS}}</td>
                                      <td>{{$key->PSpch_Prcnt}}</td>
                                      <!-- <td class="actions">
                                        <a href="#" data-rel="{{$key->id}}" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
                                        <a href="#" data-rel="{{$key->id}}" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
                                      </td> -->
                                    </tr>
                                    @endforeach
                                  </tbody>
                              </table>
                          </div>
                          <!-- end: page -->
                      </div> <!-- end Panel -->
                  </div> <!-- container -->
                </div>
            </div>
        </div>
    </div>
  </section>
  <!-- M O D A L S -->
  <div id="judgeModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title">Add Judge</h4>
              </div>
              <div class="modal-body">
                <form action="{{url('/addJudge')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="JudgeField-FName" class="control-label">First Name</label>
                              <input type="text" class="form-control" id="JudgeField-FName" name="fName">
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="JudgeField-MName" class="control-label">Middle Name</label>
                              <input type="text" class="form-control" id="JudgeField-MName" name='mName'>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="JudgeField-LName" class="control-label">Last Name</label>
                              <input type="text" class="form-control" id="JudgeField-LName" name='lName'>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-4" class="control-label">Event</label>
                            <select class="full-width form-control input-block" data-init-plugin="select2" name='event'>
                              <option>Talent</option>
                              <option>Speech</option>
                              <option>Final</option>
                            </select>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="JudgeField-Username" class="control-label">Username</label>
                              <input type="text" class="form-control" id="JudgeField-Username" name='username' onClick='suggestJUsername()'>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="JudgeField-Password" class="control-label">Password</label>
                              <input type="password" class="form-control" id="JudgeField-Password" name='password'>
                          </div>
                      </div>
                  </div>

              </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info waves-effect waves-light">Save changes</button>
                </div>
              </form>
          </div>
      </div>
  </div><!-- /.modal -->
  <div id="organizerModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title">Add Organizer</h4>
              </div>
              <div class="modal-body">
                <form action="{{url('/addOrganizer')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="OrgField-FName" class="control-label">First Name</label>
                              <input type="text" class="form-control" id="OrgField-FName" name='fName'>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="OrgField-MName" class="control-label">Middle Name</label>
                              <input type="text" class="form-control" id="OrgField-MName" name='mName'>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="OrgField-LName" class="control-label">Last Name</label>
                              <input type="text" class="form-control" id="OrgField-LName" name='lName'>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-4" class="control-label">Position</label>
                            <select class="full-width form-control input-block" data-init-plugin="select2" name='position'>
                              <option>Chair</option>
                              <option>Vice-Chair</option>
                              <option>Committee Head</option>
                              <option>Others</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <div class="checkbox checkbox-success">
                          <input id="checkbox1" type="checkbox" value="admin" name="roles[]">
                          <label for="checkbox1">
                              Admin
                          </label>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="checkbox checkbox-primary">
                          <input id="checkbox2" type="checkbox" value="judge" name="roles[]">
                          <label for="checkbox2">
                              Judge
                          </label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="OrgField-Username" class="control-label">Username</label>
                              <input type="text" class="form-control" id="OrgField-Username" name='username' onClick="suggestOrgUsername()">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="OrgField-Password" class="control-label">Password</label>
                              <input type="password" class="form-control" id="OrgField-Password" name='password'>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-info waves-effect waves-light">Save changes</button>
                </form>
              </div>
          </div>
      </div>
  </div><!-- /.modal -->
  <div id="candidateModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title">Add Candidate</h4>
              </div>
              <div class="modal-body">
                <form action="{{url('/Candidate')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                    <label for="imageUpload"></label>
                                </div>
                                <div class="avatar-preview">
                                    <div id="imagePreview" style="background-image: url(public/css/images/testImg.jpg);">
                                    </div>
                                </div>
                            </div>
                          </div>
                      </div>


                  </div>
                  <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="field-1" class="control-label">First Name</label>
                              <input type="text" class="form-control" id="field-1" name='fName'>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="field-2" class="control-label">Middle Name</label>
                              <input type="text" class="form-control" id="field-2" name='mName'>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="field-3" class="control-label">Last Name</label>
                              <input type="text" class="form-control" id="field-3" name='lName'>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-4" class="control-label">College</label>
                            <select class="full-width form-control input-block" data-init-plugin="select2" name='position'>
                              @foreach($colleges as $key)

                                <option>{{$key->collegeName}}</option>

                              @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-5" class="control-label">School Year</label>
                            <input type="text" class="form-control" id="field-5" name='SY'>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-6" class="control-label">Candidate Number</label>
                            <input type="text" class="form-control" id="field-6" name='number'>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="field-8" class="control-label">Username</label>
                              <input type="text" class="form-control" id="field-8" name='username'>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="field-9" class="control-label">Password</label>
                              <input type="password" class="form-control" id="field-9" name='password'>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-info waves-effect waves-light">Save changes</button>
                </form>
              </div>
          </div>
      </div>
  </div><!-- /.modal -->
  <!-- <div id="printModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title">Print</h4>
              </div>
              <div class="modal-body">
                <h1>Print.</h1>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-info waves-effect waves-light" onclick="myFunction()"><i class="fa fa-print"></i></button>
                </form>
              </div>
          </div>
      </div>
  </div> -->
  <!---------------------->
}

<!---------------------->
<!-- <div class="wrap">
  <h1>Bootstrap Modal Example</h1>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#MyModal">
    Large modal
  </button>
</div> -->
 <div id="printThis">
   <div id="MyModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

      <div class="modal-dialog modal-lg">

      <!-- Modal Content: begins -->
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="gridSystemModalLabel">Reports</h4>
        </div>

        <!-- Modal Body -->
        <div class="modal-body">
          <table>
              <thead>
                  <tr>
                    <th>Judge</th>
                    <th>Candidate</th>
                    <th>Special Project (Raw Score)</th>
                    <th>Special Project (Percentage)</th>
                    <th>Talent (Raw Score)</th>
                    <th>Talent (Percentage)</th>
                    <th>P Speech (Raw Score)</th>
                    <th>P Speech (Percentage)</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($prepageants as $key)
                <tr class="gradeX">
                  <td>{{$key->judge}}</td>
                  <td>{{$key->candidate}}</td>
                  <td>{{$key->SP_RS}}</td>
                  <td>{{$key->SP_Prcnt}}</td>
                  <td>{{$key->Talent_RS}}</td>
                  <td>{{$key->Talent_Prcnt}}</td>
                  <td>{{$key->PSPch_RS}}</td>
                  <td>{{$key->PSpch_Prcnt}}</td>
                  <!-- <td class="actions">
                    <a href="#" data-rel="{{$key->id}}" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
                    <a href="#" data-rel="{{$key->id}}" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
                  </td> -->
                </tr>
                @endforeach
              </tbody>
          </table>
        </div>

        <!-- Modal Footer -->
        <div class="modal-footer">
         <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        <button id="btnPrint" type="button" class="btn btn-default">Print</button>
        </div>

      </div>
      <!-- Modal Content: ends -->

  </div>
    </div>
</div>



  </div>
    </div>
</div>


  <!-- /.modal -->



<script src="public/js/dataTables.buttons.min.js"></script>
<script type="text/­javascript" src="https://­ajax.googleapis.com/­ajax/libs/jquery/­3.3.1/jquery.min.js"></script>
<script>
function suggestJUsername()
    {

        const fName = document.getElementById('JudgeField-FName').value;
        const lName = document.getElementById('JudgeField-LName').value;
        const txt_Username = document.getElementById('JudgeField-Username');

        const rand = (Math.floor(Math.random() * 10000) % 10000).toString();

        usernameString = fName[0] + lName + rand.padStart(4,'0');

        txt_Username.value = usernameString.toLowerCase();

    }

function suggestOrgUsername()
    {

        const fName = document.getElementById('OrgField-FName').value;
        const lName = document.getElementById('OrgField-LName').value;
        const txt_Username = document.getElementById('OrgField-Username');

        const rand = (Math.floor(Math.random() * 10000) % 10000).toString();

        usernameString = fName[0] + lName + rand.padStart(4,'0')

        txt_Username.value = usernameString.toLowerCase();

    }
  function myFunction() {
    window.print();
  }

  document.getElementById("btnPrint").onclick = function () {
    printElement(document.getElementById("printThis"));
}

  function printElement(elem) {
      var domClone = elem.cloneNode(true);

      var $printSection = document.getElementById("printSection");

      if (!$printSection) {
          var $printSection = document.createElement("div");
          $printSection.id = "printSection";
          document.body.appendChild($printSection);
      }

      $printSection.innerHTML = "";
      $printSection.appendChild(domClone);
      window.print();
}
</script>
@endsection

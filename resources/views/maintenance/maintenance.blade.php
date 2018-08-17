@extends('layouts.master')

@section('content')
<style>
    .bordered {
        border: 1px solid black;
        border-collapse: collapse;
        padding : 4px;
    }
    .numfield{
        text-align : right;
    }
    .percentField{
        text-align : center;
    }
</style>
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
                    <a href="#reports" data-toggle="tab" aria-expanded="true">
                        <span class="visible-xs"><i class="fa fa-envelope-o"></i></span>
                        <span class="hidden-xs">Reports</span>
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
                                          <th>Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($judges as $key)
                                    <tr class="gradeX">
                                      <td><p>{{$key->lName}}, {{$key->fName}} {{$key->mName}}</p></td>
                                      <td>{{$key->event}}</td>
                                      <td>{{$key->username}}</td>
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
                                      <td>{{$key->collegeName}}</td>
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
                <div class="tab-pane" id="reports">
                  <div class="container">
                      <!-- Page-Title -->
                      <div class="row">
                          <div class="col-sm-12">
                              <h2 class="pull-left page-title">Reports</h2>
                          </div>
                      </div>
                      <div class="panel">
                        <div class="col-lg-12">
                            <div class="tabs-vertical-env col-md-12">
                                <ul class="nav tabs-vertical">
                                    <li class="active">
                                        <a href="#evt-pre" data-toggle="tab" aria-expanded="false">Prepageant</a>
                                    </li>
                                    <li class="">
                                        <a href="#evt-final" data-toggle="tab" aria-expanded="false">Pageant Night</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="evt-pre">
                                        <!-- Page-Title -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h4 class="pull-left page-title">Prepageant Report</h4>
                                            </div>
                                        </div>
                                        <div class="panel col-sm-12">
                                            <div class="panel-body">
                                                <ul class="nav nav-tabs tabs">
                                                    <li class="active tab">
                                                        <a href="#evt-pre-sp" data-toggle="tab">
                                                            <span class="visible-xs"><i class="fa fa-home"></i></span>
                                                            <span class="hidden-xs">Special Projects</span>
                                                        </a>
                                                    </li>
                                                    <li class="tab">
                                                        <a href="#evt-pre-talent" data-toggle="tab">
                                                            <span class="visible-xs"><i class="fa fa-home"></i></span>
                                                            <span class="hidden-xs">Talent</span>
                                                        </a>
                                                    </li>
                                                    <li class="tab">
                                                        <a href="#evt-pre-speech" data-toggle="tab">
                                                            <span class="visible-xs"><i class="fa fa-home"></i></span>
                                                            <span class="hidden-xs">Speech</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div class = "tab-content">
                                                    <div class="tab-pane active" id="evt-pre-sp">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="m-b-30">
                                                                    <button id="btnPrint_PP_SP" data-toggle="modal" data-target="#PPModal" class="btn btn-primary waves-effect waves-light">Print <i class="fa fa-print"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <table id="eventsTable-SP" class="table table-bordered table-striped datatable">
                                                            <thead>
                                                                <tr>
                                                                    <th>Judge</th>
                                                                    <th>Candidate</th>
                                                                    <th>Special Project (Raw Score)</th>
                                                                    <th>Special Project (Percentage)</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($prepageants as $key)
                                                                <tr class="gradeX">
                                                                    <td>{{$key->judge}}</td>
                                                                    <td>{{$key->candidate}} -- {{strtoupper($key->lName)}}, {{$key->fName}} [{{$key->collegeCode}}]</td>
                                                                    <td>{{$key->SP_RS}}</td>
                                                                    <td>{{$key->SP_Prcnt}}</td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div><!--end of special projects pane-->
                                                    <div class="tab-pane" id="evt-pre-talent">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="m-b-30">
                                                                    <button id="btnPrint_PP_talent" data-toggle="modal" data-target="#PPModal" class="btn btn-primary waves-effect waves-light">Print <i class="fa fa-print"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <table id="eventsTable-talent" class="table table-bordered table-striped datatable">
                                                            <thead>
                                                                <tr>
                                                                    <th>Judge</th>
                                                                    <th>Candidate</th>
                                                                    <th>Talent (Raw Score)</th>
                                                                    <th>Talent (Percentage)</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($prepageants as $key)
                                                                <tr class="gradeX">
                                                                <td>{{$key->judge}}</td>
                                                                <td>{{$key->candidate}} -- {{strtoupper($key->lName)}}, {{$key->fName}} [{{$key->collegeCode}}]</td>
                                                                <td>{{$key->Talent_RS}}</td>
                                                                <td>{{$key->Talent_Prcnt}}</td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div><!--end of talent pane-->
                                                    <div class="tab-pane" id="evt-pre-speech">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="m-b-30">
                                                                    <button id="btnPrint_PP_speech" data-toggle="modal" data-target="#PPModal" class="btn btn-primary waves-effect waves-light">Print <i class="fa fa-print"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <table id="eventsTable-speech" class="table table-bordered table-striped datatable">
                                                            <thead>
                                                                <tr>
                                                                    <th>Judge</th>
                                                                    <th>Candidate</th>
                                                                    <th>P Speech (Raw Score)</th>
                                                                    <th>P Speech (Percentage)</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($prepageants as $key)
                                                                <tr class="gradeX">
                                                                    <td>{{$key->judge}}</td>
                                                                    <td>{{$key->candidate}} -- {{strtoupper($key->lName)}}, {{$key->fName}} [{{$key->collegeCode}}]</td>
                                                                    <td>{{$key->PSPch_RS}}</td>
                                                                    <td>{{$key->PSpch_Prcnt}}</td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div><!--end of speech pane-->
                                                </div>
                                            </div>
                                            <!-- end: page -->
                                        </div> <!-- end Panel -->
                                    </div> <!-- end of event-prepageant pane -->
                                    <div class="tab-pane" id="evt-final">
                                        <!-- Page-Title -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h4 class="pull-left page-title">Pageant Night Report</h4>
                                            </div>
                                        </div>
                                        <div class="panel">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="m-b-30">
                                                            <button id="btnPrint_FN" data-toggle="modal" data-target="#FNModal" class="btn btn-primary waves-effect waves-light">Print <i class="fa fa-print"></i></button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <table id="eventsTable" class="table table-bordered table-striped datatable">
                                                    <thead>
                                                        <tr>
                                                            <th>Judge</th>
                                                            <th>Candidate</th>
                                                            <th>Production (Raw Score)</th>
                                                            <th>Production (Percentage)</th>
                                                            <th>Theme Wear (Raw Score)</th>
                                                            <th>Theme Wear (Percentage)</th>
                                                            <th>Evening Gown (Raw Score)</th>
                                                            <th>Evening Gown (Percentage)</th>
                                                            <th>Initial Score Subtotal</th>
                                                            <th>Content (Raw Score)</th>
                                                            <th>Content (Percentage)</th>
                                                            <th>Confidence (Raw Score)</th>
                                                            <th>Confidence (Percentage)</th>
                                                            <th>Wit (Raw Score)</th>
                                                            <th>Wit (Percentage)</th>
                                                            <th>SQ Subtotal</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($initScores as $key)
                                                        <tr class="gradeX">
                                                            <td>{{$key->judge}}</td>
                                                            <td>{{$key->candidate}}</td>
                                                            <td>{{$key->IS_Production_RS}}</td>
                                                            <td>{{$key->IS_Production_Prcnt}}</td>
                                                            <td>{{$key->IS_ThemeWr_RS}}</td>
                                                            <td>{{$key->IS_ThemeWr_Prcnt}}</td>
                                                            <td>{{$key->IS_EveGown_RS}}</td>
                                                            <td>{{$key->IS_EveGown_Prcnt}}</td>
                                                            <td>{{$key->IS_Subtotal}}</td>
                                                            <td>{{$key->SQ_Content_RS}}</td>
                                                            <td>{{$key->SQ_Content_Prcnt}}</td>
                                                            <td>{{$key->SQ_Confidence_RS}}</td>
                                                            <td>{{$key->SQ_Confidence_Prcnt}}</td>
                                                            <td>{{$key->SQ_Wit_RS}}</td>
                                                            <td>{{$key->SQ_Wit_Prcnt}}</td>
                                                            <td>{{$key->SQ_Subtotal}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- end: page -->
                                        </div> <!-- end Panel -->
                                    </div> <!-- end of event-final pane -->
                                </div> <!-- end of tab-content -->
                            </div>
                        </div>
                      </div>
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

<!---------------------->
<!-- <div class="wrap">
  <h1>Bootstrap Modal Example</h1>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#MyModal">
    Large modal
  </button>
</div> -->
<div id="printPP">
    <table>
        <tr>
            <th class="bordered">Judge</th>
            <th class="bordered">Candidate</th>
            <th class="bordered">Special Project (Raw Score)</th>
            <th class="bordered">Special Project (Percentage)</th>
            <th class="bordered">Talent (Raw Score)</th>
            <th class="bordered">Talent (Percentage)</th>
            <th class="bordered">P Speech (Raw Score)</th>
            <th class="bordered">P Speech (Percentage)</th>
        </tr>
        @foreach($prepageants as $key)
        <tr class="gradeX">
            <td class="bordered">{{$key->judge}}</td>
            <td class="bordered">{{$key->candidate}} -- {{strtoupper($key->lName)}} [{{$key->collegeCode}}]</td>
            <td class="bordered numfield">{{$key->SP_RS}}</td>
            <td class="bordered percentField">{{$key->SP_Prcnt}}</td>
            <td class="bordered numfield">{{$key->Talent_RS}}</td>
            <td class="bordered percentField">{{$key->Talent_Prcnt}}</td>
            <td class="bordered numfield">{{$key->PSPch_RS}}</td>
            <td class="bordered percentField">{{$key->PSpch_Prcnt}}</td>
        </tr>
        @endforeach
    </table>
</div>


<div id="printFN" hidden>
    <table>
        <thead>
            <tr>
                <th class="bordered">Judge</th>
                <th class="bordered">Candidate</th>
                <th class="bordered">Production (Raw Score)</th>
                <th class="bordered">Production (Percentage)</th>
                <th class="bordered">Theme Wear (Raw Score)</th>
                <th class="bordered">Theme Wear (Percentage)</th>
                <th class="bordered">Evening Gown (Raw Score)</th>
                <th class="bordered">Evening Gown (Percentage)</th>
                <th class="bordered">Initial Score Subtotal</th>
                <th class="bordered">Content (Raw Score)</th>
                <th class="bordered">Content (Percentage)</th>
                <th class="bordered">Confidence (Raw Score)</th>
                <th class="bordered">Confidence (Percentage)</th>
                <th class="bordered">Wit (Raw Score)</th>
                <th class="bordered">Wit (Percentage)</th>
                <th class="bordered">SQ Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($initScores as $key)
            <tr class="gradeX">
                <td class="bordered">{{$key->judge}}</td>
                <td class="bordered">{{$key->candidate}}</td>
                <td class="bordered numfield">{{$key->IS_Production_RS}}</td>
                <td class="bordered percentField">{{$key->IS_Production_Prcnt}}</td>
                <td class="bordered numfield">{{$key->IS_ThemeWr_RS}}</td>
                <td class="bordered percentField">{{$key->IS_ThemeWr_Prcnt}}</td>
                <td class="bordered numfield">{{$key->IS_EveGown_RS}}</td>
                <td class="bordered percentField">{{$key->IS_EveGown_Prcnt}}</td>
                <td class="bordered numfield">{{$key->IS_Subtotal}}</td>
                <td class="bordered numfield">{{$key->SQ_Content_RS}}</td>
                <td class="bordered percentField">{{$key->SQ_Content_Prcnt}}</td>
                <td class="bordered numfield">{{$key->SQ_Confidence_RS}}</td>
                <td class="bordered percentField">{{$key->SQ_Confidence_Prcnt}}</td>
                <td class="bordered numfield">{{$key->SQ_Wit_RS}}</td>
                <td class="bordered percentField">{{$key->SQ_Wit_Prcnt}}</td>
                <td class="bordered numfield">{{$key->SQ_Subtotal}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


  </div>
    </div>
</div>


  <!-- /.modal -->



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

    document.getElementById("btnPrint_PP_SP").onclick = function () {
        $printPP = document.getElementById("printPP");
        $printPP.hidden = false;
        printElement($printPP);
        $printPP.hidden = true;
    }

    document.getElementById("btnPrint_PP_talent").onclick = function () {
        $printPP = document.getElementById("printPP");
        $printPP.hidden = false;
        printElement($printPP);
        $printPP.hidden = true;
    }

    document.getElementById("btnPrint_PP_speech").onclick = function () {
        $printPP = document.getElementById("printPP");
        $printPP.hidden = false;
        printElement($printPP);
        $printPP.hidden = true;
    }


    document.getElementById("btnPrint_FN").onclick = function () {
        $printFN = document.getElementById("printFN");
        $printFN.hidden = false;
        printElement($printFN);
        $printFN.hidden = true;
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

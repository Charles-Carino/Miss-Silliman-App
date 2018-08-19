<?php
    $collegeCode = ["CBA","CAS","MED","HS","CED","MASSCOMM","COPVA","GRAD","IRS","NURSING"];
    $name = [
        "Mikhaella",
        "Christine",
        "Oghogho",
        "Erica",
        "Shannel",
        "Ivy",
        "Chanel",
        "Yihui",
        "Amidala",
        "Gabrielle"
    ];
    $picSrc = [
        "public/css/images/CBA.png",
        "public/css/images/CAS.png",
        "public/css/images/SUMS.png",
        "public/css/images/SUHS.png",
        "public/css/images/CED.png",
        "public/css/images/CMC.png",
        "public/css/images/COPVA.png",
        "public/css/images/GRAD.png",
        "public/css/images/IRS.png",
        "public/css/images/SUCN.png",
    ];
    $explode = explode(",",Auth::user()->roles);
    // dd(in_array("judge",$explode));
?>
@extends('layouts.master')
@section('content')
<section class="content">
  <div class="row clearfix">
      <!-- Start content -->
      <div class="content">
          <div class="container">
            <div class="col-lg-12">
                <ul class="nav nav-tabs tabs tabs-top">
                    <!-- <li class="tab">
                        <a href="#candidateInfo" data-toggle="tab" aria-expanded="false">
                            <span class="visible-xs"><i class="fa fa-home"></i></span>
                            <span class="hidden-xs">Participant</span>
                        </a>
                    </li> -->
                    @if(Auth::user()->userType == "organizer")
                    <li class="active tab">
                        <a href="#pressLaunch" data-toggle="tab" aria-expanded="false">
                            <span class="visible-xs"><i class="fa fa-user"></i></span>
                            <span class="hidden-xs">Press Launch</span>
                        </a>
                    </li>
                    @if(in_array("judge",$explode))
                    <li class="tab">
                        <a href="#prePageant_specialProjects" data-toggle="tab" aria-expanded="false">
                            <span class="visible-xs"><i class="fa fa-user"></i></span>
                            <span class="hidden-xs">Special Projects</span>
                        </a>
                    </li>
                    @endif
                    @endif
                    <!-- <li class="tab">
                        <a href="#finals" data-toggle="tab" aria-expanded="false">
                            <span class="visible-xs"><i class="fa fa-cog"></i></span>
                            <span class="hidden-xs">Finals</span>
                        </a>
                    </li> -->
                </ul>
                <div class="tab-content col-lg-12">
                    @if(Auth::user()->event == "Talent")
                    <div class="tab-pane active" id="prePageant_talent">
                      <h3>Talent</h3>
                      <div class="well well-sm">
                        <div class="row">
                          <div class="col-xs-1 col-md-1">
                            <strong>Display</strong>
                          </div>
                          <div class="col-xs-3 col-md-3 btn-group">
                              <a href="#" id="grid" class="btn btn-default btn-sm preGrid"><span
                                  class="glyphicon glyphicon-th"></span>Grid</a>
                              <a href="#" id="list" class="btn btn-default btn-sm preList"><span class="glyphicon glyphicon-th-list">
                              </span>List</a>
                          </div>
                          @if($candidates[0]->read == "readonly")
                          <div class="col-xs-8 col-md-8">
                            <button id="btnRanking" data-toggle="modal" data-target="#ranking" type="button" class="btn btn-xs btn-danger waves-effect" style="float: right;">
                                <i class="material-icons">person</i>
                                <span>Ranking</span>
                            </button>
                          </div>
                          @endif
                        </div>
                      </div>
                      <div id="products" class="row-fluid list-group">
                        <form action="{{url('/addScores')}}" method="post" enctype="multipart/form-data">
                          @csrf
                          <input type="hidden" name="judge" value="{{Auth::user()->id}}" />
                          <input type="hidden" name="event" value="{{Auth::user()->event}}" />
                          @foreach($candidates as $key)
                          @if($key->seqTalent == 9)
                          <!-- <div id="row{{$key->id}}" class="item col-xs-3 col-lg-3" style="clear: left;"> -->
                          <div id="row{{$key->id}}" class="item col-xs-3 col-lg-3">
                          @else
                          <div id="row{{$key->id}}" class="item col-xs-3 col-lg-3">
                          @endif
                            <div class="thumbnail">
                                <a class="canInfo" href="#defaultModal" data-toggle="modal"><img data-rel="img{{$key->id}}" class="group list-group-image" src="{{$key->image}}" width="200"/></a>
                                <div class="caption">
                                        <h5 class="group inner list-group-item-heading" style="margin-bottom: 0">{{$key->fName}} {{$key->lName}}</h5>
                                    <hr />
                                    <div class="row input-row">
                                        <div class="col-xs-5 col-md-5 sub-event">
                                            <p class="lead">Confidence</p>
                                        </div>
                                        <div class="col-xs-7 col-md-7 col-input form-line focused">
                                            <input type="number" name="confidence_{{$key->id}}" class="col-xs-7 col-md-7 form-control input_{{$key->id}}" name="number" required="" aria-required="true" aria-invalid="false" step='0.01' placeholder="0.00" min="0" max="25" value="{{$key->Talent_Confidence}}" {{$key->read}}>
                                        </div>
                                    </div>
                                    <div class="row input-row">
                                        <div class="col-xs-5 col-md-5 sub-event">
                                            <p class="lead">Mastery</p>
                                        </div>
                                        <div class="col-xs-7 col-md-7 col-input form-line focused">
                                            <input type="number" name="mastery_{{$key->id}}" class="col-xs-7 col-md-7 form-control input_{{$key->id}}" name="number" required="" aria-required="true" aria-invalid="false" step='0.01' placeholder="0.00" min="0" max="25" value="{{$key->Talent_Mastery}}" {{$key->read}}>
                                        </div>
                                    </div>
                                    <div class="row input-row">
                                        <div class="col-xs-5 col-md-5 sub-event">
                                            <p class="lead">Stage Presence</p>
                                        </div>
                                        <div class="col-xs-7 col-md-7 col-input form-line focused">
                                            <input type="number" name="stage_{{$key->id}}" class="col-xs-7 col-md-7 form-control input_{{$key->id}}" name="number" required="" aria-required="true" aria-invalid="false" step='0.01' placeholder="0.00" min="0" max="25" value="{{$key->Talent_StagePresence}}" {{$key->read}}>
                                        </div>
                                    </div>
                                    <div class="row input-row">
                                        <div class="col-xs-5 col-md-5 sub-event">
                                            <p class="lead">Overall Impact</p>
                                        </div>
                                        <div class="col-xs-7 col-md-7 col-input form-line focused">
                                            <input type="number" name="impact_{{$key->id}}" class="col-xs-7 col-md-7 form-control input_{{$key->id}}" name="number" required="" aria-required="true" aria-invalid="false" step='0.01' placeholder="0.00" min="0" max="25" value="{{$key->Talent_OverallImpact}}" {{$key->read}}>
                                        </div>
                                    </div>
                                    <div class="row input-row" style="border-top: 1px solid #ccc; padding-top: 10px; background: #eee; margin-bottom: 10px;">
                                        <div class="col-xs-5 col-md-5 sub-event total">
                                            <p class="lead" style="font-weight:bold; padding-top:10px;">Total</p>
                                        </div>
                                        <div class="col-xs-7 col-md-7 col-input form-line focused">
                                            <input id="input_total{{$key->id}}" type="number" name="talentTotal_{{$key->id}}" class="col-xs-7 col-md-7 form-control" name="number" required="" aria-required="true" aria-invalid="false" readonly step='0.01' placeholder="0.00" value="{{$key->Talent_Confidence+$key->Talent_Mastery+$key->Talent_StagePresence+$key->Talent_OverallImpact}}" style="font-size:18px;">
                                        </div>
                                    </div>
                                    <div class="row">
                                      <button type="button" class="btn bg-red input" data-rel="{{Auth::user()->id}}|{{$key->id}}|{{Auth::user()->event}}" style="margin:0 auto;display:block;">Save</button>
                                    </div>
                                </div>
                            </div>
                          </div>
                          @endforeach
                      </div>
                      <div style="width:120px;margin:auto;">
                        <div class="row" style="margin:auto;">
                          <button type="button" data-toggle="modal" data-target="#confirmSubmit" class="btn bg-red waves-effect">
                              <i class="material-icons">done</i>
                              <span>CONFIRM</span>
                          </button>
                        </div>
                      </div>
                      <div class="modal fade" id="confirmSubmit" tabindex="-1" role="dialog">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h4 class="modal-title" id="defaultModalLabel">Confirm Submit</h4>
                                  </div>
                                  <div class="modal-body">
                                      Are you sure to submit? Once its confirmed, the scores will not be edited any longer.
                                  </div>
                                  <div class="modal-footer">
                                      <button type="submit" class="btn btn-link waves-effect">SUBMIT</button>
                                      <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                  </div>
                              </div>
                          </div>
                      </div>
                      </form>
                    </div>
                    @elseif(Auth::user()->event == "Speech")
                    <div class="tab-pane active" id="prePageant_speech">
                      <h3>Speech</h3>
                      <div class="well well-sm">
                        <div class="row">
                          <div class="col-xs-1 col-md-1">
                            <strong>Display</strong>
                          </div>
                          <div class="col-xs-3 col-md-3 btn-group">
                              <a href="#" id="grid" class="btn btn-default btn-sm preGrid"><span
                                  class="glyphicon glyphicon-th"></span>Grid</a>
                              <a href="#" id="list" class="btn btn-default btn-sm preList"><span class="glyphicon glyphicon-th-list">
                              </span>List</a>
                          </div>
                          @if($candidates[0]->read == "readonly")
                          <div class="col-xs-8 col-md-8">
                            <button id="btnRanking" data-toggle="modal" data-target="#ranking" type="button" class="btn btn-xs btn-danger waves-effect" style="float: right;">
                                <i class="material-icons">person</i>
                                <span>Ranking</span>
                            </button>
                          </div>
                          @endif
                        </div>
                      </div>
                      <div id="products" class="row list-group">
                        <form action="{{url('/addScores')}}" method="post" enctype="multipart/form-data">
                          @csrf
                          <input type="hidden" name="judge" value="{{Auth::user()->id}}" />
                          <input type="hidden" name="event" value="{{Auth::user()->event}}" />
                          @foreach($candidates as $key)
                          @if($key->seqSpeech == 5)
                          <!-- <div id="row{{$key->id}}" class="item col-xs-3 col-lg-3" style="clear:left;"> -->
                          <div id="row{{$key->id}}" class="item col-xs-3 col-lg-3">
                          @else
                          <div id="row{{$key->id}}" class="item col-xs-3 col-lg-3">
                          @endif
                            <input type="hidden" name="event" value="{{Auth::user()->event}}" />
                            <div class="thumbnail">
                                <img class="group list-group-image" src="{{$key->image}}" width="200"/>
                                <div class="caption">
                                    <h5 class="group inner list-group-item-heading" style="margin-bottom: 0">{{$key->fName}} {{$key->lName}}</h5>
                                    <hr />
                                    <div class="row input-row">
                                        <div class="col-xs-5 col-md-5 sub-event">
                                            <p class="lead">Content</p>
                                        </div>
                                        <div class="col-xs-7 col-md-7 col-input form-line focused">
                                            <input type="number" name="content_{{$key->id}}" class="col-xs-7 col-md-7 form-control input_{{$key->id}}" name="number" required="" aria-required="true" aria-invalid="false" step='0.01' placeholder='0.00' min="0" max="25" value="{{$key->PSpch_Content}}" {{$key->read}}>
                                        </div>
                                    </div>
                                    <div class="row input-row">
                                        <div class="col-xs-5 col-md-5 sub-event">
                                            <p class="lead">Delivery</p>
                                        </div>
                                        <div class="col-xs-7 col-md-7 col-input form-line focused">
                                            <input type="number" name="delivery_{{$key->id}}" class="col-xs-7 col-md-7 form-control input_{{$key->id}}" name="number" required="" aria-required="true" aria-invalid="false" step='0.01' placeholder='0.00' min="0" max="25" value="{{$key->PSpch_Delivery}}" {{$key->read}}>
                                        </div>
                                    </div>
                                    <div class="row input-row">
                                        <div class="col-xs-5 col-md-5 sub-event">
                                            <p class="lead">Spontaneity</p>
                                        </div>
                                        <div class="col-xs-7 col-md-7 col-input form-line focused">
                                            <input type="number" name="spon_{{$key->id}}" class="col-xs-7 col-md-7 form-control input_{{$key->id}}" name="number" required="" aria-required="true" aria-invalid="false" step='0.01' placeholder='0.00' min="0" max="25" value="{{$key->PSpch_Spontainety}}" {{$key->read}}>
                                        </div>
                                    </div>
                                    <div class="row input-row">
                                        <div class="col-xs-5 col-md-5 sub-event">
                                            <p class="lead">Defense</p>
                                        </div>
                                        <div class="col-xs-7 col-md-7 col-input form-line focused">
                                            <input type="number" name="defense_{{$key->id}}" class="col-xs-7 col-md-7 form-control input_{{$key->id}}" name="number" required="" aria-required="true" aria-invalid="false" step='0.01' placeholder='0.00' min="0" max="25" value="{{$key->PSpch_Defense}}" {{$key->read}}>
                                        </div>
                                    </div>
                                    <div class="row input-row" style="border-top: 1px solid #ccc; padding-top: 10px; background: #eee; margin-bottom: 10px;">
                                        <div class="col-xs-5 col-md-5 sub-event total">
                                            <p class="lead" style="font-weight:bold; padding-top:10px;">Total</p>
                                        </div>
                                        <div class="col-xs-7 col-md-7 col-input form-line focused">
                                            <input id="input_total{{$key->id}}" type="number" name="speechTotal_{{$key->id}}" class="col-xs-7 col-md-7 form-control" name="number" required="" aria-required="true" aria-invalid="false" step='0.01' placeholder='0.00' readonly value="{{$key->PSpch_Content+$key->PSpch_Delivery+$key->PSpch_Spontainety+$key->PSpch_Defense}}" style="font-size:18px;">
                                        </div>
                                    </div>
                                    <div class="row">
                                      <button type="button" class="btn bg-red input" data-rel="{{Auth::user()->id}}|{{$key->id}}|{{Auth::user()->event}}" style="margin:0 auto;display:block;">Save</button>
                                    </div>
                                </div>
                            </div>
                          </div>
                          @endforeach
                      </div>
                      <div style="width:120px;margin:auto;">
                        <div class="row" style="margin:auto;">
                          <button type="button" data-toggle="modal" data-target="#confirmSubmit" class="btn bg-red waves-effect">
                              <i class="material-icons">done</i>
                              <span>CONFIRM</span>
                          </button>
                        </div>
                      </div>
                      <div class="modal fade" id="confirmSubmit" tabindex="-1" role="dialog">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h4 class="modal-title" id="defaultModalLabel">Confirm Submit</h4>
                                  </div>
                                  <div class="modal-body">
                                      Are you sure to submit? Once its confirmed, the scores will not be edited any longer.
                                  </div>
                                  <div class="modal-footer">
                                      <button type="submit" class="btn btn-link waves-effect">SUBMIT</button>
                                      <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                  </div>
                              </div>
                          </div>
                      </div>
                      </form>
                    </div>
                    @endif
                    @if(Auth::user()->userType == "organizer")
                    <div class="tab-pane active" id="pressLaunch">
                      <h3>Press Launch</h3>
                      <div class="well well-sm">
                        <div class="row">
                          <div class="col-xs-1 col-md-1">
                            <strong>Display</strong>
                          </div>
                          <div class="col-xs-3 col-md-3 btn-group">
                              <a href="#" id="grid" class="btn btn-default btn-sm preGrid"><span class="glyphicon glyphicon-th">
                              </span>Grid</a>
                              <a href="#" id="list" class="btn btn-default btn-sm preList"><span class="glyphicon glyphicon-th-list">
                              </span>List</a>
                          </div>
                          @if($candidates[0]->read == "readonly")
                          <div class="col-xs-8 col-md-8">
                            <button id="btnRanking" data-toggle="modal" data-target="#ranking" type="button" class="btn btn-xs btn-danger waves-effect" style="float: right;">
                                <i class="material-icons">person</i>
                                <span>Ranking</span>
                            </button>
                          </div>
                          @endif
                        </div>
                      </div>
                      <div id="products" class="row list-group">
                        <form action="{{url('/addScores')}}" method="post" enctype="multipart/form-data">
                          @csrf
                          <input type="hidden" name="judge" value="{{Auth::user()->id}}" />
                          <input type="hidden" name="event" value="Press Launch"/>
                          @foreach($press as $key)
                          <div id="row{{$key->id}}" class="item col-xs-3 col-lg-3">
                            <div class="thumbnail">
                                <img class="group list-group-image" src="{{$key->image}}" width="200"/>
                                <div class="caption">
                                    <h5 class="group inner list-group-item-heading" style="margin-bottom: 0">{{$key->fName}} {{$key->lName}}</h5>
                                    <hr />
                                    <div class="row input-row">
                                        <div class="col-xs-5 col-md-5 sub-event">
                                            <p class="lead">Score</p>
                                        </div>
                                        <div class="col-xs-7 col-md-7 col-input form-line focused">
                                            <input type="number" name="press_{{$key->id}}" class="col-xs-7 col-md-7 form-control input_{{$key->id}}" name="number" required="" aria-required="true" aria-invalid="false" step='0.01' placeholder='0.00' min="0" max="100" value="{{$key->PL_RS}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                      <button type="button" class="btn bg-red input" data-rel="{{Auth::user()->id}}|{{$key->id}}|Press Launch" style="margin:0 auto;display:block;">Save</button>
                                    </div>
                                </div>
                            </div>
                          </div>
                          @endforeach
                        </form>
                      </div>
                      <div style="width:120px;margin:auto;">
                        <div class="row" style="margin:auto;">
                          <button type="button" data-toggle="modal" data-target="#confirmSubmit" class="btn bg-red waves-effect">
                              <i class="material-icons">done</i>
                              <span>CONFIRM</span>
                          </button>
                        </div>
                      </div>
                      <div class="modal fade" id="confirmSubmit" tabindex="-1" role="dialog">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h4 class="modal-title" id="defaultModalLabel">Confirm Submit</h4>
                                  </div>
                                  <div class="modal-body">
                                      Are you sure to submit? Once its confirmed, the scores will not be edited any longer.
                                  </div>
                                  <div class="modal-footer">
                                      <button type="submit" class="btn btn-link waves-effect">SUBMIT</button>
                                      <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                    @if(in_array("judge",$explode) == "true")
                    <div class="tab-pane" id="prePageant_specialProjects">
                      <h3>Special Projects</h3>
                      <div class="well well-sm">
                        <div class="row">
                          <div class="col-xs-1 col-md-1">
                            <strong>Display</strong>
                          </div>
                          <div class="col-xs-3 col-md-3 btn-group">
                              <a href="#" id="grid" class="btn btn-default btn-sm preGrid"><span
                                  class="glyphicon glyphicon-th"></span>Grid</a>
                              <a href="#" id="list" class="btn btn-default btn-sm preList"><span class="glyphicon glyphicon-th-list">
                              </span>List</a>
                          </div>
                          @if($candidates[0]->read == "readonly")
                          <div class="col-xs-8 col-md-8">
                            <button id="btnRanking" data-toggle="modal" data-target="#ranking" type="button" class="btn btn-xs btn-danger waves-effect" style="float: right;">
                                <i class="material-icons">person</i>
                                <span>Ranking</span>
                            </button>
                          </div>
                          @endif
                        </div>
                      </div>
                      <div id="products" class="row list-group">
                        <form action="{{url('/addScores')}}" method="post" enctype="multipart/form-data">
                          @csrf
                          <input type="hidden" name="judge" value="{{Auth::user()->id}}" />
                          <input type="hidden" name="event" value="Special Projects" />
                          @foreach($candidates as $key)
                          <div class="item col-xs-3 col-lg-3">
                            <div class="thumbnail">
                                <img class="group list-group-image" src="{{$key->image}}" width="200"/>
                                <div class="caption">
                                    <h5 class="group inner list-group-item-heading" style="margin-bottom: 0">{{$key->fName}} {{$key->lName}}</h5>
                                    <hr />
                                    <div class="row input-row">
                                        <div class="col-xs-5 col-md-5 sub-event">
                                            <p class="lead">Score</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                      <button type="button" class="btn bg-red input" data-rel="{{Auth::user()->id}}|{{$key->id}}|{{Auth::user()->event}}" style="margin:0 auto;display:block;">Save</button>
                                    </div>
                                </div>
                            </div>
                          </div>
                          @endforeach
                      </div>
                      <div style="width:120px;margin:auto;">
                        <div class="row" style="margin:auto;">
                          <button type="button" data-toggle="modal" data-target="#confirmSubmit" class="btn bg-red waves-effect">
                              <i class="material-icons">done</i>
                              <span>CONFIRM</span>
                          </button>
                        </div>
                      </div>
                      <div class="modal fade" id="confirmSubmit" tabindex="-1" role="dialog">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h4 class="modal-title" id="defaultModalLabel">Confirm Submit</h4>
                                  </div>
                                  <div class="modal-body">
                                      Are you sure to submit? Once its confirmed, the scores will not be edited any longer.
                                  </div>
                                  <div class="modal-footer">
                                      <button type="submit" class="btn btn-link waves-effect">SUBMIT</button>
                                      <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                  </div>
                              </div>
                          </div>
                      </div>
                      </form>
                    </div>
                    @endif
                    @endif
                    <div class="tab-pane" id="finals">
                      <div class="row clearfix">
                          <!-- Start content -->
                          <div class="content">
                              <div class="container">
                                <div class="col-lg-12">
                                  <div class="tab-content col-lg-12">
                                        <div class="tab-pane active" id="candidateInfo">
                                          @for( $i=0 ; $i<=9 ; $i++)
                                              @if($i==0)
                                          <div class="col-lg-4">
                                              <a data-toggle="modal" data-target="#defaultModal" style="text-decoration:none;">
                                                <div class="info-box-4">
                                                  <div class="icon">
                                                      <img src={{$picSrc[$i]}} width="72" height="72" alt="User" style="border-radius: 50%;"/>
                                                  </div>
                                                  <div class="content">
                                                      <div class="text">{{$collegeCode[$i]}}</div>
                                                      <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">{{$name[$i]}}</div>
                                                  </div>
                                                </div>
                                            </a>
                                          </div>
                                          @else
                                            <div class="col-lg-4">
                                                <a data-toggle="modal" data-target="#defaultModal" style="text-decoration:none;">
                                                  <div class="info-box-4">
                                                    <div class="icon">
                                                        <img src={{$picSrc[$i]}} width="72" height="72" alt="User" style="border-radius: 50%;"/>
                                                    </div>
                                                    <div class="content">
                                                        <div class="text">{{$collegeCode[$i]}}</div>
                                                        <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">{{$name[$i]}}</div>
                                                    </div>
                                                  </div>
                                              </a>
                                            </div>
                                            @endif
                                            @endfor
                                          </div>
                                    </div>
                                  </div>
                              </div> <!-- container -->
                          </div> <!-- content -->
                      </div>
                    </div>
                </div>
                </div>
            </div>
          </div> <!-- container -->
      </div> <!-- content -->
</section>

<!-- For Material Design Colors -->
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">""</h4> <!-- Should be modified-->
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-lg-12">
                    <div class="panel-group panel-group-joined" id="accordion-test">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion-test" href="#collapseOne" class="collapsed">
                                        Candidate Info
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse">
                                <div class="panel-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion-test" href="#collapseTwo" class="collapsed">
                                        Press Launch
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion-test" href="#collapseThree" class="collapsed">
                                        Pre-Pageant
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion-test" href="#collapseFour" class="collapsed">
                                        Initial Score
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse">
                                <div class="panel-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ranking" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Ranking</h4> <!-- Should be modified-->
            </div>
            <div class="modal-body">
              <div class="panel">
                  <div class="panel-body">
                      <table class="table table-bordered table-striped datatable">
                          <thead>
                              <tr>
                                <th>Candidate</th>
                                <th>College</th>
                                <th>Score</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($candidates as $key)
                            <tr class="gradeX">
                              <td><p>{{$key->lName}}, {{$key->fName}} {{$key->mName}}</p></td>
                              <td>{{$key->collegeName}}</td>
                              @if(Auth::user()->event == "Talent")
                                <td><p>{{$key->Talent_Confidence+$key->Talent_Mastery+$key->Talent_StagePresence+$key->Talent_OverallImpact}}</p></td>
                              @elseif(Auth::user()->event == "Speech")
                                <td><p>{{$key->PSpch_Content+$key->PSpch_Delivery+$key->PSpch_Spontainety+$key->PSpch_Defense}}</p></td>
                              @elseif(Auth::user()->userType == "organizer")
                                <td><p>{{$key->PL_RS}}</p></td>
                              @endif
                              @if(in_array("judge",$explode) == "true")
                                <td><p>{{$key->SP_RS}}</p></td>
                              @endif
                            </tr>
                            @endforeach
                          </tbody>
                      </table>
                  </div>
                  <!-- end: page -->
              </div> <!-- end Panel -->
            </div>
        </div>
    </div>
</div>
@endsection

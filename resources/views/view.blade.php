<?php
    $explode = explode(",",Auth::user()->roles);

    $time = date('H:i:s',strtotime("4 PM"));
    // dd($time."-".date('H:i:s'));
    $offset=8*60*60; //converting 8 hours to seconds.
    $dateFormat="H:i:s";
    $timeNdate=gmdate($dateFormat, time()+$offset);

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
                    <li class="tab">
                        <a href="#prePageant_deductions" data-toggle="tab" aria-expanded="false">
                            <span class="visible-xs"><i class="fa fa-user"></i></span>
                            <span class="hidden-xs">Prepageant Deductions</span>
                        </a>
                    </li>
                    <li class="tab">
                        <a href="#finals_deductions" data-toggle="tab" aria-expanded="false">
                            <span class="visible-xs"><i class="fa fa-user"></i></span>
                            <span class="hidden-xs">Initial Score Deductions</span>
                        </a>
                    </li>
                    @endif
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
                              <button data-toggle="modal" data-target="#ranking" type="button" class="btn btn-xs btn-danger waves-effect btnRanking" style="float: right;">
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
                            @if($key->seqTalent == 9)
                            <div id="row{{$key->id}}" class="item col-xs-3 col-lg-3" style="clear: left;">
                            @else
                            <div id="row{{$key->id}}" class="item col-xs-3 col-lg-3">
                            @endif
                              <div class="thumbnail">
                                  <img data-rel="img{{$key->id}}" class="group list-group-image" src="{{$key->image}}" width="200"/>
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
                                              <input id="input_total{{$key->id}}" type="number" name="talentTotal_{{$key->id}}" class="col-xs-7 col-md-7 form-control" name="number" required="" aria-required="true" aria-invalid="false" readonly step='0.01' placeholder="0.00" value="{{number_format(($key->Talent_Confidence+$key->Talent_Mastery+$key->Talent_StagePresence+$key->Talent_OverallImpact),2)}}" style="font-size:18px;">
                                          </div>
                                      </div>
                                      @if($key->read != "readonly")
                                      <div class="row">
                                        <button type="button" class="btn bg-red input" data-rel="{{Auth::user()->id}}|{{$key->id}}|{{Auth::user()->event}}" style="margin:0 auto;display:block;">Save</button>
                                      </div>
                                      @endif
                                  </div>
                              </div>
                            </div>
                            @endforeach
                          </div>
                        </div>
                        @if($candidates[0]->read != "readonly")
                        <div style="width:120px;margin:auto;">
                          <div class="row" style="margin:auto;">
                            <button type="button" data-toggle="modal" data-target="#confirmSubmit" class="btn bg-red waves-effect">
                                <i class="material-icons">done</i>
                                <span>FINALIZE</span>
                            </button>
                          </div>
                        </div>
                        @endif
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
                            <button data-toggle="modal" data-target="#ranking" type="button" class="btn btn-xs btn-danger waves-effect btnRanking" style="float: right;">
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
                                            <input id="input_total{{$key->id}}" type="number" name="speechTotal_{{$key->id}}" class="col-xs-7 col-md-7 form-control" name="number" required="" aria-required="true" aria-invalid="false" step='0.01' placeholder='0.00' readonly value="{{number_format(($key->PSpch_Content+$key->PSpch_Delivery+$key->PSpch_Spontainety+$key->PSpch_Defense),2)}}" style="font-size:18px;">
                                        </div>
                                    </div>
                                    @if($key->read == "")
                                    <div class="row">
                                      <button type="button" class="btn bg-red input" data-rel="{{Auth::user()->id}}|{{$key->id}}|{{Auth::user()->event}}" style="margin:0 auto;display:block;">Save</button>
                                    </div>
                                    @endif
                                </div>
                            </div>
                          </div>
                          @endforeach
                        </div>
                      </div>
                      @if($candidates[0]->read == "")
                      <div style="width:120px;margin:auto;">
                        <div class="row" style="margin:auto;">
                          <button type="button" data-toggle="modal" data-target="#confirmSubmit" class="btn bg-red waves-effect">
                              <i class="material-icons">done</i>
                              <span>FINALIZE</span>
                          </button>
                        </div>
                      </div>
                      @endif
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
                          @if($press[0]->readPL == "readonly")
                          <div class="col-xs-8 col-md-8">
                            <button data-toggle="modal" data-rel="pl" data-target="#ranking" type="button" class="btn btn-xs btn-danger waves-effect btnRanking" style="float: right;">
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
                          <div id="plrow{{$key->id}}" class="item col-xs-3 col-lg-3">
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
                                    @if($key->readPL != "readonly")
                                    <div class="row">
                                      <button type="button" class="btn bg-red input" data-rel="{{Auth::user()->id}}|{{$key->id}}|Press Launch" style="margin:0 auto;display:block;">Save</button>
                                    </div>
                                    @endif
                                </div>
                            </div>
                          </div>
                          @endforeach
                        </form>
                      </div>
                      @if($press[0]->readPL != "readonly")
                      <div style="width:120px;margin:auto;">
                        <div class="row" style="margin:auto;">
                          <button type="button" data-toggle="modal" data-target="#confirmSubmit" class="btn bg-red waves-effect">
                              <i class="material-icons">done</i>
                              <span>FINALIZE</span>
                          </button>
                        </div>
                      </div>
                      @endif
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
                    <div class="tab-pane" id="prePageant_deductions">
                      <h3>Prepageant Deductions</h3>
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
                        </div>
                      </div>
                      <div id="products" class="row list-group">
                        <form action="{{url('/addScores')}}" method="post" enctype="multipart/form-data">
                          @csrf
                          <input type="hidden" name="judge" value="{{Auth::user()->id}}" />
                          <input type="hidden" name="event" value="Prep Deductions"/>
                          @foreach($candidates as $key)
                          <div id="preDeduc{{$key->id}}" class="item col-xs-3 col-lg-3">
                            <div class="thumbnail">
                                <img class="group list-group-image" src="{{$key->image}}" width="200"/>
                                <div class="caption">
                                    <h5 class="group inner list-group-item-heading" style="margin-bottom: 0">{{$key->fName}} {{$key->lName}}</h5>
                                    <hr />
                                    <div class="row input-row">
                                        <div class="col-xs-5 col-md-5 sub-event">
                                            <p class="lead">Violations</p>
                                        </div>
                                        <div class="col-xs-7 col-md-7 col-input form-line focused">
                                            <input type="number" name="preDeduct_{{$key->id}}" class="col-xs-7 col-md-7 form-control input_{{$key->id}}" name="number" required="" aria-required="true" aria-invalid="false" step='0.01' placeholder='0.00' min="0" max="100" value="{{$key->deductions}}" {{$key->readDeduc}}>
                                        </div>
                                    </div>
                                    @if($key->readDeduc != "readonly")
                                    <div class="row">
                                      <button type="button" class="btn bg-red input" data-rel="{{Auth::user()->id}}|{{$key->id}}|Prep Deductions" style="margin:0 auto;display:block;">Save</button>
                                    </div>
                                    @endif
                                </div>
                            </div>
                          </div>
                          @endforeach
                      </div>
                      @if($press[0]->readDeduc != "readonly")
                      <div style="width:120px;margin:auto;">
                        <div class="row" style="margin:auto;">
                          <button type="button" data-toggle="modal" data-target="#prepDeduct" class="btn bg-red waves-effect">
                              <i class="material-icons">done</i>
                              <span>FINALIZE</span>
                          </button>
                        </div>
                      </div>
                      @endif
                      <div class="modal fade" id="prepDeduct" tabindex="-1" role="dialog">
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
                    <div class="tab-pane" id="finals_deductions">
                      <h3>Initial Score Deductions</h3>
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
                        </div>
                      </div>
                      <div id="products" class="row list-group">
                        <form action="{{url('/addScores')}}" method="post" enctype="multipart/form-data">
                          @csrf
                          <input type="hidden" name="judge" value="{{Auth::user()->id}}" />
                          <input type="hidden" name="event" value="Final Deductions"/>
                          @foreach($finals as $key)
                          <div id="finDedRow{{$key->id}}" class="item col-xs-3 col-lg-3">
                            <div class="thumbnail">
                                <img class="group list-group-image" src="{{$key->image}}" width="200"/>
                                <div class="caption">
                                    <h5 class="group inner list-group-item-heading" style="margin-bottom: 0">{{$key->fName}} {{$key->lName}}</h5>
                                    <hr />
                                    <div class="row input-row">
                                        <div class="col-xs-5 col-md-5 sub-event">
                                            <p class="lead">Violations</p>
                                        </div>
                                        <div class="col-xs-7 col-md-7 col-input form-line focused">
                                            <input type="number" name="finDeduct_{{$key->id}}" class="col-xs-7 col-md-7 form-control input_{{$key->id}}" name="number" required="" aria-required="true" aria-invalid="false" step='0.01' placeholder='0.00' min="0" max="100" value="{{$key->deductions}}" {{$key->readDEDUC}}>
                                        </div>
                                    </div>
                                    @if($key->readDEDUC != "readonly")
                                    <div class="row">
                                      <button type="button" class="btn bg-red input" data-rel="{{Auth::user()->id}}|{{$key->id}}|Final Deductions" style="margin:0 auto;display:block;">Save</button>
                                    </div>
                                    @endif
                                </div>
                            </div>
                          </div>
                          @endforeach
                      </div>
                      @if($finals[0]->readDEDUC != "readonly")
                      <div style="width:120px;margin:auto;">
                        <div class="row" style="margin:auto;">
                          <button type="button" data-toggle="modal" data-target="#deductFinal" class="btn bg-red waves-effect">
                              <i class="material-icons">done</i>
                              <span>FINALIZE</span>
                          </button>
                        </div>
                      </div>
                      @endif
                      <div class="modal fade" id="deductFinal" tabindex="-1" role="dialog">
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
                              <button data-toggle="modal" data-rel="sp" data-target="#ranking" type="button" class="btn btn-xs btn-danger waves-effect btnRanking" style="float: right;">
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
                            <div id="sprow{{$key->id}}" class="item col-xs-3 col-lg-3">
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
                                              <input type="number" name="score_{{$key->id}}" class="col-xs-7 col-md-7 form-control input_{{$key->id}}" name="number" required="" aria-required="true" aria-invalid="false" step='0.01' placeholder='0.00' min="0" max="100" value="{{$key->SP_RS}}" {{$key->read}}>
                                          </div>
                                      </div>
                                      @if($key->read != "readonly")
                                      <div class="row">
                                        <button type="button" class="btn bg-red input" data-rel="{{Auth::user()->id}}|{{$key->id}}|Special Projects" style="margin:0 auto;display:block;">Save</button>
                                      </div>
                                      @endif
                                  </div>
                              </div>
                            </div>
                            @endforeach
                        </div>
                        @if($candidates[0]->read != "readonly")
                        <div style="width:120px;margin:auto;">
                          <div class="row" style="margin:auto;">
                            <button type="button" data-toggle="modal" data-target="#submitSP" class="btn bg-red waves-effect">
                                <i class="material-icons">done</i>
                                <span>FINALIZE</span>
                            </button>
                          </div>
                        </div>
                        @endif
                        <div class="modal fade" id="submitSP" tabindex="-1" role="dialog">
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
                    @if(Auth::user()->event == "Final")
                    <h3>Pageant Night</h3>
                    <div class="panel" id="finals">
                        <ul class="nav nav-tabs tabs tabs-top">
                            <li class="tab active">
                                <a href="#sequentialInterview" data-toggle="tab" aria-expanded="false">
                                    <span class="visible-xs"><i class="fa fa-cog"></i></span>
                                    <span class="hidden-xs">Sequential Interview</span>
                                </a>
                            </li>
                            @if($timeNdate > $time)
                            <li class="tab">
                                <a href="#production" data-toggle="tab" aria-expanded="false">
                                    <span class="visible-xs"><i class="fa fa-home"></i></span>
                                    <span class="hidden-xs">Production</span>
                                </a>
                            </li>
                            <li class="tab">
                                <a href="#themeWear" data-toggle="tab" aria-expanded="false">
                                    <span class="visible-xs"><i class="fa fa-user"></i></span>
                                    <span class="hidden-xs">Theme Wear</span>
                                </a>
                            </li>
                            <li class="tab">
                                <a href="#eveningGown" data-toggle="tab" aria-expanded="false">
                                    <span class="visible-xs"><i class="fa fa-user"></i></span>
                                    <span class="hidden-xs">Evening Gown</span>
                                </a>
                            </li>
                            <li class="tab">
                                <a href="#initialInterview" data-toggle="tab" aria-expanded="false">
                                    <span class="visible-xs"><i class="fa fa-cog"></i></span>
                                    <span class="hidden-xs">Initial Interview</span>
                                </a>
                            </li>
                            <li class="tab">
                                <a href="#standardQuestion" data-toggle="tab" aria-expanded="false">
                                    <span class="visible-xs"><i class="fa fa-cog"></i></span>
                                    <span class="hidden-xs">Standard Question</span>
                                </a>
                            </li>
                            @endif
                        </ul>
                        <div class="tab-content">
                          <div class="tab-pane active" id="sequentialInterview">
                                <h3>Sequential Interview</h3>
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
                                    @if($candidates[0]->readSEQ == "readonly")
                                    <div class="col-xs-8 col-md-8">
                                      <button data-rel="seq" data-toggle="modal" data-target="#ranking" type="button" class="btn btn-xs btn-danger waves-effect btnRanking" style="float: right;">
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
                                    <input type="hidden" name="event" value="Sequential Interview" />
                                    @foreach($candidates as $key)
                                      <div id="seqRow{{$key->id}}" class="item col-xs-3 col-lg-3">
                                        <div class="thumbnail">
                                            <img data-rel="img{{$key->id}}" class="group list-group-image" src="{{$key->image}}" width="200"/>
                                            <div class="caption">
                                                <h5 class="group inner list-group-item-heading" style="margin-bottom: 0">{{$key->fName}} {{$key->lName}}</h5>
                                                <hr />
                                                <div class="row input-row">
                                                    <div class="col-xs-5 col-md-5 sub-event">
                                                        <p class="lead">Content</p>
                                                    </div>
                                                    <div class="col-xs-7 col-md-7 col-input form-line focused">
                                                        <input type="number" name="seq_content{{$key->id}}" class="seqintrvw col-xs-7 col-md-7 form-control seq_input_{{$key->id}}" name="number" required="" aria-required="true" aria-invalid="false" step='0.01' placeholder="0.00" min="0" max="25" value="{{$key->IS_SeqIntrvw_Content}}" {{$key->readSEQ}}>
                                                    </div>
                                                </div>
                                                <div class="row input-row">
                                                    <div class="col-xs-5 col-md-5 sub-event">
                                                        <p class="lead">Wit</p>
                                                    </div>
                                                    <div class="col-xs-7 col-md-7 col-input form-line focused">
                                                        <input type="number" name="seq_wit{{$key->id}}" class="seqintrvw col-xs-7 col-md-7 form-control seq_input_{{$key->id}}" name="number" required="" aria-required="true" aria-invalid="false" step='0.01' placeholder="0.00" min="0" max="25" value="{{$key->IS_SeqIntrvw_Wit}}" {{$key->readSEQ}}>
                                                    </div>
                                                </div>
                                                <div class="row input-row">
                                                    <div class="col-xs-5 col-md-5 sub-event">
                                                        <p class="lead">Delivery</p>
                                                    </div>
                                                    <div class="col-xs-7 col-md-7 col-input form-line focused">
                                                        <input type="number" name="seq_delivery{{$key->id}}" class="seqintrvw col-xs-7 col-md-7 form-control seq_input_{{$key->id}}" name="number" required="" aria-required="true" aria-invalid="false" step='0.01' placeholder="0.00" min="0" max="25" value="{{$key->IS_SeqIntrvw_Delivery}}" {{$key->readSEQ}}>
                                                    </div>
                                                </div>
                                                <div class="row input-row">
                                                    <div class="col-xs-5 col-md-5 sub-event">
                                                        <p class="lead">Confidence</p>
                                                    </div>
                                                    <div class="col-xs-7 col-md-7 col-input form-line focused">
                                                        <input type="number" name="seq_confidence{{$key->id}}" class="seqintrvw col-xs-7 col-md-7 form-control seq_input_{{$key->id}}" name="number" required="" aria-required="true" aria-invalid="false" step='0.01' placeholder="0.00" min="0" max="25" value="{{$key->IS_SeqIntrvw_Confidence}}" {{$key->readSEQ}}>
                                                    </div>
                                                </div>
                                                <div class="row input-row" style="border-top: 1px solid #ccc; padding-top: 10px; background: #eee; margin-bottom: 10px;">
                                                    <div class="col-xs-5 col-md-5 sub-event total">
                                                        <p class="lead" style="font-weight:bold; padding-top:10px;">Total</p>
                                                    </div>
                                                    <div class="col-xs-7 col-md-7 col-input form-line focused">
                                                        <input id="seqTotal{{$key->id}}" type="number" name="seqTotal_{{$key->id}}" class="col-xs-7 col-md-7 form-control" name="number" required="" aria-required="true" aria-invalid="false" readonly step='0.01' placeholder="0.00" value="{{$key->IS_SeqIntrvw_Content+$key->IS_SeqIntrvw_Wit+$key->IS_SeqIntrvw_Delivery+$key->IS_SeqIntrvw_Confidence}}" style="font-size:18px;">
                                                    </div>
                                                </div>
                                                @if($key->readSEQ != "readonly")
                                                <div class="row">
                                                  <button type="button" class="btn bg-red input" data-rel="{{Auth::user()->id}}|{{$key->id}}|Sequential Interview" style="margin:0 auto;display:block;">Save</button>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                      </div>
                                    @endforeach
                                </div>
                              @if($candidates[0]->readSEQ != "readonly")
                              <div style="width:120px;margin:auto;">
                                <div class="row" style="margin:auto;">
                                  <button type="button" data-toggle="modal" data-target="#seqSubmit" class="btn bg-red waves-effect">
                                      <i class="material-icons">done</i>
                                      <span>FINALIZE</span>
                                  </button>
                                </div>
                              </div>
                              @endif
                              <div class="modal fade" id="seqSubmit" tabindex="-1" role="dialog">
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
                          <div class="tab-pane" id="initialInterview">
                                <h3>Initial Interview</h3>
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
                                    @if($candidates[0]->readINIT == "readonly")
                                    <div class="col-xs-8 col-md-8">
                                      <button data-rel="init" data-toggle="modal" data-target="#ranking" type="button" class="btn btn-xs btn-danger waves-effect btnRanking" style="float: right;">
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
                                    <input type="hidden" name="event" value="Initial Interview" />
                                    @foreach($candidates as $key)
                                      <div id="initRow{{$key->id}}" class="item col-xs-3 col-lg-3">
                                        <div class="thumbnail">
                                            <img data-rel="img{{$key->id}}" class="group list-group-image" src="{{$key->image}}" width="200"/>
                                            <div class="caption">
                                                <h5 class="group inner list-group-item-heading" style="margin-bottom: 0">{{$key->fName}} {{$key->lName}}</h5>
                                                <hr />
                                                <div class="row input-row">
                                                    <div class="col-xs-5 col-md-5 sub-event">
                                                        <p class="lead">Content</p>
                                                    </div>
                                                    <div class="col-xs-7 col-md-7 col-input form-line focused">
                                                        <input type="number" name="init_content_{{$key->id}}" class="initintrvw col-xs-7 col-md-7 form-control init_input_{{$key->id}}" name="number" required="" aria-required="true" aria-invalid="false" step='0.01' placeholder="0.00" min="0" max="25" value="{{$key->IS_InitIntrvw_Content}}" {{$key->readINIT}}>
                                                    </div>
                                                </div>
                                                <div class="row input-row">
                                                    <div class="col-xs-5 col-md-5 sub-event">
                                                        <p class="lead">Wit</p>
                                                    </div>
                                                    <div class="col-xs-7 col-md-7 col-input form-line focused">
                                                        <input type="number" name="init_wit_{{$key->id}}" class="initintrvw col-xs-7 col-md-7 form-control init_input_{{$key->id}}" name="number" required="" aria-required="true" aria-invalid="false" step='0.01' placeholder="0.00" min="0" max="25" value="{{$key->IS_InitIntrvw_Wit}}" {{$key->readINIT}}>
                                                    </div>
                                                </div>
                                                <div class="row input-row">
                                                    <div class="col-xs-5 col-md-5 sub-event">
                                                        <p class="lead">Delivery</p>
                                                    </div>
                                                    <div class="col-xs-7 col-md-7 col-input form-line focused">
                                                        <input type="number" name="init_delivery_{{$key->id}}" class="initintrvw col-xs-7 col-md-7 form-control init_input_{{$key->id}}" name="number" required="" aria-required="true" aria-invalid="false" step='0.01' placeholder="0.00" min="0" max="25" value="{{$key->IS_InitIntrvw_Delivery}}" {{$key->readINIT}}>
                                                    </div>
                                                </div>
                                                <div class="row input-row">
                                                    <div class="col-xs-5 col-md-5 sub-event">
                                                        <p class="lead">Confidence</p>
                                                    </div>
                                                    <div class="col-xs-7 col-md-7 col-input form-line focused">
                                                        <input type="number" name="init_confidence_{{$key->id}}" class="initintrvw col-xs-7 col-md-7 form-control init_input_{{$key->id}}" name="number" required="" aria-required="true" aria-invalid="false" step='0.01' placeholder="0.00" min="0" max="25" value="{{$key->IS_InitIntrvw_Confidence}}" {{$key->readINIT}}>
                                                    </div>
                                                </div>
                                                <div class="row input-row" style="border-top: 1px solid #ccc; padding-top: 10px; background: #eee; margin-bottom: 10px;">
                                                    <div class="col-xs-5 col-md-5 sub-event total">
                                                        <p class="lead" style="font-weight:bold; padding-top:10px;">Total</p>
                                                    </div>
                                                    <div class="col-xs-7 col-md-7 col-input form-line focused">
                                                        <input id="initTotal{{$key->id}}" type="number" name="initTotal_{{$key->id}}" class="col-xs-7 col-md-7 form-control" name="number" required="" aria-required="true" aria-invalid="false" readonly step='0.01' placeholder="0.00" value="{{$key->IS_InitIntrvw_Content+$key->IS_InitIntrvw_Wit+$key->IS_InitIntrvw_Delivery+$key->IS_InitIntrvw_Confidence}}" style="font-size:18px;">
                                                    </div>
                                                </div>
                                                @if($key->readINIT != "readonly")
                                                <div class="row">
                                                  <button type="button" class="btn bg-red input" data-rel="{{Auth::user()->id}}|{{$key->id}}|Initial Interview" style="margin:0 auto;display:block;">Save</button>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                      </div>
                                    @endforeach
                                </div>
                              @if($candidates[0]->read != "readonly")
                              <div style="width:120px;margin:auto;">
                                <div class="row" style="margin:auto;">
                                  <button type="button" data-toggle="modal" data-target="#initSubmit" class="btn bg-red waves-effect">
                                      <i class="material-icons">done</i>
                                      <span>FINALIZE</span>
                                  </button>
                                </div>
                              </div>
                              @endif
                              <div class="modal fade" id="initSubmit" tabindex="-1" role="dialog">
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
                          <div class="tab-pane" id="production">
                              <h3>Production</h3>
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
                                  @if($candidates[0]->readPROD == "readonly")
                                  <div class="col-xs-8 col-md-8">
                                    <button data-rel="prod" data-toggle="modal" data-target="#ranking" type="button" class="btn btn-xs btn-danger waves-effect btnRanking" style="float: right;">
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
                                  <input type="hidden" name="event" value="Production" />
                                  @foreach($candidates as $key)
                                    <div id="prodRow{{$key->id}}" class="item col-xs-3 col-lg-3">
                                      <div class="thumbnail">
                                          <img data-rel="img{{$key->id}}" class="group list-group-image" src="{{$key->image}}" width="200"/>
                                          <div class="caption">
                                              <h5 class="group inner list-group-item-heading" style="margin-bottom: 0">{{$key->fName}} {{$key->lName}}</h5>
                                              <hr />
                                              <div class="row input-row">
                                                  <div class="col-xs-5 col-md-5 sub-event">
                                                      <p class="lead">Confidence</p>
                                                  </div>
                                                  <div class="col-xs-7 col-md-7 col-input form-line focused">
                                                      <input type="number" name="prod_confidence_{{$key->id}}" class="production col-xs-7 col-md-7 form-control pro_input_{{$key->id}}" name="number" required="" aria-required="true" aria-invalid="false" step='0.01' placeholder="0.00" min="0" max="25" value="{{$key->IS_Production_Confidence}}" {{$key->readPROD}}>
                                                  </div>
                                              </div>
                                              <div class="row input-row">
                                                  <div class="col-xs-5 col-md-5 sub-event">
                                                      <p class="lead">Mastery</p>
                                                  </div>
                                                  <div class="col-xs-7 col-md-7 col-input form-line focused">
                                                      <input type="number" name="prod_mastery_{{$key->id}}" class="production col-xs-7 col-md-7 form-control pro_input_{{$key->id}}" name="number" required="" aria-required="true" aria-invalid="false" step='0.01' placeholder="0.00" min="0" max="25" value="{{$key->IS_Production_Mastery}}" {{$key->readPROD}}>
                                                  </div>
                                              </div>
                                              <div class="row input-row">
                                                  <div class="col-xs-5 col-md-5 sub-event">
                                                      <p class="lead">Stage Presence</p>
                                                  </div>
                                                  <div class="col-xs-7 col-md-7 col-input form-line focused">
                                                      <input type="number" name="prod_stage_{{$key->id}}" class="production col-xs-7 col-md-7 form-control pro_input_{{$key->id}}" name="number" required="" aria-required="true" aria-invalid="false" step='0.01' placeholder="0.00" min="0" max="25" value="{{$key->IS_Production_StagePresence}}" {{$key->readPROD}}>
                                                  </div>
                                              </div>
                                              <div class="row input-row">
                                                  <div class="col-xs-5 col-md-5 sub-event">
                                                      <p class="lead">Overall Impact</p>
                                                  </div>
                                                  <div class="col-xs-7 col-md-7 col-input form-line focused">
                                                      <input type="number" name="prod_impact_{{$key->id}}" class="production col-xs-7 col-md-7 form-control pro_input_{{$key->id}}" name="number" required="" aria-required="true" aria-invalid="false" step='0.01' placeholder="0.00" min="0" max="25" value="{{$key->IS_Production_OverallImpact}}" {{$key->readPROD}}>
                                                  </div>
                                              </div>
                                              <div class="row input-row" style="border-top: 1px solid #ccc; padding-top: 10px; background: #eee; margin-bottom: 10px;">
                                                  <div class="col-xs-5 col-md-5 sub-event total">
                                                      <p class="lead" style="font-weight:bold; padding-top:10px;">Total</p>
                                                  </div>
                                                  <div class="col-xs-7 col-md-7 col-input form-line focused">
                                                      <input id="prodTotal{{$key->id}}" type="number" name="prodTotal_{{$key->id}}" class="col-xs-7 col-md-7 form-control" name="number" required="" aria-required="true" aria-invalid="false" readonly step='0.01' placeholder="0.00" value="{{number_format(($key->IS_Production_Confidence+$key->IS_Production_Mastery+$key->IS_Production_StagePresence+$key->IS_Production_OverallImpact),2)}}" style="font-size:18px;">
                                                  </div>
                                              </div>
                                              @if($key->readPROD != "readonly")
                                              <div class="row">
                                                <button type="button" class="btn bg-red input" data-rel="{{Auth::user()->id}}|{{$key->id}}|Production" style="margin:0 auto;display:block;">Save</button>
                                              </div>
                                              @endif
                                          </div>
                                      </div>
                                    </div>
                                  @endforeach
                              </div>
                            @if($candidates[0]->readPROD != "readonly")
                            <div style="width:120px;margin:auto;">
                              <div class="row" style="margin:auto;">
                                <button type="button" data-toggle="modal" data-target="#subProd" class="btn bg-red waves-effect">
                                    <i class="material-icons">done</i>
                                    <span>FINALIZE</span>
                                </button>
                              </div>
                            </div>
                            @endif
                            <div class="modal fade" id="subProd" tabindex="-1" role="dialog">
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
                          <div class="tab-pane" id="themeWear">
                                <h3>Theme Wear</h3>
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
                                    @if($candidates[0]->readTHEME == "readonly")
                                    <div class="col-xs-8 col-md-8">
                                      <button data-rel="theme" data-toggle="modal" data-target="#ranking" type="button" class="btn btn-xs btn-danger waves-effect btnRanking" style="float: right;">
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
                                    <input type="hidden" name="event" value="Theme Wear" />
                                    @foreach($candidates as $key)
                                      <div id="themeRow{{$key->id}}" class="item col-xs-3 col-lg-3">
                                        <div class="thumbnail">
                                            <img data-rel="img{{$key->id}}" class="group list-group-image" src="{{$key->image}}" width="200"/>
                                            <div class="caption">
                                                <h5 class="group inner list-group-item-heading" style="margin-bottom: 0">{{$key->fName}} {{$key->lName}}</h5>
                                                <hr />
                                                <div class="row input-row">
                                                    <div class="col-xs-5 col-md-5 sub-event">
                                                        <p class="lead">Grace</p>
                                                    </div>
                                                    <div class="col-xs-7 col-md-7 col-input form-line focused">
                                                        <input type="number" name="theme_grace_{{$key->id}}" class="themewear col-xs-7 col-md-7 form-control theme_input_{{$key->id}}" name="number" required="" aria-required="true" aria-invalid="false" step='0.01' placeholder="0.00" min="0" max="25" value="{{$key->IS_ThemeWr_Grace}}" {{$key->readTHEME}}>
                                                    </div>
                                                </div>
                                                <div class="row input-row">
                                                    <div class="col-xs-5 col-md-5 sub-event">
                                                        <p class="lead">Projection</p>
                                                    </div>
                                                    <div class="col-xs-7 col-md-7 col-input form-line focused">
                                                        <input type="number" name="theme_projection_{{$key->id}}" class="themewear col-xs-7 col-md-7 form-control theme_input_{{$key->id}}" name="number" required="" aria-required="true" aria-invalid="false" step='0.01' placeholder="0.00" min="0" max="25" value="{{$key->IS_ThemeWr_Projection}}" {{$key->readTHEME}}>
                                                    </div>
                                                </div>
                                                <div class="row input-row">
                                                    <div class="col-xs-5 col-md-5 sub-event">
                                                        <p class="lead">Poise</p>
                                                    </div>
                                                    <div class="col-xs-7 col-md-7 col-input form-line focused">
                                                        <input type="number" name="theme_poise_{{$key->id}}" class="themewear col-xs-7 col-md-7 form-control theme_input_{{$key->id}}" name="number" required="" aria-required="true" aria-invalid="false" step='0.01' placeholder="0.00" min="0" max="25" value="{{$key->IS_ThemeWr_Poise}}" {{$key->readTHEME}}>
                                                    </div>
                                                </div>
                                                <div class="row input-row">
                                                    <div class="col-xs-5 col-md-5 sub-event">
                                                        <p class="lead">Relevance</p>
                                                    </div>
                                                    <div class="col-xs-7 col-md-7 col-input form-line focused">
                                                        <input type="number" name="theme_relevance_{{$key->id}}" class="themewear col-xs-7 col-md-7 form-control theme_input_{{$key->id}}" name="number" required="" aria-required="true" aria-invalid="false" step='0.01' placeholder="0.00" min="0" max="25" value="{{$key->IS_ThemeWr_Relevance}}" {{$key->readTHEME}}>
                                                    </div>
                                                </div>
                                                <div class="row input-row" style="border-top: 1px solid #ccc; padding-top: 10px; background: #eee; margin-bottom: 10px;">
                                                    <div class="col-xs-5 col-md-5 sub-event total">
                                                        <p class="lead" style="font-weight:bold; padding-top:10px;">Total</p>
                                                    </div>
                                                    <div class="col-xs-7 col-md-7 col-input form-line focused">
                                                        <input id="themeTotal{{$key->id}}" type="number" name="themeTotal_{{$key->id}}" class="col-xs-7 col-md-7 form-control" name="number" required="" aria-required="true" aria-invalid="false" readonly step='0.01' placeholder="0.00" value="{{$key->IS_ThemeWr_Grace+$key->IS_ThemeWr_Projection+$key->IS_ThemeWr_Poise+$key->IS_ThemeWr_Relevance}}" style="font-size:18px;">
                                                    </div>
                                                </div>
                                                @if($key->readTHEME != "readonly")
                                                <div class="row">
                                                  <button type="button" class="btn bg-red input" data-rel="{{Auth::user()->id}}|{{$key->id}}|Theme Wear" style="margin:0 auto;display:block;">Save</button>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                      </div>
                                    @endforeach
                                </div>
                              @if($candidates[0]->readTHEME != "readonly")
                              <div style="width:120px;margin:auto;">
                                <div class="row" style="margin:auto;">
                                  <button type="button" data-toggle="modal" data-target="#subTheme" class="btn bg-red waves-effect">
                                      <i class="material-icons">done</i>
                                      <span>FINALIZE</span>
                                  </button>
                                </div>
                              </div>
                              @endif
                              <div class="modal fade" id="subTheme" tabindex="-1" role="dialog">
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
                          <div class="tab-pane" id="eveningGown">
                                <h3>Evening Gown</h3>
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
                                    @if($candidates[0]->readEVE == "readonly")
                                    <div class="col-xs-8 col-md-8">
                                      <button data-rel="eve" data-toggle="modal" data-target="#ranking" type="button" class="btn btn-xs btn-danger waves-effect btnRanking" style="float: right;">
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
                                    <input type="hidden" name="event" value="Evening Gown" />
                                    @foreach($candidates as $key)
                                      <div id="eveRow{{$key->id}}" class="item col-xs-3 col-lg-3">
                                        <div class="thumbnail">
                                            <img data-rel="img{{$key->id}}" class="group list-group-image" src="{{$key->image}}" width="200"/>
                                            <div class="caption">
                                                <h5 class="group inner list-group-item-heading" style="margin-bottom: 0">{{$key->fName}} {{$key->lName}}</h5>
                                                <hr />
                                                <div class="row input-row">
                                                    <div class="col-xs-5 col-md-5 sub-event">
                                                        <p class="lead">Grace</p>
                                                    </div>
                                                    <div class="col-xs-7 col-md-7 col-input form-line focused">
                                                        <input type="number" name="evening_grace_{{$key->id}}" class="eveninggown col-xs-7 col-md-7 form-control evening_input_{{$key->id}}" name="number" required="" aria-required="true" aria-invalid="false" step='0.01' placeholder="0.00" min="0" max="25" value="{{$key->IS_EveGown_Grace}}" {{$key->readEVE}}>
                                                    </div>
                                                </div>
                                                <div class="row input-row">
                                                    <div class="col-xs-5 col-md-5 sub-event">
                                                        <p class="lead">Projection</p>
                                                    </div>
                                                    <div class="col-xs-7 col-md-7 col-input form-line focused">
                                                        <input type="number" name="evening_projection_{{$key->id}}" class="eveninggown col-xs-7 col-md-7 form-control evening_input_{{$key->id}}" name="number" required="" aria-required="true" aria-invalid="false" step='0.01' placeholder="0.00" min="0" max="25" value="{{$key->IS_EveGown_Projection}}" {{$key->readEVE}}>
                                                    </div>
                                                </div>
                                                <div class="row input-row">
                                                    <div class="col-xs-5 col-md-5 sub-event">
                                                        <p class="lead">Poise</p>
                                                    </div>
                                                    <div class="col-xs-7 col-md-7 col-input form-line focused">
                                                        <input type="number" name="evening_poise_{{$key->id}}" class="eveninggown col-xs-7 col-md-7 form-control evening_input_{{$key->id}}" name="number" required="" aria-required="true" aria-invalid="false" step='0.01' placeholder="0.00" min="0" max="25" value="{{$key->IS_EveGown_Poise}}" {{$key->readEVE}}>
                                                    </div>
                                                </div>
                                                <div class="row input-row">
                                                    <div class="col-xs-5 col-md-5 sub-event">
                                                        <p class="lead">Regal</p>
                                                    </div>
                                                    <div class="col-xs-7 col-md-7 col-input form-line focused">
                                                        <input type="number" name="evening_regal_{{$key->id}}" class="eveninggown col-xs-7 col-md-7 form-control evening_input_{{$key->id}}" name="number" required="" aria-required="true" aria-invalid="false" step='0.01' placeholder="0.00" min="0" max="25" value="{{$key->IS_EveGown_Regal}}" {{$key->readEVE}}>
                                                    </div>
                                                </div>
                                                <div class="row input-row" style="border-top: 1px solid #ccc; padding-top: 10px; background: #eee; margin-bottom: 10px;">
                                                    <div class="col-xs-5 col-md-5 sub-event total">
                                                        <p class="lead" style="font-weight:bold; padding-top:10px;">Total</p>
                                                    </div>
                                                    <div class="col-xs-7 col-md-7 col-input form-line focused">
                                                        <input id="eveningTotal{{$key->id}}" type="number" name="eveningTotal_{{$key->id}}" class="col-xs-7 col-md-7 form-control" name="number" required="" aria-required="true" aria-invalid="false" readonly step='0.01' placeholder="0.00" value="{{$key->IS_EveGown_Grace+$key->IS_EveGown_Projection+$key->IS_EveGown_Poise+$key->IS_EveGown_Regal}}" style="font-size:18px;">
                                                    </div>
                                                </div>
                                                @if($key->readEVE != "readonly")
                                                <div class="row">
                                                  <button type="button" class="btn bg-red input" data-rel="{{Auth::user()->id}}|{{$key->id}}|Evening Gown" style="margin:0 auto;display:block;">Save</button>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                      </div>
                                    @endforeach
                                </div>
                              @if($candidates[0]->readEVE != "readonly")
                              <div style="width:120px;margin:auto;">
                                <div class="row" style="margin:auto;">
                                  <button type="button" data-toggle="modal" data-target="#subEve" class="btn bg-red waves-effect">
                                      <i class="material-icons">done</i>
                                      <span>FINALIZE</span>
                                  </button>
                                </div>
                              </div>
                              @endif
                              <div class="modal fade" id="subEve" tabindex="-1" role="dialog">
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
                          <div class="tab-pane" id="standardQuestion">
                                <h3>Standard Question</h3>
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
                                    @if($candidates[0]->readSQ == "readonly")
                                    <div class="col-xs-8 col-md-8">
                                      <button data-rel="sq" data-toggle="modal" data-target="#ranking" type="button" class="btn btn-xs btn-danger waves-effect btnRanking" style="float: right;">
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
                                    <input type="hidden" name="event" value="Standard Question" />
                                    @foreach($candidates as $key)
                                      <div id="stanRow{{$key->id}}" class="item col-xs-3 col-lg-3">
                                        <div class="thumbnail">
                                            <img data-rel="img{{$key->id}}" class="group list-group-image" src="{{$key->image}}" width="200"/>
                                            <div class="caption">
                                                <h5 class="group inner list-group-item-heading" style="margin-bottom: 0">{{$key->fName}} {{$key->lName}}</h5>
                                                <hr />
                                                <div class="row input-row">
                                                    <div class="col-xs-5 col-md-5 sub-event">
                                                        <p class="lead">Content</p>
                                                    </div>
                                                    <div class="col-xs-7 col-md-7 col-input form-line focused">
                                                        <input type="number" name="sq_content_{{$key->id}}" class="stanquestion col-xs-7 col-md-7 form-control sq_input_{{$key->id}}" name="number" required="" aria-required="true" aria-invalid="false" step='0.01' placeholder="0.00" min="0" max="25" value="{{$key->SQ_Content}}" {{$key->readSQ}}>
                                                    </div>
                                                </div>
                                                <div class="row input-row">
                                                    <div class="col-xs-5 col-md-5 sub-event">
                                                        <p class="lead">Confidence</p>
                                                    </div>
                                                    <div class="col-xs-7 col-md-7 col-input form-line focused">
                                                        <input type="number" name="sq_confidence_{{$key->id}}" class="stanquestion col-xs-7 col-md-7 form-control sq_input_{{$key->id}}" name="number" required="" aria-required="true" aria-invalid="false" step='0.01' placeholder="0.00" min="0" max="25" value="{{$key->SQ_Confidence}}" {{$key->readSQ}}>
                                                    </div>
                                                </div>
                                                <div class="row input-row">
                                                    <div class="col-xs-5 col-md-5 sub-event">
                                                        <p class="lead">Wit</p>
                                                    </div>
                                                    <div class="col-xs-7 col-md-7 col-input form-line focused">
                                                        <input type="number" name="sq_wit_{{$key->id}}" class="stanquestion col-xs-7 col-md-7 form-control sq_input_{{$key->id}}" name="number" required="" aria-required="true" aria-invalid="false" step='0.01' placeholder="0.00" min="0" max="25" value="{{$key->SQ_Wit}}" {{$key->readSQ}}>
                                                    </div>
                                                </div>
                                                <div class="row input-row" style="border-top: 1px solid #ccc; padding-top: 10px; background: #eee; margin-bottom: 10px;">
                                                    <div class="col-xs-5 col-md-5 sub-event total">
                                                        <p class="lead" style="font-weight:bold; padding-top:10px;">Total</p>
                                                    </div>
                                                    <div class="col-xs-7 col-md-7 col-input form-line focused">
                                                        <input id="sqTotal{{$key->id}}" type="number" name="sqTotal_{{$key->id}}" class="col-xs-7 col-md-7 form-control" name="number" required="" aria-required="true" aria-invalid="false" readonly step='0.01' placeholder="0.00" value="{{$key->SQ_Content+$key->SQ_Confidence+$key->SQ_Wit}}" style="font-size:18px;">
                                                    </div>
                                                </div>
                                                @if($key->readSQ != "readonly")
                                                <div class="row">
                                                  <button type="button" class="btn bg-red input" data-rel="{{Auth::user()->id}}|{{$key->id}}|Standard Question" style="margin:0 auto;display:block;">Save</button>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                      </div>
                                    @endforeach
                                </div>
                              @if($candidates[0]->readSQ != "readonly")
                              <div style="width:120px;margin:auto;">
                                <div class="row" style="margin:auto;">
                                  <button type="button" data-toggle="modal" data-target="#subQuestion" class="btn bg-red waves-effect">
                                      <i class="material-icons">done</i>
                                      <span>FINALIZE</span>
                                  </button>
                                </div>
                              </div>
                              @endif
                              <div class="modal fade" id="subQuestion" tabindex="-1" role="dialog">
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
                        </div>
                    </div>
                @endif
              </div>
          </div>
        </div> <!-- container -->
    </div> <!-- content -->
  </div>
</section>
<div class="modal fade" id="ranking" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Ranking</h4> <!-- Should be modified-->
            </div>
            <div class="modal-body">
              <div class="panel">
                  <div class="panel-body">
                      <table class="table table-bordered table-striped ranking">
                          <thead>
                              <tr>
                                <th>Candidate</th>
                                <th>College</th>
                                @if(Auth::user()->userType == "organizer")
                                  <th class="sprs">Score</th>
                                  <th class="plrs">Score</th>
                                @elseif(Auth::user()->event == "Final")
                                  <th class="seq">Score</th>
                                  <th class="prod">Score</th>
                                  <th class="theme">Score</th>
                                  <th class="eve">Score</th>
                                  <th class="init">Score</th>
                                  <th class="sq">Score</th>
                                @else
                                <th>Score</th>
                                @endif
                              </tr>
                          </thead>
                          <tbody>
                            @if(Auth::user()->userType == "judge")
                              @foreach($candidates as $key)
                              <tr class="gradeX">
                                <td><p>{{$key->lName}}, {{$key->fName}} {{$key->mName}}</p></td>
                                <td>{{$key->collegeName}}</td>
                                @if(Auth::user()->event == "Talent")
                                  <td><p>{{$key->Talent_Confidence+$key->Talent_Mastery+$key->Talent_StagePresence+$key->Talent_OverallImpact}}</p></td>
                                @elseif(Auth::user()->event == "Speech")
                                  <td><p>{{$key->PSpch_Content+$key->PSpch_Delivery+$key->PSpch_Spontainety+$key->PSpch_Defense}}</p></td>
                                @elseif(Auth::user()->event == "Final")
                                  <td class="seq"><p>{{$key->IS_SeqIntrvw_Content+$key->IS_SeqIntrvw_Wit+$key->IS_SeqIntrvw_Delivery+$key->IS_SeqIntrvw_Confidence}}</p></td>
                                  <td class="prod"><p>{{$key->IS_Production_Confidence+$key->IS_Production_Mastery+$key->IS_Production_StagePresence+$key->IS_Production_OverallImpact}}</p></td>
                                  <td class="theme"><p>{{$key->IS_ThemeWr_Grace+$key->IS_ThemeWr_Projection+$key->IS_ThemeWr_Poise+$key->IS_ThemeWr_Relevance}}</p></td>
                                  <td class="eve"><p>{{$key->IS_EveGown_Grace+$key->IS_EveGown_Projection+$key->IS_EveGown_Poise+$key->IS_EveGown_Regal}}</p></td>
                                  <td class="init"><p>{{$key->IS_InitIntrvw_Content+$key->IS_InitIntrvw_Wit+$key->IS_InitIntrvw_Delivery+$key->IS_InitIntrvw_Confidence}}</p></td>
                                  <td class="sq"><p>{{$key->SQ_Content+$key->SQ_Wit+$key->SQ_Confidence}}</p></td>
                                @endif
                              </tr>
                              @endforeach
                            @elseif(Auth::user()->userType == "organizer")
                              @foreach($press as $key)
                              <tr class="gradeX">
                                <td><p>{{$key->lName}}, {{$key->fName}} {{$key->mName}}</p></td>
                                <td>{{$key->collegeName}}</td>
                                  <td class="sprs"><p>{{$key->SP_RS}}</p></td>
                                  <td class="plrs"><p>{{$key->PL_RS}}</p></td>
                              </tr>
                              @endforeach
                            @endif
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

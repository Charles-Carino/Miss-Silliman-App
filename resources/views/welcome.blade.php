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
        "public/css/images/MED.png",
        "public/css/images/HS.png",
        "public/css/images/CED.png",
        "public/css/images/MC.png",
        "public/css/images/COPVA.png",
        "public/css/images/GRAD.png",
        "public/css/images/IRS.png",
        "public/css/images/NURSING.png",
    ];
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
                    <li class="">
                        <a href="#candidateInfo" data-toggle="tab" aria-expanded="false">
                            <span class="visible-xs"><i class="fa fa-home"></i></span>
                            <span class="hidden-xs">Participant</span>
                        </a>
                    </li>
                </ul>

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
</section>

<!-- For Material Design Colors -->
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Angel Ross</h4> <!-- Should be modified-->
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
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect">SAVE CHANGES</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.master')

@section('content')
<section class="content">
    <div class="container">
        <div class="row col-md-12 align-center">
            <h1> SPECIAL PROJECTS </h1>
        </div>
        <div class="row col-md-12">
        <div class="col-md-3"></div>
            <div class="tabs-vertical-env col-md-6">
                <ul class="nav tabs-vertical">
                    @for( $i=0 ; $i<=12 ; $i++)
                        @if($i==0)
                            <li class="active">
                                <a href=#list-{{$i}} data-toggle="tab" aria-expanded="false">{{$i}}</a>
                            </li>
                        @else
                            <li class="">
                                <a href=#list-{{$i}} data-toggle="tab" aria-expanded="false">{{$i}}</a>
                            </li>
                        @endif
                    @endfor
                </ul>
                <div class="tab-content" style="padding:100px">
                    @for( $i=0 ; $i<=12 ; $i++)
                        @if($i==0)
                            <div class="tab-pane active width-auto" id=list-{{$i}}>
                                <div class="card" style="padding : 20px">
                                    <div class="align-center">
                                        <img
                                            class="card-img-top"
                                            src="public/css/images/testImg.jpg"
                                            alt="Card image cap"
                                            style="height : 250px; width : 250px; border-radius : 50%">
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title">COLLEGE OF {{$i}}</h3>
                                        <h5 class="card-title">NAME {{$i}}</h5>
                                        <div class="input-group input-group-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-lg">SCORE</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="tab-pane width-auto" id=list-{{$i}}>
                                <div class="card col-sm-12" style="padding : 20px">
                                    <div class="align-center">
                                        <img
                                            class="card-img-top"
                                            src="public/css/images/testImg.jpg"
                                            alt="Card image cap"
                                            style="height : 250px; width : 250px; border-radius : 50%">
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title">COLLEGE OF {{$i}}</h3>
                                        <h5 class="card-title">NAME {{$i}}</h5>
                                        <div class="input-group input-group-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-lg">SCORE</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endfor
                    <div class="col-md-2"></div>
                </div>
            </div>
        <div class="col-md-3"></div>
        </div>
    </div> <!-- container -->
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
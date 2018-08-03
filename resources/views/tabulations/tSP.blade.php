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
    <div class="container">
        <div class="row col-md-12 align-center">
            <h1> SPECIAL PROJECTS </h1>
        </div>
        <div class="row col-md-12">
            <div class="col-md-3"></div>
            <div class="tabs-vertical-env col-md-6">
                <ul class="nav tabs-vertical">
                    @for( $i=0 ; $i<=9 ; $i++)
                        @if($i==0)
                            <li class="active">
                                <a href=#list-{{$i}} data-toggle="tab" aria-expanded="false">{{$collegeCode[$i]}}</a>
                            </li>
                        @else
                            <li class="">
                                <a href=#list-{{$i}} data-toggle="tab" aria-expanded="false">{{$collegeCode[$i]}}</a>
                            </li>
                        @endif
                    @endfor
                </ul>
                <div class="tab-content" style="padding:100px">
                    @for( $i=0 ; $i<=9 ; $i++)
                        @if($i==0)
                            <div class="tab-pane active width-auto" id=list-{{$i}}>
                                <div class="card" style="padding : 20px">
                                    <div class="align-center">
                                        <img
                                            class="card-img-top"
                                            src={{$picSrc[$i]}}
                                            alt="Card image cap"
                                            style="height : 250px; width : 250px; border-radius : 50%">
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title">{{$collegeCode[$i]}}</h3>
                                        <h5 class="card-title">{{$name[$i]}}</h5>
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
                                            src={{$picSrc[$i]}}
                                            alt="Card image cap"
                                            style="height : 250px; width : 250px; border-radius : 50%">
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title">{{$collegeCode[$i]}}</h3>
                                        <h5 class="card-title">{{$name[$i]}}</h5>
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



        <div class="row col-md-12 align-center" style="padding : 50px">
            <a data-toggle="modal" data-target="#defaultModal" style="text-decoration:none;">
                <button type="button" class="btn btn-link waves-effect btn-success">SAVE CHANGES</button>
            </a>
        </div>
    </div> <!-- container -->
</section>

<!-- For Material Design Colors -->
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
              <div class="row">
              <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Score Tabulation</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>College Code</th>
                                        <th>Candidate</th>
                                        <th>Score</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for($i=0;$i<=9;$i++)
                                    <!--TODO: check for score or no score-->
                                    <tr class="active">
                                        <td>{{$collegeCode[$i]}}</td>
                                        <td>{{$name[$i]}}</td>
                                        <td><input type="number" disabled class="form-control perm" name="pp-sp-" min="0" max="100"></td>
                                    </tr>
                                    @endfor
                                    <tr class="success">
                                        <td>College Code</td>
                                        <td>Success</td>
                                        <td>has score</td>
                                    </tr>
                                    <tr>
                                        <td>College Code</td>
                                        <td>Name</td>
                                        <td>Column content</td>
                                    </tr>
                                    <tr class="danger">
                                        <td>College Code</td>
                                        <td>Name</td>
                                        <td>No score</td>
                                    </tr>
                                </tbody>
                            </table>
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
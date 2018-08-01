@extends('layouts.master')

@section('content')
<section class="content">
  <div class="row clearfix">
      <!-- Start content -->
      <div class="content">
          <div class="container">
            <div class="col-lg-12">
                <ul class="nav nav-tabs tabs tabs-top">
                    <li class="active tab">
                        <a href="#candidateInfo" data-toggle="tab" aria-expanded="false">
                            <span class="visible-xs"><i class="fa fa-home"></i></span>
                            <span class="hidden-xs">Participant</span>
                        </a>
                    </li>
                    <li class="tab">
                        <a href="#pressLaunch" data-toggle="tab" aria-expanded="false">
                            <span class="visible-xs"><i class="fa fa-user"></i></span>
                            <span class="hidden-xs">Press Launch</span>
                        </a>
                    </li>
                    <li class="tab">
                        <a href="#prePageant" data-toggle="tab" aria-expanded="true">
                            <span class="visible-xs"><i class="fa fa-envelope-o"></i></span>
                            <span class="hidden-xs">Pre-Pageant</span>
                        </a>
                    </li>
                    <li class="tab">
                        <a href="#finals" data-toggle="tab" aria-expanded="false">
                            <span class="visible-xs"><i class="fa fa-cog"></i></span>
                            <span class="hidden-xs">Finals</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content col-lg-12">
                    <div class="tab-pane active" id="candidateInfo">
                      <div class="col-lg-4">
                          <a data-toggle="modal" data-target="#defaultModal" style="text-decoration:none;">
                            <div class="info-box-4">
                              <div class="icon">
                                  <img src="public/css/images/testImg.jpg" width="72" height="72" alt="User" style="border-radius: 50%;"/>
                              </div>
                              <div class="content">
                                  <div class="text">College of Computer Studies</div>
                                  <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">Angel Ross</div>
                              </div>
                            </div>
                        </a>
                      </div>
                      <div class="col-lg-4">
                          <a data-toggle="modal" data-target="#defaultModal" style="text-decoration:none;">
                            <div class="info-box-4">
                              <div class="icon">
                                  <img src="public/css/images/testImg.jpg" width="72" height="72" alt="User" style="border-radius: 50%;"/>
                              </div>
                              <div class="content">
                                  <div class="text">College of Computer Studies</div>
                                  <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">Angel Ross</div>
                              </div>
                            </div>
                        </a>
                      </div>
                      <div class="col-lg-4">
                          <a data-toggle="modal" data-target="#defaultModal" style="text-decoration:none;">
                            <div class="info-box-4">
                              <div class="icon">
                                  <img src="public/css/images/testImg.jpg" width="72" height="72" alt="User" style="border-radius: 50%;"/>
                              </div>
                              <div class="content">
                                  <div class="text">College of Computer Studies</div>
                                  <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">Angel Ross</div>
                              </div>
                            </div>
                        </a>
                      </div>
                    </div>
                    <div class="tab-pane" id="pressLaunch">
                      <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                      <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                    </div>
                    <div class="tab-pane" id="prePageant">
                        <div class="tab-content col-lg-12">
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="panel panel-default">
                                      <div class="panel-body">
                                          <div class="row">
                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                                  <div class="table-responsive">
                                                      <table class="table">
                                                          <thead>
                                                              <tr>
                                                                  <th>Candidate</th>
                                                                  <th>SPECIAL PROJECTS</th>
                                                                  <th>TALENT</th>
                                                                  <th>SPEECH</th>
                                                              </tr>
                                                          </thead>
                                                          <tbody>
                                                              @for($i=0;$i < 12;$i++)
                                                              <tr>
                                                                  <td>
                                                                    <div class="col-md-2">
                                                                      <img src="public/css/images/testImg.jpg" width="64" height="64" alt="User" style="border-radius: 50%;"/>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                      <h5>Angel Ross</h5>
                                                                      <h5>College of Computer Studies</h5>
                                                                      <h5>23</h5>
                                                                    </div>
                                                                  </td>
                                                                  <td>
                                                                    <div class="col-sm-3 form-group">
                                                                        <input type="number" class="form-control perm" name="pp-sp-" min="0" max="100">
                                                                    </div>
                                                                  </td>
                                                                  <td>
                                                                    <div class="col-sm-3 form-group">
                                                                        <input type="number" class="form-control perm" name="pp-ta-" min="0" max="100">
                                                                    </div>
                                                                  </td>
                                                                  <td>
                                                                    <div class="col-sm-3 form-group">
                                                                        <input type="number" class="form-control perm" name="pp-sh-" min="0" max="100">
                                                                    </div>
                                                                  </td>
                                                              </tr>
                                                              @endfor
                                                          </tbody>
                                                      </table>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div> <!-- End row -->
                        </div>
                    </div>
                    <div class="tab-pane" id="finals">
                        <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
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

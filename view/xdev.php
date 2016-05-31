<!-- Modal 6 (Long Modal)-->
<div class="modal fade" id="xdev">
    <div class="modal-dialog" style="width: 80%">
        <div class="modal-content">

            <div class="modal-header" align="center">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i style="font-size: 15pt;" class="fa fa-desktop"></i>   Welcome to Xdev</h4>
            </div>

            <div class="modal-body">


                <div class="row">

                    <div class="col-md-12">

                        <div class="panel-group" id="accordion-test-2">

                            <div class="panel panel-default ">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapseOne-2" class="collapsed">
                                            <i class="fa fa-code text-blue"></i>  SESSION
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne-2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <pre><?php $i ++ ;
var_dump ( $_SESSION ) ; ?></pre>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapseTwo-2" class="collapsed">
                                            <i class="fa fa-code text-blue"></i> POST
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo-2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <pre><?php $i ++ ;
var_dump ( $_POST ) ; ?></pre>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapseThree-2" class="collapsed">
                                            <i class="fa fa-code text-blue"></i>  GET
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree-2" class="panel-collapse collapse">
                                    <div class="panel-body">

                                        <pre><?php $i ++ ;
var_dump ( $_GET ) ; ?></pre>

                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default ">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapseFour-2" class="collapsed">
                                            <i class="fa fa-code text-blue"></i> SERVER
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseFour-2" class="panel-collapse collapse ">
                                    <div class="panel-body">
                                        <pre><?php $i ++ ;
var_dump ( $_SERVER ) ; ?></pre>
                                    </div>
                                </div>

                            </div>
                            <div class="panel panel-default ">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapseFive-2" class="collapsed">
                                            <i class="fa fa-code text-blue"></i>  FILES
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseFive-2" class="panel-collapse collapse ">
                                    <div class="panel-body">
                                        <pre><?php $i ++ ;
var_dump ( $_FILES ) ; ?></pre>
                                    </div>
                                </div>

                            </div>
                            <div class="panel panel-default ">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapseSix-2" class="collapsed">
                                            <i class="fa fa-code text-blue"></i> SQL
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseSix-2" class="panel-collapse collapse ">
                                    <div class="panel-body">
                                        <pre><?php $i ++ ;
var_dump ( $sql ) ; ?></pre>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>


                </div>



            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-blue" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>
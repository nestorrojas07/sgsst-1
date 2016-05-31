
                <div class="row">

                    <div class="col-sm-3">
                        <?php $total_empleados = 1200 ; ?>
                        <div class="xe-widget xe-progress-counter xe-progress-counter-blue" data-count=".num" data-from="0" data-to="<?php echo $total_empleados ?>" data-duration="2">

                            <div class="xe-background">
                                <i class="fa fa-users"></i>
                            </div>

                            <div class="xe-upper">
                                <div class="xe-icon">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="xe-label">
                                    <h4><a href="browser_empleados.php"><b class="text-white"> EMPLEADOS</b></a></h4>
                                    <strong class="num">0</strong>
                                </div>
                            </div>

                            <div class="xe-progress">
                                <span class="xe-progress-fill" data-fill-from="0" data-fill-to="100" data-fill-unit="%" data-fill-property="width" data-fill-duration="2" data-fill-easing="true"></span>
                            </div>
                            <div class="xe-lower">
                                <strong><h6>100 % Empleados</h6> </strong>
                            </div>

                        </div>

                    </div>

                    <div class="col-sm-3">
                        <?php $total_hv = 1050 ; ?>
                        <div class="xe-widget xe-progress-counter xe-progress-counter-turquoise" data-count=".num" data-from="0" data-to="<?php echo $total_hv ; ?>" data-duration="2">

                            <div class="xe-background">
                                <i class="linecons-attach"></i>
                            </div>

                            <div class="xe-upper">
                                <div class="xe-icon">
                                    <i class="linecons-attach"></i>
                                </div>
                                <div class="xe-label">
                                    <h4><a href="browser_empleados.php"><b class="text-white">HOJAS DE VIDA</b></a></h4>
                                    <strong class="num">0</strong>
                                </div>
                            </div>

                            <div class="xe-progress">
                                <span class="xe-progress-fill" data-fill-from="0" data-fill-to="<?php echo $total_hv * 100 / $total_empleados ; ?>" data-fill-unit="%" data-fill-property="width" data-fill-duration="2" data-fill-easing="true"></span>
                            </div>
                            <div class="xe-lower">
                                <strong><h6><?php echo number_format ( ($total_hv * 100 / $total_empleados ) , 2 ) ; ?> %</h6> </strong>
                            </div>

                        </div>

                    </div>

                    <div class="col-sm-3">
                        <?php $total_contratos = 1078; ?>
                        <div class="xe-widget xe-progress-counter xe-progress-counter-red" data-count=".num" data-from="0" data-to="<?php echo $total_contratos ; ?>" data-duration="2">

                            <div class="xe-background">
                                <i class="fa fa-file-text"></i>
                            </div>

                            <div class="xe-upper">
                                <div class="xe-icon">
                                    <i class="fa fa-file-text"></i>
                                </div>
                                <div class="xe-label">
                                    <h4><a href="browser_empleados.php"><b class="text-white">CONTRATOS</b></a></h4>
                                    <strong class="num">0</strong>
                                </div>
                            </div>

                            <div class="xe-progress">
                                <span class="xe-progress-fill" data-fill-from="0" data-fill-to="<?php echo $total_contratos * 100 / $total_empleados ; ?>" data-fill-unit="%" data-fill-property="width" data-fill-duration="2" data-fill-easing="true"></span>
                            </div>
                            <div class="xe-lower">
                                <strong><h6><?php echo number_format ( ($total_contratos * 100 / $total_empleados ) , 2 ) ; ?> %</h6> </strong>
                            </div>

                        </div>

                    </div>


                    <div class="clearfix"></div>

                    

                </div>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
     
          <!-- Be sure to leave the brand out there if you want it shown -->
          <img src="images/tsw.png" class="brand">
             <div class="nav-collapse">
            <?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'pull-right nav'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
                    'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,   
                    'items'=>array(
                        array('label'=>'REGEV <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                            array('label'=>'Usuarios', 'url'=>array('/datosvictimaexpediente/admin')),
                           
                        )
                    ), 

                        array('label'=>'Recursos Humanos <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                            array('label'=>'Usuarios', 'url'=>array('/datosvictimaexpediente/admin')),
                           
                        )
                    ),                         array('label'=>'Psicología <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                            array('label'=>'Usuarios', 'url'=>array('/datosvictimaexpediente/admin')),
                           
                        )
                    ),                                          
                        array('label'=>'Jurídico <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                            array('label'=>'Captura de Datos', 'url'=>array('/jurInformes/admin')),
                           
                        )
                    ),                        
                        array('label'=>'Trabajo Social <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                             array('label'=>'Victimas Directas', 'url'=>array('/tsExpVicDirecta/admin')),
                             array('label'=>'Padron Solicitantes', 'url'=>array('/SolSolicitante/admin')),
                            // array('label'=>'Solicitante', 'url'=>array('/solSolicitante/create')),
                             array('label'=>'Estudio Socio-Economico', 'url'=>array('/datosvictimaexpediente/admin')),
                           
                        )
                    ),
                        array('label'=>'Ingresar', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                        array('label'=>'Salir ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                    ),

                )); ?>
        </div>
    </div>
    </div>
</div>

<div class="subnav navbar navbar-fixed-top">
    <div class="navbar-inner">

    </div><!-- navbar-inner -->
</div><!-- subnav -->
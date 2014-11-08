<div class="main">


<div class="units-row first-main"  >
    <div class="unit-100">
    
        <div class="hiddenmobile" style="display: inline-block;float: left;padding-top: 5px">
                    México D.F. a <?=strftime('%A %d de %B de %Y', time())?> 
        </div>
      
        <div style="display: inline-block;padding-top: 1px;">    
        <form action="<?=base_url()?>busqueda">
                <input type="text" name="txt" class="input-on-black"  placeholder="Criterio de Búsqueda" />
                <span class="btn-append">
                    <button class="btn btn-white btn-outline" style="margin-right:5px;">Buscar</button>
                </span>
        <form>
        </div>
    </div>
</div>

<div class="units-row">
    <!-- Columna Izquierda -->
    <div class="unit-65">
        <div><a href="<?=base_url()?>detallenota?nota=<?=$nota_principal['id']?>">
            <img src="<?=base_url().$nota_principal['featured_image']?>" alt="<?=$nota_principal['title']?>" width="100%" class="featured_image">
            <div class="imgholder-container unit-65">
                <div class="imgholder">
                    <?=$nota_principal['title']?>
                </div>
            </div>
            </a>
        </div>
        <div>
            <ul class="lista-2">
                <?php
                    foreach ($notas_recientes as $key => $value) {
                ?>
                    <li>
                        <div>
                        <a href="<?=base_url()?>detallenota?nota=<?=$value['id']?>">
                            <div class="unit-40">
                                <!--
                                <img class="hiddenmobile"  src="http://lorempixel.com/280/240/technics/" alt="">
                                <img class="hiddendesktop" src="http://lorempixel.com/240/280/technics/" alt="">
                                -->
                                <img class="thumb" style="margin-top: 2em;"  src="<?=base_url().$value['featured_image']?>" alt="<?=$value['title']?>" >
                            </div>
                            <div class="unit-60" style="font-size:1.2em;">
                                 <img src="images/icons/user.png" width="45" alt="">
                                 <span>Por: <?=$value['seudonimo']?>  <?=$value['modify_date']?></span><br/>
                                 <h3><?=$value['title'];?></h3><br/>
                                 <?=$value['description'];?>
                            </div>
                            </a>
                        </div>
                    </li>
                
                <?php
                    }
                ?>

        </div>
        <div class="unit-push-right unit-50" style="text-align:right;margin-right:1em;">
            <a href="<?=base_url()?>notas">Ver más notas >></a>
        </div>
    </div>
    
    <!-- Columna derecha -->
    <div class="unit-35 hiddenmobile" style="margin:0;width:34.3%;">
        <div>
            <div class="title-2">Últimas Facturas</div>
            <div>
                <ul class="lista-1">
                    <?php
                        foreach ($facturas_recientes as $key => $value) {
                    ?>
                    <li>
                        <div><a href="<?=base_url()?>detallefactura?factura=<?=$value['id']?>" style="color:#000;">
                            <div class="unit-30">
                                <img src="images/icons/money.png" width="50" alt="">
                            </div>
                            <div class="unit-70">
                                <span style="font-weight:bold;"><?=$value['name']?>:</span>
                                <span style="font-size:1em;"><?=$value['detail']?></span>
                                <span style="color:#ACDF47;"><?=money_format('%i',$value['amount'])?></span>
                            </div>
                            </a>
                        </div>
                    </li>
                    <?php
                        }
                    ?>

                    <div class="unit-push-right unit-80" style="text-align:right;margin-right:1em;">
                        <a href="<?=base_url()?>facturas">Ver más facturas >></a>
                    </div>
                    
                    <li style="width:100%;">
                            <div class="unit-100 hiddenmobile" >
                                <img  width="100%" src="<?=($banner_der==null) ? 'http://dummyimage.com/300x300/000/fff.png&text=' : $banner_der['image']?>" alt="">
                            </div>
                    </li>
                    
                    
                </ul>
            </div>
        </div>
    </div>
</div>

<!--
<div class="units-row first-main" >

        <div class="hiddenmobile" style="display: inline-block;float: left;padding-top: 5px;">
                Búsqueda de gastos registrados ene el sistema:
        </div>
    
        <div style="display: inline-block;padding-top: 1px;">    
                <input type="text" name="go" class="input-on-black"  placeholder="Búsqueda" />
                <span class="btn-append">
                    <button class="btn btn-white btn-outline" style="margin-right:5px;">Go</button>
                </span>
        </div>

</div>
-->
<div class="units-row">


<div class="unit-50" >
        <div>
            <div class="title-2"> Ranking de Monto en Facturas</div>
            <div>
                <ul class="lista-1"> 

                <?php
                    foreach ($facturas_monto as $key => $value) {
                ?>
                    <li>
                        <div><a href="<?=base_url()?>detallefactura?factura=<?=$value['id']?>" style="color:#000;">
                            <div class="unit-20">
                                <img src="images/icons/notebook.png" alt="">
                            </div>
                            <div class="unit-40">
                                <span style="font-weight:bold;"><?=$value['name']?>:</span>
                                <span style="font-size:0.8em;"><?=$value['detail']?></span>
                            </div>
                            <div class="unit-40">
                                <div>
                                    <?=$value['modify_date']?>
                                </div>
                                <div><span style="color:#ACDF47;"><?=money_format('%i',$value['amount'])?></span></div>
                            </div>
                            </a>
                        </div>
                    </li>
                    
                  <?php  
                    }
                  ?>

                    </li>
                    
                </ul>
            </div>
        </div>
    </div>
    
<div class="unit-50" >
        <div>
            <div class="title-2">Ranking de Más Beneficiados</div>
            <div>
                <ul class="lista-1">

                <?php
                    foreach ($facturas_beneficiados as $key => $value) {
                ?>
                    <li>
                        <div><a href="<?=base_url()?>detallefactura?factura=<?=$value['id']?>" style="color:#000;">
                            <div class="unit-20">
                                <img src="images/icons/stats.png" alt="">
                            </div>
                            <div class="unit-40">
                                <span style="font-weight:bold;"><?=$value['name']?>:</span>
                                <span style="font-size:0.8em;"><?=$value['emisor_name']?></span>
                            </div>
                            <div class="unit-40">
                                <div ><?=$value['emisor_rfc']?></div>
                                <div ><span style="color:#ACDF47;"><?=money_format('%i',$value['total'])?></span></div>
                            </div>
                            </a>
                        </div>
                    </li>
                    
                  <?php  
                    }
                  ?>                    
                </ul>
            </div>
        </div>
    </div>

</div>


</div>
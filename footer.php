<!-- Start Footer Section -->
<footer>
    <div class="container">
        <div class="row footer-widgets">

            <!-- Start Index Widget -->
            <div class="col-md-6 col-xs-12">
                <div class="footer-widget twitter-widget">
                    <h4>Índice<span class="head-line"></span></h4>
                    <a href="index.php"><strong>Ínicio</strong></a><br>
                    <a href="estatistica.php"><strong>Estatísticas</strong></a><br>
                    <a href="atos.php"><strong>Atos de Profissão</strong></a><br>
                    <?php
                        require_once('funcoes.php');
                    
                        $grupos_atos = get_grupo_ato();
                        if(mysqli_num_rows($grupos_atos) > 0) {
                            while($row = mysqli_fetch_array($grupos_atos)) {
                                echo '<form id="indice'.$row['ID_ATO_PROFISSAO'].'" action="atoprofissao.php" method="post">';
                                echo '&nbsp&nbsp&nbsp<a href="javascript:;" onclick="document.getElementById(\'indice'.$row['ID_ATO_PROFISSAO'].'\').submit();">';
                                echo $row['DESIGNACAO'];
                                echo '</a>';
                                echo '<input type="hidden" name="idato" value="'.$row['ID_ATO_PROFISSAO'].'">';
                                echo '</form>';
                            }
                        }
                    ?>    
                    <a href="cursos.php"><strong>Cursos</strong></a><br>
                    <a href="contact.php"><strong>Contactos</strong></a>
                </div>
            </div>
            <!-- .col-md-3 -->
            <!-- End Index Widget -->

            <!-- Start Contact Widget -->
            <div class="col-md-6 col-xs-12">
                <div class="footer-widget contact-widget">
                    <h4>Links<span class="head-line"></span></h4>
                    <a href="http://www.uminho.pt/"><img src="images/footer/um.png" style="max-width: 100px;"></a>
                    <a href="http://www.eng.uminho.pt/"><img src="images/footer/ee.png" style="max-width: 100px;"></a>
                    <a href="http://www.dsi.uminho.pt/"><img src="images/footer/dsi.png" style="max-width: 100px;"></a>
                    <a href="http://miegsi.dsi.uminho.pt/"><img src="images/footer/miegsi.png" style="max-width: 100px;"></a>
                    <a href="http://www.ordemengenheiros.pt/"><img src="images/footer/oe.jpg" style="max-width: 100px;"></a>
                </div>
                <!-- .col-md-3 -->
                <!-- End Contact Widget -->
            </div>

        </div>
        <!-- .row -->

        <!-- Start Copyright -->
        <div class="copyright-section">
            <div class="row">
                <div class="col-md-6">
                    <p>PTSI 2015/2016 - Equipa 25 - AEI</p>
                </div>
                <!-- .col-md-6 -->
                <div class="col-md-6">
                    <ul class="footer-nav">                        
                        <li><a href="contact.php">Contactos</a>
                        </li>
                    </ul>
                </div>
                <!-- .col-md-6 -->
            </div>
            <!-- .row -->
        </div>
    </div>
</footer>
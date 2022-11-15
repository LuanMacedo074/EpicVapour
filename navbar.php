<script src="js/jqueryfunctions.js"></script>
<div class="navbar">
        <nav>
            <ul>
                <li><a class="img" href="index.php" style="margin-left: 15px;"><img src="./siteimages/logo.png" id="logo"></a></li>
                <li><a href="javascript:void(0)">Comunidade</a></li>
                <li><a href="javascript:void(0)">Jogos</a></li>
                <li><a href="javascript:void(0)">Contato</a></li>
                <?php 
                if (! array_key_exists("userdata", $_SESSION)){ echo <<<TXT
                <li style="float:right; margin-right: 15px"><a href="registro.php">Registro</a></li>
                <li style="float:right"><a href="login.php">Entrar</a></li>
                TXT;
                }
                else{
                $data = $_SESSION["userdata"];
                $username = $data["nomeUsuario"];
                $saldo = $data["saldo"];
                ?>
                <li style="float:right"><a href="javascript:void(0)"><?php echo strtoupper($username)?></a></li>
                <li style="float:right"><a href="javascript:void(0)"><?php echo "R$: $saldo" ?></a></li>    
                <?php
                }?>
            </ul>
        </nav>
</div>
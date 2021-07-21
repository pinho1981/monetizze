<?php
    namespace Monetizze;

    require("Main.php");

    use Monetizze\Main;

    $games = new Main(4, 9);
    $raffle = $games->makeRaffle();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Desafio Monetizze</title>
        <meta charset="utf-8">
        <meta name="author" content="Carlos André Barbosa">
        <meta name="description" content="Desafio Monetizze para vaga de PHP">        
    </head>

    <body>
        <div>
            <div>                
                <div>
                    <div>
                        <table>
                            <thead>
                                <tr>
                                    <th colspan="4">Resultado do Jogo</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <?php
                                        foreach($games->getOutput() as $key => $output) {
                                    ?>
                                        <td><?php echo $output; ?></td>
                                    <?php
                                        } // End foreach
                                    ?>
                                </tr>
                            </tbody>

                            <tfoot>
                                 &copy; Carlos André Barbosa
                            </tfoot>
                        </table>
                    </div>
                </div>

                <div>
                    <div>
                        <?php
                            foreach($games->getGames() as $key => $game) {
                        ?>
                        <table>
                            <thead>
                                <tr>
                                    <th colspan="<?php echo $games->getDonzes(); ?>">
                                        Jogo <?php echo $key + 1; ?>                                        
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <?php foreach($game as $value) { ?>
                                        <td style="<?php if($jogos->NumberAlert($valor, $key, $soterio)) echo "background: yellow"; ?>">
                                            <?php echo $value; ?>
                                        </td>
                                    <?php
                                        } // End foreach
                                    ?>
                                </tr>
                            </tbody>
                            <tfoot>
                                &copy; Carlos André Barbosa
                            </tfoot>
                        </table>
                        <?php } ?>  <!-- End foreach --> 
                    </div>                                              
                </div>
            </div>
        </div>        
    </body>      
</html>
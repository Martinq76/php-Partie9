<?php
$calendarMonths = ['1' => 'Janvier', '2' => 'Février', '3' => 'Mars', '4' => 'Avril', '5' => 'Mai', '6' => 'Juin', '7' => 'Juillet', '8' => 'Août', '9' => 'Septembre', '10' => 'Octobre', '11' => 'Novembre', '12' => 'Décembre'];
$calendarYears = [0, 2000, 2001, 2002, 2003, 2004, 2005, 2006, 2007, 2008, 2009, 2010, 2011, 2012, 2013, 2014, 2015, 2016, 2017, 2018, 2019, 2020, 2021, 2022, 2023, 2024, 2025, 2026, 2027, 2028, 2029, 2030];
$day = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
        ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
        <title>Partie 9 TP</title>
    </head>
    <body>
        <form class="form-inline" method="post">
            <select name="selectMonths" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                <optgroup label="Mois">
                    <?php
                    foreach ($calendarMonths as $key => $value) {
                        ?>

                        <option value="<?= $key ?>"><?= $value ?></option>
                        <?php
                    }
                    ?>
                </optgroup>
            </select>

            <select name="selectYears" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                <optgroup label="Années">
                    <?php
                    for ($i = 1; $i <= 31; $i++) {
                        ?>

                        <option><?= $calendarYears[$i] ?></option>
                        <?php
                    }
                    ?>
                </optgroup>
            </select>

            <button type="submit" class="btn btn-primary my-1">Envoyé</button>
        </form>
        <?php
        if (isset($_POST['selectMonths']) && isset($_POST['selectYears'])) {
            setlocale(LC_TIME, 'fr_FR.utf8');
            ?>
   
            
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th colspan="7" class="text-center"><?= strftime('%B %Y', mktime(0, 0, 0, $_POST['selectMonths'], 1, $_POST['selectYears']))?></th>
                    </tr>
                    <tr>
                        <?php
                        foreach ($day as $name) {
                            ?>
                            <th><?= $name ?></th>
                            <?php
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < 7; $i++):
                        ?>
                        <tr><?php
                            for ($d = 0; $d < 7; $d++):
                                ?>
                                <td><?php
                                    if ($i == 1 and $d == strftime('%u', mktime(0, 0, 0, $_POST['selectMonths'], 1, $_POST['selectYears']))):
                                        echo strftime('%e', mktime(0, 0, 0, $_POST['selectMonths'], $nbjour + 1, $_POST['selectYears']));
                                        $nbJour++;
                                    elseif ($i == 1 and $d > strftime('%u', mktime(0, 0, 0, $_POST['selectMonths'], 1, $_POST['selectYears']))):
                                        echo strftime('%e', mktime(0, 0, 0, $_POST['selectMonths'], $nbJour + 1, $_POST['selectYears']));
                                        $nbJour++;
                                    elseif ($i > 1):
                                        if ($nbJour >= date('t', mktime(0, 0, 0, $_POST['selectMonths'], 1, $_POST['selectYears']))):
                                            echo '';
                                        else:
                                            echo strftime('%e', mktime(0, 0, 0, $_POST['selectMonths'], $nbJour + 1, $_POST['selectYears']));
                                            $nbJour++;
                                        endif;
                                    endif;
                                    ?></td>
                                <?php
                            endfor;
                            ?>
                        </tr>
                        <?php
                    endfor;
                    ?>                    
                </tbody>
            </table>
            <?php
        }
        ?>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
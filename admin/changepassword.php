<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
    <div class="grid_10">
        <div class="box round first grid">
            <h2>Changement MDP</h2>
            <div class="block">
                <form>
                    <table class="form">
                        <tr>
                            <td>
                                <label>Ancien MDP</label>
                            </td>
                            <td>
                                <input type="password" placeholder="Entrer l'ancien MDP..." name="title"
                                       class="medium"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Nouveau MDP</label>
                            </td>
                            <td>
                                <input type="password" placeholder="Entrer le nouveau MDP..." name="slogan"
                                       class="medium"/>
                            </td>
                        </tr>


                        <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Sauvegarder"/>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
<?php include 'inc/footer.php'; ?>
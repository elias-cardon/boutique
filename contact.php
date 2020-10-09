<!DOCTYPE html>
<html>
<head>
    <title>Contact</title>
</head>
<body>
<header>
    <?php
    require_once('include/header.php');
    ?>
</header>
<main>
	<div class="container my-5 py-5 z-depth-1">

  <!--Section: Content-->
  <section class="px-md-5 mx-md-5 text-center text-lg-left dark-grey-text">


    <!--Grid row-->
    <div class="row d-flex justify-content-center">

      <!--Grid column-->
      <div class="col-md-6">

        <!-- Default form contact -->
        <form class="text-center" action="#!">

         <h3 class="font-weight-bold mb-4">Contactez nous</h3>

          <!-- Name -->
          <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="Nom">

          <!-- Email -->
          <input type="email" id="defaultContactFormEmail" class="form-control mb-4" placeholder="E-mail">

          <!-- Subject -->
          <label>Sujet du message</label>
          <select class="browser-default custom-select mb-4">
            <option value="" disabled>Choisissez une option</option>
            <option value="1" selected>Commande</option>
            <option value="2">Livraison</option>
            <option value="3">Assurance</option>
            <option value="4">Autre</option>
          </select>

          <!-- Message -->
          <div class="form-group">
            <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3"
              placeholder="Message"></textarea>
          </div>

          <!-- Copy -->
          <div class="custom-control custom-checkbox mb-4">
            <input type="checkbox" class="custom-control-input" id="defaultContactFormCopy">
            <label class="custom-control-label" for="defaultContactFormCopy">Envoyer une copie de cet email</label>
          </div>

          <!-- Send button -->
          <button class="btn btn-info btn-block" type="submit">Envoyer</button>

        </form>
        <!-- Default form contact -->

      </div>
      <!--Grid column-->

    </div>
    <!--Grid row-->


  </section>
  <!--Section: Content-->


</div>
</main>
<footer>
    <?php
    require_once('include/footer.php');
    ?>
</footer>
</body>
</html>
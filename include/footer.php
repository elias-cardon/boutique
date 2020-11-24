<footer>
  <nav class="footer-inner">
    <section class="footer-item">
      <h1>La Bonne Planque</h1>
      
      <h2>Nous créons des possibilités <br>pour le monde connecté.<br><b class="color">Soyez audacieux.</b></h2>
    </section>
        
    <section class="footer-item">
      <h3>Nous, c'est le vous</h3>
        <ul>
          <li><a href="propos.php">A propos de nous</a></li>
          <li><a href="engagement.php">Engagements</a></li>
          <li><a href="faq.php">FAQ</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
    </section>
          
    <section class="footer-item">
      <h3>Rendez-nous visite</h3>
        <a href="#">
        <p>8 rue d'Hozier</p>
        <p>13002 Marseille</p>
        </a>
            
      
    </section>
            
    <section class="footer-item">
      <h3>Contactez-nous</h3>
        <p><a href="#">+33 1 23 45 56 67</a></p>
    </section>
        
    <section class="footer-item">
      <h3>Réseaux sociaux</h3>
        <ul>
          <li><a href="https://www.instagram.com/?hl=fr">Instagram</a></li>
          <li><a href="https://twitter.com/?lang=fr">Twitter</a></li>
          <li><a href="https://fr.linkedin.com/">LinkedIn</a></li>
            <li><a href="https://fr-fr.facebook.com/">Facebook</a></li>
        </ul>
    </section>
        
    <section class="footer-item">
      <h3>Légal</h3>
        <ul>
          <li><a href="CGU.php">CGU</a></li>
          <li><a href="livraison.php">Livraison</a></li>
        </ul>
    </section>
  </nav>
</footer>

<style>
	footer {
    background-color: black;
    font-family: "Lato", sans-serif;
    padding: 85px 0 285px 0;
}

.footer-inner {
    width: 90%;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 120px;
    max-width: 1170px;
    position: relative;
}

.footer-item {
    float: left;
    margin: 0 7.2% 0 0;
}

.footer-item:nth-of-type(4) {
    display: none;
}

.footer-item:nth-of-type(7) {
    float: right;
    margin-right: 0;
}

.footer-button {
    color: white;
    position: relative;
    font-weight: 400;
    font-size: 16px;
    transition: 1s;
    transition-delay: .2s;
    padding: 14px;
}
  
.footer-button:after {
    content: "";
    position: absolute;
    top: 45px;
    right: 13px;
    /*background-color: white;*/
    height: 1px;
    width: 86px;
    transition: .6s;
}
  
.footer-button:hover {
    color: black;
    /*background-color: white;*/
}
  
.footer-button:hover:after {
    width: 112px;
    right: 0px;
}

h1 {
    font-weight: 900;
    color: white;
    font-size: 24px;
    letter-spacing: 2px;
    margin: 0;
    padding-bottom: 10px;
}
  
h2 {
    font-weight: 300;
    line-height: 1.8;
    font-size: 13px;
    color: #d1d1d1;
    letter-spacing: 0.03em;
    padding: 15px 0 0 0;
}
  
.color {
    color: white;
    font-weight: 400;
}
  
h3 {
    font-weight: 400;
    font-size: 13px;
    color: white;
    margin: 0;
    padding-bottom: 9px;
    letter-spacing: 0.03em;
}

h3.desktop {
    padding-top: 30px;
}
  
ul {
    line-height: 1.8;
    list-style-type: none;
    padding: 0;
}
  
li {
    font-weight: 300;
    font-size: 13px;
    color: #d1d1d1;
    letter-spacing: 0.03em;
}
  
p {
    font-weight: 300;
    font-size: 13px;
    padding: 0;
    line-height: 1.8;
    letter-spacing: 0.03em;
}
  
a {
    text-decoration: none;
    color: #d1d1d1;
}
  
a:hover {
    color: white;
}
  
.desktop {
    display: auto;
}

.footer-inner:after {
    content: "© 2020 La Bonne Planque. Tout droit réservé.";
    font-weight: 300;
    letter-spacing: 0.03em;
    font-size: 13px;
    color: #d1d1d1;
    position: absolute;
    top: 260px;
    clear: both;
    display: block;
}

@media (max-width: 1024px) {
  
footer {
    padding: 50px 0 70px 0 !important;
}

.footer-inner {
    border-bottom: 1px solid #333;
    padding-bottom: 490px;
    margin-bottom: 50px;
}

.footer-item {
    margin: 0 0 42px 0;
    width: 50%;
}

.footer-item:nth-of-type(1) {
    border-bottom: 1px solid #333;
    padding-bottom: 32px;
    float: none;
    width: 100%;
}

.footer-item:nth-of-type(2) {
    clear: both;
}

.footer-item:nth-of-type(4) {
    clear: both;
    display: block;
}

.footer-item:nth-of-type(6) {
    clear: both;
}

.footer-item:nth-of-type(7) {
    clear: both;
    float: left;
    margin: 20px 0 0 -13px;
}

.desktop {
    display: none;
}

.footer-inner:after {
    top: 730px;
}
}
</style>
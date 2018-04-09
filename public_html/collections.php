<!--- HEADER INCLUDES START --->
<?php $PageName = "Forside";
require_once 'incl/header.php'; ?>
<!--- HEADER INCLUDES END --->
<section class="row">
        <div class="col-md-8">
          <h1>collections</h1>
          <p>
            Check out all of our collections in this section.
          </p>
          <hr />
          Indsæt en masse fed PHP her.
        </div>
        <aside class="col-md-4 sidearea">
            <img src="content/img/banner1.png" class="col-12"/>
            <img src="content/img/campaign.jpg" alt="" class="col-12">
            <img src="content/img/campaign-2.jpg" alt="" class="col-12">
            <form class="newsletter" method="post">
                <h4>Sign up to our newsletter</h4>
                <hr>
                <label for="inputEmail" class="col-3">E-Mail</label>
                <input type="email" name="email" id="inputEmail" style="margin-bottom:1rem;">
                <label for="inputName" class="col-3">Name</label>
                <input type="name" name="name" id="inputName" class="">
                <br>
                <button class="btn ml-auto" type="submit">Signup</button>
            </form>
        </aside>
</section>
<!--- FOOTER INCLUDES START --->
<?php require_once 'incl/footer.php'; ?>
<!--- FOOTER INCLUDES END --->

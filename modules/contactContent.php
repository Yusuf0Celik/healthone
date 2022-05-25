<h4 class="pt-4">Contact met ChielOne</h4>
<div class="row">
  <div class="col-6">
    Wilt u meer informatie, of heeft u een vraag of suggestie, we horen graag van u!
    <form method="POST" action="/contact">
      <input type="hidden" name="form-sort" value="contact">
      <div class="row mt-3">
        <div class="col">
          <input type="text" name="name" class="form-control" required="" value="" placeholder="Uw naam">
        </div>
        <div class="col">
          <input type="email" name="email" required="" class="form-control" value="" placeholder="jan@jan.nl">
        </div>
      </div>
      <div class="row mt-3">
        <div class="col">
          <input type="text" name="name" class="form-control" required="" value="" placeholder="0612345678">
        </div>
      </div>
      <div class="row mt-3">
        <div class="col">
          Laat een berichtje achter!
          <textarea name="remark" class="form-control" rows="3"></textarea>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col">
          <button type="submit" class="btn btn-outline-success">Verstuur het formulier</button>
        </div>
      </div>
    </form>
  </div>
  <div class="col-6">
    <img class="img-fluid" src="img/home-img.jpg" alt="home-img">
  </div>
</div>
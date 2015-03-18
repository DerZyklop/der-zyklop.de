<div class="author bg-tertiary">
  <section class="width-wrap">
    <h6><span>Autor</span></h6>
    <img class="right" style="margin: 0 0 1em 1em" height="60" width="60" src="<?= url('assets/images/derzyklop_avatar.png') ?>">
    <h5 style="text-align: left;margin:2em 0 0"><strong><a href="/about"><?= $site->author() ?></a></strong></h5>
    <?= kirbytext($site->authordescription()) ?>
  </section>
  <div class="clearit"></div>
</div>

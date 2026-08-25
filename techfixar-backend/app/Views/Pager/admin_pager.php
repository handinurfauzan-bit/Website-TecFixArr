<?php $pager->setSurroundCount(2) ?>
<?php foreach ($pager->links() as $link): ?>
  <a class="admin-page <?= $link['active'] ? 'admin-page--active' : '' ?>"
     href="<?= $link['uri'] ?>"
     <?= $link['active'] ? 'aria-current="page"' : '' ?>>
    <?= $link['title'] ?>
  </a>
<?php endforeach ?>

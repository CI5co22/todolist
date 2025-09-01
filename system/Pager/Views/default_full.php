<?php

use CodeIgniter\Pager\PagerRenderer;

/**
 * @var PagerRenderer $pager
 */
$pager->setSurroundCount(2);
?>


<style>

	.pagination
	{
		display: flex;
		list-style: none;
	}

	li .page
	{
		padding: .3rem .5rem;
		text-decoration: none;
		margin: 1rem;
		border-radius: 1rem;
		font-weight: 900;
		color: black;
		background-color:rgb(240, 238, 238);
		transition: .5s;
	}

	a:focus
	{
		background-color: #f6be01;
	}

	li:hover
	{
		transform: scale(1.2);
	}

	li .next,.pre
	{
		background-color: yellow;
	}
</style>

<nav aria-label="<?= lang('Pager.pageNavigation') ?>">
	<ul class="pagination">
		<?php if ($pager->hasPrevious()) : ?>
			<li>
				<a class="pre" href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>">
					<span aria-hidden="true"><?= lang('Pager.previous') ?></span>
				</a>
			</li>
		<?php endif ?>

		<?php foreach ($pager->links() as $link) : ?>
			<li <?= $link['active'] ? 'class="active"' : '' ?>>
				<a class="page" href="<?= $link['uri'] ?>">
					<?= $link['title'] ?>
				</a>
			</li>
		<?php endforeach ?>

		<?php if ($pager->hasNext()) : ?>
			<li>
				<a class="next" href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>">
					<span aria-hidden="true"><?= lang('Pager.next') ?></span>
				</a>
			</li>
		<?php endif ?>
	</ul>
</nav>

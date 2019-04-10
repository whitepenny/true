<div id="BlackBarTop" class="container-fluid" style="<?= $bb_styles ?>">
	<div class="row">
		<ul class="links">
			<?php foreach ( $sites as $site ): ?>
			<li class="link">
				<?php
					$current = ( strpos( $site[$bb_sites . '_link'], $current_site ) !== false )
						? 'current-site'
						: '';
				?>
				<a class="<?= $current ?>" href="<?= $site[$bb_sites . '_link'] ?>">
					<img src="<?= $site[$bb_sites . '_icon'] ?>" alt="logo">
				</a>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>
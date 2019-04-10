<div id="BlackBarBottom" class="container-fluid" style="<?= $bb_styles ?>">
    <div class="row">
        <div class="container" >
            <p class="our-brands">Our brands</p>
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
                            <span><?= $site[$bb_sites . '_text']  ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

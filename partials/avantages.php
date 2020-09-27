<ul class="grid">
    <li class="card grid__el">
        <?php
            $array =  get_field('avantage_1');
            $image = $array['image'];
        ?>
        <div class="card__img" >
            <img src="<?php echo $image['url']; ?>" atl="<?php echo $image['title']; ?>" />
        </div>
        <h3 class="card__title">
        <?php echo($array['nom']); ?>  
        </h3>
    </li>

    <li class="card grid__el">
        <?php
            $array =  get_field('avantage_2');
            $image = $array['image'];
        ?>
        <div class="card__img" >
            <img src="<?php echo $image['url']; ?>" atl="<?php echo $image['title']; ?>" />
        </div>
        <h3 class="card__title"><?php echo($array['nom']); ?></h3>
    </li>

    <li class="card grid__el">
        <?php
            $array =  get_field('avantage_3');
            $image = $array['image'];
        ?>
        <div class="card__img" >
            <img src="<?php echo $image['url']; ?>" atl="<?php echo $image['title']; ?>" />
        </div>
        <h3 class="card__title"><?php echo($array['nom']); ?>  </h3>
    </li>
</ul>
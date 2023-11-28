<?php

use \app\widgets\CategoryWidget;

$this->title = 'Главная';

?>

<aside>
    <nav>
        <?php
            echo CategoryWidget::widget(['categories' => $categories]);
        ?>
    </nav>
</aside>

<main>

    <?php foreach ($products as $product) {?>
        <article>
            <div class="name">
                <?php echo $product->name;?>
            </div>
            <div class="description">
                <?php echo $product->description;?>
            </div>
        </article>
    <?php }?>

</main>

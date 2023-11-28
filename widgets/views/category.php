<?php

function printCategory($categories) {
    echo '<ul>';
    foreach ($categories as $category) {
        echo '<li>';
            echo '<a href="/site/category/' . $category['id'] . '">';
                echo $category['name'];
            echo '</a>';
            if (count($category['children']) > 0) {
                printCategory($category['children']);
            }
        echo '</li>';
    }
    echo '</ul>';
}

printCategory($categories);

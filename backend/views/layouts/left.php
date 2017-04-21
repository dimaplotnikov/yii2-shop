<aside class="main-sidebar">

    <section class="sidebar">


        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Menu', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Orders', 'icon' => 'archive', 'url' => ['/order']],
                    ['label' => 'Categories', 'icon' => 'server', 'url' => ['/category']],
                    ['label' => 'Products', 'icon' => 'shopping-cart', 'url' => ['/product']],
                    ['label' => 'Icons', 'icon' => 'file', 'url' => ['/icon']],
                    ['label' => 'Phone', 'icon' => 'phone', 'url' => ['/phone']],
                ],
            ]
        ) ?>

    </section>

</aside>
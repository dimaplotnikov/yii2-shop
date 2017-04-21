<div class="product-listy">
                <h2>our Products</h2>
                <ul class="product-list">
                    <?php foreach ($model as $mod): ?>
                        <?php if(!empty($mod->parent_id)): ?>
                        <li><a href="<?= yii\helpers\Url::to(['category/view', 'id' =>$mod->id]) ?>"><?php echo $mod->name; ?></a></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>

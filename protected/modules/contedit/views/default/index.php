<h1>Контент</h1>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$type,
    'itemView'=>'_view',
)); ?>
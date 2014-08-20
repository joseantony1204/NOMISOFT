<?php
$this->widget('bootstrap.widgets.TbFileUpload', array(
        'url' => $this->createUrl('image/upload'),
        'imageProcessing' => false,
        'name' => 'photo',
        'multiple' => false,
        'callbacks' => array(
                'done' => new CJavaScriptExpression(
                    'function(e, data) { alert(\'done!\'); }'
                ),
                'fail' => new CJavaScriptExpression(
                    'function(e, data) { alert(\'fail!\'); }'
                ),
        ),
    )
);
?>
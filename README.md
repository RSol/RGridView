RGridViewWidget
===============
RGridViewWidget displays a list of ordered data items in terms of a table. This widget based on CGridView widget.
You can order your model drageble.

Using:
-----
~~~
[php]
$this->widget('ext.RGridViewWidget.RGridViewWidget', array(
    'dataProvider'=>$dataProvider,
    'rowCssId'=>'$data->id',
    'orderUrl'=>array('order'),
    'successOrderMessage'=>'Success',
    'buttonLabel'=>'Order',
    'template' => '{summary} {items} {order}',
    'columns'=>array(
        ...
    ),
));
~~~

RGridViewAction
===============
RGridViewAction store the ordered models.

To use RGridViewAction add it in your controller:

~~~
[php]
public function actions()
{
    return array(
            'order' => array(
            'class' => 'ext.RGridView.RGridViewAction',
            'model' => 'Model',
            'orderField' => 'order',
        ),
    );
}
~~~
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
	'options'=>array(
		'cursor' => 'crosshair',
	),
    'columns'=>array(
        ...
    ),
));
~~~

Options:

* rowCssId - string a PHP expression that will be evaluated for every data row and whose result will be rendered as the css id of the data row. In this expression, the variable $row the row number (zero-based); $data the data model for the row; and $this the column object
* orderUrl - mixed a URL or an action route that can be used to create a URL.
* successOrderMessage - string After successfully order message
* buttonLabel - string Label for ajax button
* template - string the template to be used to control the layout of various sections in the view. These tokens are recognized: {summary}, {items} and {order}. They will be replaced with the summary text, the items, and the order ajax button (pager not used).
* options - array the initial JavaScript options that should be passed to the JUI plugin.


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
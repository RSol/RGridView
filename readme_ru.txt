RGridViewWidget
===============
RGridViewWidget отображает таблицу аналогичную CGridView, но позволяет использовать сортировку столбцов с сохранением результата

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
RGridViewAction сохраняет результат сортировки

Для использования RGridViewAction добавьте его в Ваш контроллер:
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
RGridViewWidget
===============
RGridViewWidget ���������� ������� ����������� CGridView, �� ��������� ������������ ���������� �������� � ����������� ����������

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
RGridViewAction ��������� ��������� ����������

��� ������������� RGridViewAction �������� ��� � ��� ����������:
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
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
	'options'=>array(
		'cursor' => 'crosshair',
	),
    'columns'=>array(
        ...
    ),
));
~~~

�����:

* rowCssId - ������ - PHP-���������, ������� ����� �������������� ��� �������������� � id ��������. � ��������� ����� ��������������  ���������� $row - ����� ������ (���������� � ����); $data - ������ (������), ������������ ��� ����������� ������; $this - ������ ������
* orderUrl - ������ ��� ������, ������������ ��� ������������ URL.
* successOrderMessage - ������ - ��������� � �������� ����������.
* buttonLabel - ������ - ������� ��� ajax ������
* template - ������ - ������, ������� ����� �������������� ��� ������������ �������. ����� ���� ������������: {summary}, {items} and {order}. ��� ������ ����� �������� �� ����� �����, �������, � ajax-������ (�� ������������ ��������).
* options - ������ - ����� ��� ������������� jQuery sortable �������.

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
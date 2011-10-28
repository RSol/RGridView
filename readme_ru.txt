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
	'options'=>array(
		'cursor' => 'crosshair',
	),
    'columns'=>array(
        ...
    ),
));
~~~

Опции:

* rowCssId - строка - PHP-выражение, которое будет использоваться для преобразования в id элемента. В выражении могут использоваться  переменные $row - номер строки (начинается с нуля); $data - запись (модель), используемая для отображения строки; $this - объект строки
* orderUrl - строка или массив, используемые для формирования URL.
* successOrderMessage - строка - сообщение о успешном сохранении.
* buttonLabel - строка - надпись для ajax кнопки
* template - строка - шаблон, который будет использоваться для формирования виджета. Могут быть использованы: {summary}, {items} and {order}. Эти идиомы будут заменены на общий текст, таблицу, и ajax-кнопка (не используется рейджинг).
* options - массив - опции для инициализации jQuery sortable плагина.

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
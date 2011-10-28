<?php

/**
 * RGridViewWidget class file.
 *
 * @author Slava Rudnev <slava.rudnev@gmail.com>
 * @link https://github.com/RSol/RGridView
 */

Yii::import('zii.widgets.grid.CGridView');

/**
 * RGridViewWidget displays a list of ordered data items in terms of a table. This widget based on CGridView widget.
 * You can order your model drageble.
 *
 * Using:
 *
 * <pre>
 * $this->widget('ext.RGridViewWidget.RGridViewWidget', array(
 *     'dataProvider'=>$dataProvider,
 *     'rowCssId'=>'$data->id',
 *     'orderUrl'=>array('order'),
 *     'successOrderMessage'=>'Success',
 *     'buttonLabel'=>'Order',
 *     'template' => '{summary} {items} {order}',
 *     'options'=>array(
 *          'cursor' => 'crosshair',
 *      ),
 *     'columns'=>array(
 *         ...
 *     ),
 * ));
 * </pre>
 *
 * Additional 
 * 
 * @author Slava Rudnev <slava.rudnev@gmail.com>
 * @version 0.2
 */

class RGridViewWidget extends CGridView
{
	/**
	 * @var string a PHP expression that will be evaluated for every data row and whose result will be rendered as the css id of the data row. In this expression, the variable $row the row number (zero-based); $data the data model for the row; and $this the column object
	 */
	public $rowCssId = '$data->id';
	
	/**
	 * @var mixed a URL or an action route that can be used to create a URL.
	 *  See {@see normalizeUrl} for more details about how to specify this parameter.
	 */
	public $orderUrl = array('order');

	/**
	 * @var string After successfully order message
	 */
	public $successOrderMessage = 'Models succesfuly ordered';
	
	/**
	 * @var string Label for ajax button
	 */
	public $buttonLabel = 'Order';

	/**
	 * @var string the template to be used to control the layout of various sections in the view.
	 *  These tokens are recognized: {summary}, {items} and {order}.
	 *  They will be replaced with the summary text, the items, and the order ajax button (pager not used).
	 */
	public $template = '{summary} {items} {order}';
	
	/**
	 * @var array the initial JavaScript options that should be passed to the JUI plugin. 
	 */
	public $options = array();

	/**
	 * Renders a table body row.
	 * @param integer $row the row number (zero-based).
	 */
	public function renderTableRow($row)
	{
		$id = '';
		if($this->rowCssId !== null)
		{
			$data = $this->dataProvider->data[$row];
			$id = ' id="' . $this->evaluateExpression($this->rowCssId, array('row' => $row, 'data' => $data)) . '" ';
		}
			
		if($this->rowCssClassExpression !== null)
		{
			$data = $this->dataProvider->data[$row];
			echo '<tr '.$id.'class="rgridviewwidget ' . $this->evaluateExpression($this->rowCssClassExpression, array('row' => $row, 'data' => $data)) . '">';
		}
		else if(is_array($this->rowCssClass) && ($n = count($this->rowCssClass)) > 0)
			echo '<tr '.$id.'class="rgridviewwidget ' . $this->rowCssClass[$row % $n] . '">';
		else
			echo '<tr'.$id.' class="rgridviewwidget">';
		foreach($this->columns as $column)
			$column->renderDataCell($row);
		echo "</tr>\n";
	}

	/**
	 * Initializes the grid view.
	 * This method will initialize required property values and instantiate {@link columns} objects.
	 */
	public function init()
	{
		$options = array('items'=>'tr.rgridviewwidget');
		if(is_array($this->options))
		{
			$options = array_merge($this->options, $options);
		}
		
		Yii::app()->clientScript->registerCoreScript('jquery.ui');
		Yii::app()->clientScript->registerScript(__CLASS__, '$( "#'.$this->getId().'" ).sortable('.CJavaScript::encode($options).');');
		parent::init();
		
		$this->pager = null;
	}

	/**
	 * Renders a order ajax buttons.
	 * @param integer $row the row number (zero-based).
	 */
	public function renderOrder()
	{
		echo CHtml::ajaxButton($this->buttonLabel, $this->orderUrl, array(
			'type' => 'POST',
			'data' => array(
				'Order' => 'js:$("#'.$this->getId().'").sortable("toArray").toString()',
			),
			'dataType' => 'json',
			'success' => 'js:function(ansver){
				if(ansver.msg=="Ok")
					alert("'.$this->successOrderMessage.'");
				else
					alert(ansver.msg);
			}',
		));
	}
}
<?php

/**
 * RGridViewAction class file.
 *
 * @author Slava Rudnev <slava.rudnev@gmail.com>
 * @link https://github.com/RSol/RGridView
 */

/**
 * RGridViewAction store the ordered models.
 *
 * To use RGridViewAction add it in your controller:
 * <pre>
 * public function actions()
 * {
 *     return array(
 *             'order' => array(
 *             'class' => 'ext.RGridView.RGridViewAction',
 *             'model' => 'Model',
 *             'orderField' => 'order',
 *         ),
 *     );
 * }
 * </pre>
 *
 * Additional 
 * 
 * @author Slava Rudnev <slava.rudnev@gmail.com>
 * @version 0.1
 */

class RGridViewAction extends CAction
{
	public $model = 'Model';

	public $orderField = 'order';

	public function run()
	{
		$ansver = array('msg'=>'Data not sended');
		
		if(isset($_POST['Order']))
		{
			$models = explode(',', $_POST['Order']);
			$models = array_filter($models);
			
			$orderModel = CActiveRecord::model($this->model);

			foreach($models as $order => $id)
			{
				Y::command()
					->update($orderModel->tableName(), array(
						$this->orderField =>$order,
					), $orderModel->getMetaData()->tableSchema->primaryKey.'=:range_id', array(
						':range_id' => $id,
					));
			}
			
			$ansver = array('msg'=>'Ok');
		}
		echo CJSON::encode($ansver);
		Yii::app()->end();
	}
}
<?php
/**
 * author: whipstercz
 */

namespace simuaagua\Services\Inspinia;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;
use Illuminate\Support\ViewErrorBag;

class InspiniaForm extends BootstrapForm
{

	/**
	 * Create a Bootstrap checkbox input.
	 *
	 * @param  string   $name
	 * @param  string   $label
	 * @param  string   $value
	 * @param  bool     $checked
	 * @param  array    $options
	 * @return string
	 */
	public function checkbox($name, $label = null, $value=1, $checked = null, array $options = []) {
		$hiddenElement = $this->form->hidden($name,0);
		$element = parent::checkbox($name,$label,1,$checked,$options);
		return $hiddenElement.$element;
	}

	public function getFormattedDateValue($name,$value,$format){
		if (null === $value) {
			$value = $this->form->getValueAttribute($name);
		}
		if ($value instanceof \DateTime) {
			$value = $value->format($format);
		}
		return $value;
	}

	/**
	 * Create a Text input with datePicker class and Formatted Date Value
	 * @param $name
	 * @param null|string|array $label - array means $options
	 * @param mixed $value
	 * @param array $options
	 * @return string
	 */
	public function month($name,$label=null,$value=null,$options = []){
		$this->useLabelAsOptions($label,$options);
		$options = array_merge($options, ['type'=>'date']);
		$options = array_merge($options, ['class'=>$this->config->get('inspinia.month_picker_class')]);
		if ( null === $format = array_pull($options,'format')) {
			$format = $this->config->get('inspinia.month_format');
		}
		$value = $this->getFormattedDateValue($name,$value,$format);
		//append date format to the form data
		$formatFields = $this->hidden($name.'_format',$format);
		return $formatFields . $this->text($name,$label,$value,$options);
	}

	/**
	 * Create a Text input with datePicker class and Formatted Date Value
	 * @param $name
	 * @param null|string|array $label - array means $options
	 * @param mixed $value
	 * @param array $options
	 * @return string
	 */
	public function date($name,$label=null,$value=null,$options = []){
		$this->useLabelAsOptions($label,$options);
		$options = array_merge($options, ['type'=>'date']);
		$options = array_merge($options, ['class'=>$this->config->get('inspinia.date_picker_class')]);

		if ( null === $format = array_pull($options,'format')) {
			$format = $this->config->get('inspinia.date_format');
		}

		$value = $this->getFormattedDateValue($name,$value,$format);
		//append date format to the form data
		$formatFields = $this->hidden($name.'_format',$format);
		return $formatFields . $this->text($name,$label,$value,$options);
	}


	public function disabledCheckbox($name,$label = null, $checked = null, $options =[]){
		if (is_null($checked)) {
			$checked = $this->model->getAttribute($name);
		}
		$hidden = $this->hidden($name, $checked );
		$value = array_pull($options,'value',1);
		$checkbox = parent::checkbox("_".$name,$label,$value,$checked,['disabled'=>true]);
		return $checkbox.$hidden;
	}



}
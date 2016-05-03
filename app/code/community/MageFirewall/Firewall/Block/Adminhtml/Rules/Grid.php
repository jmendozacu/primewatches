<?php     
class MageFirewall_Firewall_Block_Adminhtml_Rules_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
	public function __construct()
	{
		parent::__construct();
		$this->setId('rulesGrid');
		$this->setDefaultSort('rules_id');
		$this->setDefaultDir('DESC');
		$this->setSaveParametersInSession(true);
		$this->setUseAjax(true);
	}
	protected function _prepareCollection()
	{
		$orderId = (int) $this->getRequest()->getParam('id');
		if(empty($orderId)){
			$collection = Mage::getModel('firewall/rules')->getCollection();
		}
		
		$this->setCollection($collection);
		return parent::_prepareCollection();
	}
	protected function _prepareColumns()
	{
		$this->addColumn('rules_id', array(
			'header'    => Mage::helper('firewall')->__('ID #'),
			'align'     => 'left',
			'index'     => 'rules_id',
        ));
        $this->addColumn('who', array(
			'header'    => Mage::helper('firewall')->__('Who'),
			'align'     => 'left',
			'index'     => 'who',
        ));
        $this->addColumn('request', array(
			'header'    => Mage::helper('firewall')->__('Request'),
			'align'     => 'left',
			'index'     => 'request',
			'style'    => 'width:80px',
        ));
        $this->addColumn('what', array(
			'header'    => Mage::helper('firewall')->__('What'),
			'align'     => 'left',
			'index'     => 'what',
        ));
        $this->addColumn('why', array(
			'header'    => Mage::helper('firewall')->__('Why'),
			'align'     => 'left',
			'index'     => 'why'
        ));
        $this->addColumn('level', array(
			'header'    => Mage::helper('firewall')->__('Level'),
			'align'     => 'left',
			'index'     => 'level',
        ));
        $this->addColumn('enabled', array(
          'header'    => Mage::helper('firewall')->__('Status'),
          'align'     => 'left',
          'width'     => '80px',
          'index'     => 'enabled',
          'type'      => 'options',
          'options'   => array(
              1 => 'Enabled',
              0 => 'Disabled',
          ),
		));
        /* $this->addColumn('comments', array(
			'header'    => Mage::helper('paymentcapture')->__('Status Message'),
			'align'     => 'left',
			'index'     => 'comments',
        ));
        $this->addColumn('action_edit', array(
			'header'   => $this->helper('paymentcapture')->__('Action'),
			'width'    => 80,
			'sortable' => false,
			'filter'   => false,
			'renderer' => new Grossman_Paymentcapture_Block_Adminhtml_Renderer_Action(),
		));
		
        $this->addColumn('action',
array(
          'header' => Mage::helper('paymentcapture')->__(''),
          'width' => '100',
          'type' => 'action',
          'getter' => 'getId',
          'actions' => array(
                 array(
                      'caption' => Mage::helper('paymentcapture')->__('Log'),
                      'url' => array('base'=> 'adminhtml/paymentcapture_view'),
                      'field' => 'id'
                    )),
          'filter' => false,
          'sortable' => false,
          'index' => 'stores',
          'is_system' => true,
));*/
		return parent::_prepareColumns();
	}
	public function getGridUrl()
	{
	  return $this->getUrl('*/*/grid', array('_current'=>true));
	}

	  public function getRowUrl($row)
	  { 
		  return $this->getUrl('*/*/edit', array('id' => $row->getId()));
	  }
}

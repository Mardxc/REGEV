<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<div class="row-fluid">
    <div class="span3" style="width:10%; ">
		
    </div><!--/span-->
    <div class="span9">
    
        <?php if(isset($this->breadcrumbs)):?>
    		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
                'links'=>$this->breadcrumbs,
    			'homeLink'=>CHtml::link('Dashboard'),
    			'htmlOptions'=>array('class'=>'breadcrumb')
            )); ?><!-- breadcrumbs -->
        <?php endif?>
        
        <!-- Include content pages -->
        <?php echo $content; ?>

	</div><!--/span-->
</div><!--/row-->

<?php $this->endContent(); ?>
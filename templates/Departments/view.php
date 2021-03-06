<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Department $department
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Department'), ['action' => 'edit', $department->dept_no], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Department'), ['action' => 'delete', $department->dept_no], ['confirm' => __('Are you sure you want to delete # {0}?', $department->dept_no), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Departments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Department'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="departments view content">
            <h3><?= h($department->dept_no) ?></h3>
            <table>
            <tr>
                    <td><?= $this->Html->image(h('departments/'.$department->picture), [
                                    "alt" => "manager picture",
                                    "width"=>100,
                                    "class"=>"card-img-top"
                            ]);?>
                    </td>
                <tr>
                    <th><?= __('Dept No') ?></th>
                    <td><?= h($department->dept_no) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dept Name') ?></th>
                    <td><?= h($department->dept_name) ?></td>
                </tr>
                
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($department->description) ?></td>
                </tr>
                
                <tr>
                    <th><?= __('Current Manager') ?></th>
                    <td>
                    	<?= $this->Html->image('employees/'.$department->manager->picture)?>
                    	<?= '<br>'.$department->manager->first_name.' '.$department->manager->last_name ?>
                    </td>
                </tr>
                <tr>
                    <th><?= __('Adresse') ?></th>
                    <td><?= h($department->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('ROI') ?></th>
                    <td><?= $this->Html->link(__('Telecharger le ROI'), '/docs/ROI/'.$department->roi, ['download'=>$department->roi]) ?></td>
                </tr>
                
            </table>
            
            <h3><?= __('Managers') ?></h3>
            
            <table>
            	<thead>
                	<tr>
                		<th>From</th>
                		<th>To</th>
                		<th>Salary</th>
                	</tr>
                </thead>
                <?php foreach($department->managers as $manager) {?>
                
                <tbody>
                <tr>
                	<td><?= h($manager->first_name.' '.$manager->last_name) ?></td>
                    <td><?= $this->Time->format($manager->_joinData->from_date, 'd/M/Y') ?></td>
                    <td><?= $this->Time->format($manager->_joinData->to_date, 'd/M/Y') ?></td>
                    
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
